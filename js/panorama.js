document.addEventListener("DOMContentLoaded", () => {

    const pano = document.querySelector(".panorama");
    const minimap = document.getElementById("minimap");
    const zoom = document.getElementById("minimap-zoom");
    let track = document.getElementById('minimap-track');
    let thumbs = []; // will hold generated thumb elements
    // minimap thumbnail scale state (1 = base size)
    let thumbScale = 1;
    const thumbScaleMin = 0.6;
    const thumbScaleMax = 2.5;
    const thumbScaleStep = 0.25;
    let pinchStart = null; // touch pinch tracking

    function updateMinimap() {
        const maxScroll = pano.scrollWidth - pano.clientWidth;
        const percentage = maxScroll > 0 ? pano.scrollLeft / maxScroll : 0;

        const miniW = minimap.clientWidth;
        const left = Math.min(Math.max(percentage * miniW, 0), miniW);
        // pointer element is intentionally hidden; position the zoom indicator directly
        zoom.style.left = left + "px";

        // update viewport indicator when present
        const viewport = document.getElementById('minimap-viewport');
        if (viewport) {
            const fractionVisible = pano.clientWidth / pano.scrollWidth || 1;
            const viewportWidth = Math.max(6, fractionVisible * miniW);
            const viewportLeft = Math.min(Math.max(percentage * miniW, 0), miniW - viewportWidth);
            viewport.style.width = viewportWidth + 'px';
            viewport.style.left = viewportLeft + 'px';
        }

        // highlight active thumbnail and make sure it's visible in the track
        highlightActiveThumb();
    }

    function highlightActiveThumb() {
        if (!track) return;
        const imgs = Array.from(pano.querySelectorAll('img'));
        if (!imgs.length || !thumbs.length) return;

        // determine which panorama image is closest to the center of viewport
        const centerX = pano.scrollLeft + pano.clientWidth / 2;
        let closestIndex = 0;
        let closestDist = Infinity;
        imgs.forEach((img, idx) => {
            const imgCenter = (img.offsetLeft || 0) + (img.getBoundingClientRect().width || 0) / 2;
            const dist = Math.abs(imgCenter - centerX);
            if (dist < closestDist) { closestDist = dist; closestIndex = idx; }
        });

        // add active class to the matching thumbnail and remove from others
        thumbs.forEach((t, i) => {
            if (i === closestIndex) t.classList.add('active-thumb'); else t.classList.remove('active-thumb');
        });

        // ensure the active thumbnail is visible in the track area
        const active = thumbs[closestIndex];
        if (active) {
            // if active thumb is outside the visible region of the track, scroll it into view centered
            const trackRect = track.getBoundingClientRect();
            const thumbRect = active.getBoundingClientRect();
            if (thumbRect.left < trackRect.left || thumbRect.right > trackRect.right) {
                // use scrollIntoView with inline center so it animates smoothly
                try { active.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' }); }
                catch (e) { /* fallback if not supported */
                    const offset = active.offsetLeft - (track.clientWidth / 2) + (active.clientWidth / 2);
                    track.scrollLeft = offset;
                }
            }
        }
    }

    function movePanoramaByMinimap(x) {
        const rect = minimap.getBoundingClientRect();
        const relativeX = x - rect.left;
        const pct = rect.width > 0 ? Math.min(Math.max(relativeX / rect.width, 0), 1) : 0;

        const maxScroll = pano.scrollWidth - pano.clientWidth;
        pano.scrollLeft = pct * maxScroll;
        updateMinimap();
    }

    // Mouse events
    minimap.addEventListener("mousedown", e => {
        zoom.style.opacity = 1;
        movePanoramaByMinimap(e.clientX);

        function drag(e2) { movePanoramaByMinimap(e2.clientX); }
        function stop() { zoom.style.opacity = 0; window.removeEventListener("mousemove", drag); window.removeEventListener("mouseup", stop); }

        window.addEventListener("mousemove", drag);
        window.addEventListener("mouseup", stop);
    });

    // show zoom during hover and move the zoom circle to cursor
    minimap.addEventListener('mousemove', e => {
        const rect = minimap.getBoundingClientRect();
        const x = Math.min(Math.max(e.clientX - rect.left, 0), rect.width);
        zoom.style.left = x + 'px';
        zoom.style.opacity = 1;
    });

    minimap.addEventListener('mouseleave', () => {
        zoom.style.opacity = 0;
    });

    // Touch events
    minimap.addEventListener("touchstart", e => { zoom.style.opacity = 1; movePanoramaByMinimap(e.touches[0].clientX); });
    minimap.addEventListener("touchmove", e => movePanoramaByMinimap(e.touches[0].clientX));
    minimap.addEventListener("touchend", () => { zoom.style.opacity = 0; });

    // sync minimap with panorama scrolling and changes
    pano.addEventListener('scroll', updateMinimap);
    window.addEventListener('resize', updateMinimap);

    // recompute sizes after all images/resources have loaded
    window.addEventListener('load', () => {
        updateMinimap();
        // build minimap thumbnails (scale down version of panorama) after images loaded
        const track = document.getElementById('minimap-track');
        if (track && pano) {
            // clear any old content
            track.innerHTML = '';

            const totalWidth = pano.scrollWidth || Array.from(pano.querySelectorAll('img')).reduce((sum, im) => sum + (im.getBoundingClientRect().width || 0), 0);
            const miniW = minimap.clientWidth || totalWidth || 400;
            const scale = totalWidth > 0 ? (miniW / totalWidth) : 1;

            // build thumbnails sized to fit the minimap. If there's room we'll use one row, otherwise fall back to two rows.
            const imgs = Array.from(pano.querySelectorAll('img'));
            const count = imgs.length;
            const gap = 0; // css gap now 0 so thumbnails sit flush
            const paddingHoriz = 8 * 2; // left+right padding in CSS
            const availableWidth = Math.max(24, minimap.clientWidth - paddingHoriz);

            // try single-row layout first
            const singlePerThumb = Math.floor((availableWidth - Math.max(0, (count - 1) * gap)) / count);
            const minSingleThumb = 48; // prefer at least 48px per thumb for single row

            let rows = 1;
            let thumbsPerRow = count;
            let targetThumbW = Math.max(24, singlePerThumb);

            if (singlePerThumb < minSingleThumb && count > 12) {
                // switch to two rows if many images and single row would be too small
                rows = 2;
                thumbsPerRow = Math.ceil(count / 2);
                targetThumbW = Math.floor((availableWidth - Math.max(0, (thumbsPerRow - 1) * gap)) / thumbsPerRow);
            }

            // clamp thumb width and ensure readability
            const maxThumb = 200;
            const minThumb = 20;
            targetThumbW = Math.min(Math.max(targetThumbW, minThumb), maxThumb);

            imgs.forEach((img, idx) => {
                const src = img.getAttribute('src');
                const thumbW = targetThumbW;

                const t = document.createElement('img');
                t.src = src;
                t.className = 'minimap-thumb';
                t.style.width = thumbW + 'px';
                // store base width for zooming (scale applied later)
                t.dataset.baseWidth = thumbW;
                // when we're in single row, make thumbs taller; otherwise we rely on CSS two-row heights
                if (rows === 1) {
                    t.style.height = 'calc(100% - 12px)';
                }
                t.alt = img.alt || '';

                // click a thumbnail to center that image in the main panorama viewport
                t.addEventListener('click', () => {
                    const left = img.offsetLeft || Array.from(pano.children).indexOf(img) * (img.getBoundingClientRect().width || 0);
                    const centerOffset = Math.max(0, left - (pano.clientWidth / 2) + ((img.getBoundingClientRect().width || 0) / 2));
                    pano.scrollLeft = centerOffset;
                    updateMinimap();
                    // ensure clicked thumb is scrolled into view
                    try { t.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' }); } catch (e) {}
                });

                // also support touch interaction on iPad: center the panorama on touchend
                t.addEventListener('touchend', e => {
                    e.preventDefault();
                    const left = img.offsetLeft || Array.from(pano.children).indexOf(img) * (img.getBoundingClientRect().width || 0);
                    const centerOffset = Math.max(0, left - (pano.clientWidth / 2) + ((img.getBoundingClientRect().width || 0) / 2));
                    pano.scrollLeft = centerOffset;
                    updateMinimap();
                });

                track.appendChild(t);
                // store reference
                thumbs.push(t);
            });

            // if track ended up empty, put a thin track as fallback
            if (!track.querySelector('img')) {
                track.style.background = 'rgba(255,255,255,0.2)';
            }

            // add zoom controls to minimap (plus/minus buttons)
            if (!minimap.querySelector('.minimap-controls')) {
                const controls = document.createElement('div');
                controls.className = 'minimap-controls';
                const btnPlus = document.createElement('button'); btnPlus.innerText = '+';
                const btnMinus = document.createElement('button'); btnMinus.innerText = '−';
                btnPlus.title = 'Zoom in'; btnMinus.title = 'Zoom out';
                controls.appendChild(btnPlus); controls.appendChild(btnMinus);
                minimap.appendChild(controls);

                const applyScale = (scale) => {
                    thumbScale = Math.min(Math.max(scale, thumbScaleMin), thumbScaleMax);
                    thumbs.forEach(t => {
                        const base = Number(t.dataset.baseWidth || t.clientWidth || 50);
                        t.style.width = Math.max(8, Math.round(base * thumbScale)) + 'px';
                    });
                    // ensure active thumbnail remains visible when zoom changes
                    const active = thumbs.find(t => t.classList.contains('active-thumb'));
                    if (active) try { active.scrollIntoView({behavior:'smooth', inline: 'center', block: 'nearest'}); } catch(e) {}
                    // toggle disabled states on controls when at limits
                    btnPlus.disabled = thumbScale >= thumbScaleMax;
                    btnMinus.disabled = thumbScale <= thumbScaleMin;
                };

                btnPlus.addEventListener('click', () => applyScale(thumbScale + thumbScaleStep));
                btnMinus.addEventListener('click', () => applyScale(thumbScale - thumbScaleStep));

                // wheel + ctrl to zoom on minimap (prefers ctrl/meta + wheel)
                minimap.addEventListener('wheel', e => {
                    if (e.ctrlKey || e.metaKey) {
                        e.preventDefault();
                        const delta = e.deltaY > 0 ? -thumbScaleStep : thumbScaleStep;
                        applyScale(thumbScale + delta);
                    }
                }, { passive: false });

                // basic pinch-to-zoom handling for touch devices
                minimap.addEventListener('touchstart', e => {
                    if (e.touches && e.touches.length === 2) {
                        const dx = e.touches[0].clientX - e.touches[1].clientX;
                        const dy = e.touches[0].clientY - e.touches[1].clientY;
                        pinchStart = Math.hypot(dx, dy);
                    }
                }, { passive: true });

                minimap.addEventListener('touchmove', e => {
                    if (e.touches && e.touches.length === 2 && pinchStart) {
                        const dx = e.touches[0].clientX - e.touches[1].clientX;
                        const dy = e.touches[0].clientY - e.touches[1].clientY;
                        const dist = Math.hypot(dx, dy);
                        const scaleDelta = (dist - pinchStart) / 200; // gentle sensitivity
                        if (Math.abs(scaleDelta) > 0.05) {
                            applyScale(thumbScale + scaleDelta);
                            pinchStart = dist; // update baseline for smooth continuous pinch
                        }
                        e.preventDefault();
                    }
                }, { passive: false });

                minimap.addEventListener('touchend', e => { pinchStart = null; }, { passive: true });

                // initialize control button state
                applyScale(thumbScale);
            }
        }
        // defensive fallback: if the minimap still reports 0 height, force visible sizing
        if (minimap && minimap.clientHeight === 0) {
            console.warn('minimap measured 0 height — forcing min-height/height/display');
            minimap.style.display = 'block';
            minimap.style.minHeight = '20px';
            minimap.style.height = '20px';
            // run another update after forcing styles
            setTimeout(updateMinimap, 30);
        }
    });

    // initialize shortly after load (lets layout settle)
    setTimeout(updateMinimap, 30);
});