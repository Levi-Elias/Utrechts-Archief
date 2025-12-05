<?php 
include 'includes/connect.php';
include 'includes/header.php'; 
?>

<?php $hotspotsarray = 
[
['id'=> 0, 'left'=> 140, 'top'=> 200, 'text'=> 'Dit is hotspot 1'],
['id'=> 1, 'left'=> 300, 'top'=> 250, 'text'=> 'Dit is hotspot 2'],
['id'=> 2, 'left'=> 450, 'top'=> 10, 'text'=> 'Dit is hotspot 3']


]
?>
<main>
<div class="map"></div>


<div class="panorama">
    <div class="info-container">
        
                    <?php 
                    $stmt = $conn->prepare( "SELECT * FROM hotspots" );
                    $stmt->execute();
                    $hotspotsarray = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($hotspotsarray as $hotspot) {
                            $id = $hotspot['id'];
                            $left = $hotspot['x_coord'];
                            $top = $hotspot['y_coord'];
                            $text = $hotspot['beschrijving'];
                            // echo "<div class='overlay-text' style='left: {$left}px; top: {$top}px;'>$text</div>";
                            ?>
                            <div class="map-item map-item1" style="left: <?php echo $left; ?>px; top: <?php echo $top; ?>px;">
                              <a class="marker marker1"  href="#marker<?php echo $id; ?>"><?php echo $id; ?></a>
                            
                              <aside id="<?php echo 'marker' . $id; ?>" class="map-popup">
                                <div class="map-popup-content">
                                  <h3>Hotspot <?php echo $id; ?></h3>
                                  <p><?php echo $text; ?></p>
                                </div>

                              </aside>
                            </div>
                            <?php
                        }
                     ?>
                </div>
                <script>
                    const button = document.getElementById("infoButton");
              const panel = document.getElementById("infoPanel");
            
              // Voor touchscreen apparaten
              button.addEventListener("touchstart", function () {
                panel.classList.toggle("active");
              });
            
              // Voor computers / laptops
              button.addEventListener("click", function () {
                panel.classList.toggle("active");
              });
            </script>
                
            <img src="img/1.jpg" alt="Panorama Image 1"
                style="height: 500px; z-index: 1; margin-left: 0px; margin-top: 0px;">
            <img src="img/2.jpg" alt="Panorama Image 2"
                style="height: 500px; z-index: 2; margin-left: 0px; margin-top: 0px;">
            <img src="img/3.jpg" alt="Panorama Image 3"
                style="height: 497.5px; z-index: 3; margin-left: -40px; margin-top: -1px;">
            <img src="img/4.jpg" alt="Panorama Image 4"
                style="height: 500px; z-index: 4; margin-left: -43px; margin-top: -5px;">
            <img src="img/5.jpg" alt="Panorama Image 5"
                style="height: 506px; z-index: 5; margin-left: -56px; margin-top: -8px;">
            <img src="img/6.jpg" alt="Panorama Image 6""
                style="height: 511px; z-index: 6; margin-left: -60px; margin-top: -12px;">
            <img src="img/7.jpg" alt="Panorama Image 7"
                style="height: 523px; z-index: 8; margin-left: -71px; margin-top: -13px;">
            <img src="img/8.jpg" alt="Panorama Image 8"
                style="height: 502px; z-index: 7; margin-left: -44px; margin-top: -6px;">
            <img src="img/9.jpg" alt="Panorama Image 9"
                style="height: 514px; z-index: 9; margin-left: -37px; margin-top: -12px;">
            <img src="img/10.jpg" alt="Panorama Image 10"
                style="height: 511px; z-index: 10; margin-left: -44px; margin-top: -11px;">
            <img src="img/11.jpg" alt="Panorama Image 11"
                style="height: 515px; z-index: 11; margin-left: -62px; margin-top: -13px;">
            <img src="img/12.jpg" alt="Panorama Image 12"
                style="height: 518px; z-index: 12; margin-left: -60px; margin-top: -11px;">
            <img src="img/13.jpg" alt="Panorama Image 13"
                style="height: 515.5px; z-index: 13; margin-left: -37px; margin-top: -11px;">
            <img src="img/14.jpg" alt="Panorama Image 14"
                style="height: 509px; z-index: 14; margin-left: -45px; margin-top: -6px;">
            <img src="img/15.jpg" alt="Panorama Image 15"
                style="height: 506px; z-index: 15; margin-left: -59px; margin-top: -4px;">
            <img src="img/16.jpg" alt="Panorama Image 16"
                style="height: 505px; z-index: 16; margin-left: -54px; margin-top: 1px;">
            <img src="img/17.jpg" alt="Panorama Image 17"
                style="height: 508px; z-index: 17; margin-left: -36px; margin-top: 1px;">
            <img src="img/18.jpg" alt="Panorama Image 18"
                style="height: 515px; z-index: 18; margin-left: -40px; margin-top: 1.5px;">
            <img src="img/19.jpg" alt="Panorama Image 19"
                style="height: 526px; z-index: 19; margin-left: -41px; margin-top: -3px;">
            <img src="img/20.jpg" alt="Panorama Image 20"
                style="height: 534px; z-index: 21; margin-left: -38px; margin-top: -6px;">
            <img src="img/21.jpg" alt="Panorama Image 21"
                style="height: 526px; z-index: 20; margin-left: -30px; margin-top: 7px;">
            <img src="img/22.jpg" alt="Panorama Image 22"
                style="height: 542px; z-index: 22; margin-left: -43px; margin-top: -5px;">
            <img src="img/23.jpg" alt="Panorama Image 23"
                style="height: 528px; z-index: 23; margin-left: -40px; margin-top: 2px;">
            <img src="img/24.jpg" alt="Panorama Image 24"
                style="height: 506px; z-index: 24; margin-left: -34px; margin-top: 16px;">
            <img src="img/25.jpg" alt="Panorama Image 25"
                style="height: 524px; z-index: 25; margin-left: -30px; margin-top: 1px;">
            <img src="img/26.jpg" alt="Panorama Image 26"
                style="height: 510.5px; z-index: 26; margin-left: -35px; margin-top: 12px;">
            <img src="img/27.jpg" alt="Panorama Image 27"
                style="height: 527px; z-index: 27; margin-left: -42px; margin-top: 5px;">
            <img src="img/28.jpg" alt="Panorama Image 28"
                style="height: 540px; z-index: 28; margin-left: -48px; margin-top: -4px;">
            <img src="img/29.jpg" alt="Panorama Image 29"
                style="height: 534px; z-index: 29; margin-left: -44px; margin-top: -1px;">
            <img src="img/30.jpg" alt="Panorama Image 30"
                style="height: 531px; z-index: 30; margin-left: -53px; margin-top: 5px;">
            <img src="img/31.jpg" alt="Panorama Image 31"
                style="height: 540px; z-index: 32; margin-left: -47px; margin-top: 1px;">
            <img src="img/32.jpg" alt="Panorama Image 32"
                style="height: 535px; z-index: 31; margin-left: -48px; margin-top: -4px;">
            <img src="img/33.jpg" alt="Panorama Image 33"
                style="height: 539px; z-index: 33; margin-left: -45px; margin-top: -2px;">
        </div>


    <div id="minimap">
        <div id="minimap-track"></div>
        <div id="minimap-viewport"></div>
        <div id="minimap-pointer"></div>
        <div id="minimap-zoom"></div>
    </div>


</main>
</main>

<!-- Popup positioning for markers: toggle and place popup to the left/right so it doesn't cover the marker -->
<script>
(function(){
    const map = document.querySelector('.map');
    if(!map) return;

    const markers = document.querySelectorAll('.marker');

    function closeAll() {
        document.querySelectorAll('.map-popup.open').forEach(p => {
            p.classList.remove('open');
            p.style.left = '';
            p.style.top = '';
        });
    }

    function positionPopup(popup, marker) {
        const mapRect = map.getBoundingClientRect();
        const markerRect = marker.getBoundingClientRect();

        // Measure popup after making it visible
        popup.style.visibility = 'hidden';
        popup.classList.add('measuring');
        popup.style.display = 'block';
        const popupRect = popup.getBoundingClientRect();
        const popupW = popupRect.width || 280;
        const popupH = popupRect.height || 160;
        popup.classList.remove('measuring');
        popup.style.visibility = '';

        // Vertical center aligned to marker
        let top = markerRect.top + (markerRect.height / 2) - (popupH / 2) - mapRect.top;
        // keep inside map bounds
        if (top < 8) top = 8;
        if (top + popupH > mapRect.height - 8) top = Math.max(8, mapRect.height - popupH - 8);

        // Prefer placing to the right of the marker (small gap)
        // If there's not enough room on the right, place left (small gap)
        if (left + popupW > mapRect.width - 8) {
            left = markerRect.left - mapRect.left - popupW - 6;
        }

        popup.style.top = Math.round(top) + 'px';
        popup.style.left = Math.round(left) + 'px';
    }

    markers.forEach(marker => {
        marker.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('href').replace('#', '');
            const popup = document.getElementById(id);
            if (!popup) return;

            const alreadyOpen = popup.classList.contains('open');
            closeAll();
            if (!alreadyOpen) {
                popup.classList.add('open');
                // Position after it's visible so sizes are correct
                positionPopup(popup, this);
            }
        });
    });

    // Close when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.marker') && !e.target.closest('.map-popup')) {
            closeAll();
        }
    });

    // Reposition open popups on resize/scroll
    window.addEventListener('resize', function() {
        document.querySelectorAll('.map-popup.open').forEach(popup => {
            const marker = document.querySelector(`a[href="#${popup.id}"]`);
            if (marker) positionPopup(popup, marker);
        });
    });
    window.addEventListener('scroll', function() {
        document.querySelectorAll('.map-popup.open').forEach(popup => {
            const marker = document.querySelector(`a[href="#${popup.id}"]`);
            if (marker) positionPopup(popup, marker);
        });
    }, true);

})();
</script>

<script src="js/panorama.js"></script>
</body>

</html>