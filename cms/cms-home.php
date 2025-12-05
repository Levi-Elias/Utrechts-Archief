<?php
include '../includes/connect.php';
include '../includes/header.php';

if (isset($_GET['beschrijving']) && isset($_GET['naam']) && isset($_GET['x_coord']) && isset($_GET['y_coord']) && !empty($_GET['beschrijving']) && !empty($_GET['naam']) && !empty($_GET['x_coord']) && !empty($_GET['y_coord'])) {
    $beschrijving = htmlspecialchars($_GET['beschrijving']);
    $naam = htmlspecialchars($_GET['naam']);
    $x_coord = htmlspecialchars($_GET['x_coord']);
    $y_coord = htmlspecialchars($_GET['y_coord']);
    
    $stmt = $conn->prepare("INSERT INTO hotspots (beschrijving, naam, x_coord, y_coord)
  VALUES (:beschrijving, :naam, :x_coord, :y_coord)");
  $stmt->bindParam(':beschrijving', $beschrijving);
  $stmt->bindParam(':naam', $naam);
  $stmt->bindParam(':x_coord', $x_coord);
  $stmt->bindParam(':y_coord', $y_coord);

  // insert a row
  $stmt->execute();
}
?>

<div class="cms-intro">
    <h2>Content Management Systeem</h2>
    <p>Welkom bij het CMS. Hier kunt u de inhoud van uw website beheren.</p>
</div>
<div class="cms-container">

    <div class="cms-inhoud">
    <form action="cms-home.php" method="GET">
        <label for="naam" class="gegevens">naam:</label>
        <input type="text" id="naam" name="naam" placeholder="Enter your naam" required class="gegevens_invoer"><br>
        
        <label for="beschrijving" class="gegevens">beschrijving:</label>
        <input type="text" id="beschrijving" name="beschrijving" placeholder="Enter your beschrijving" required class="gegevens_invoer"><br>

        <label for="x_coord" class="gegevens">x_coord:</label>
        <input type="number" id="x_coord" name="x_coord" placeholder="Enter your x_coord" required class="gegevens_invoer"><br>

        <label for="y_coord" class="gegevens">y_coord:</label>
        <input type="number" id="y_coord" name="y_coord" placeholder="Enter your y_coord" required class="gegevens_invoer"><br>
        
        <button type="submit" class="aanmelden_button">toevoegen</button>

    </form>
<main>
<div class="map"></div>

    <div class="panorama">
        <div class="info-container">
            </div>
            <div class="overlay-text">
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
                            <div class="map-item map-item1" id="mydivheader<?php echo $id; ?>" style="left: <?php echo $left; ?>px; top: <?php echo $top; ?>px;">
                                <!-- <a class="marker marker1" id="mydivheader" href="#marker"><strong>i</strong></a> -->
                                 <?php echo $id; ?>
                            </aside>
                        </div>
                        <?php
                        }
                        ?>
                        <!-- <div id="mydivheader">drag</div> -->
                </div>
                <script>
            //         const button = document.getElementById("infoButton");
            //   const panel = document.getElementById("infoPanel");
            
            //   // Voor touchscreen apparaten
            //   button.addEventListener("touchstart", function () {
            //     panel.classList.toggle("active");
            //   });
            
            //   // Voor computers / laptops
            //   button.addEventListener("click", function () {
            //     panel.classList.toggle("active");
            //   });
            </script>
        
            <img src="../img/1.jpg" alt="Panorama Image 1"
                style="height: 500px; z-index: 1; margin-left: 0px; margin-top: 0px;">
            <img src="../img/2.jpg" alt="Panorama Image 2"
                style="height: 500px; z-index: 2; margin-left: 0px; margin-top: 0px;">
            <img src="../img/3.jpg" alt="Panorama Image 3"
                style="height: 497.5px; z-index: 3; margin-left: -40px; margin-top: -1px;">
            <img src="../img/4.jpg" alt="Panorama Image 4"
                style="height: 500px; z-index: 4; margin-left: -43px; margin-top: -5px;">
            <img src="../img/5.jpg" alt="Panorama Image 5"
                style="height: 506px; z-index: 5; margin-left: -56px; margin-top: -8px;">
            <img src="../img/6.jpg" alt="Panorama Image 6"
                style="height: 511px; z-index: 6; margin-left: -60px; margin-top: -12px;">
            <img src="../img/7.jpg" alt="Panorama Image 7"
                style="height: 523px; z-index: 8; margin-left: -71px; margin-top: -13px;">
            <img src="../img/8.jpg" alt="Panorama Image 8"
                style="height: 502px; z-index: 7; margin-left: -44px; margin-top: -6px;">
            <img src="../img/9.jpg" alt="Panorama Image 9"
                style="height: 514px; z-index: 9; margin-left: -37px; margin-top: -12px;">
            <img src="../img/10.jpg" alt="Panorama Image 10"
                style="height: 511px; z-index: 10; margin-left: -44px; margin-top: -11px;">
            <img src="../img/11.jpg" alt="Panorama Image 11"
                style="height: 515px; z-index: 11; margin-left: -62px; margin-top: -13px;">
            <img src="../img/12.jpg" alt="Panorama Image 12"
                style="height: 518px; z-index: 12; margin-left: -60px; margin-top: -11px;">
            <img src="../img/13.jpg" alt="Panorama Image 13"
                style="height: 515.5px; z-index: 13; margin-left: -37px; margin-top: -11px;">
            <img src="../img/14.jpg" alt="Panorama Image 14"
                style="height: 509px; z-index: 14; margin-left: -45px; margin-top: -6px;">
            <img src="../img/15.jpg" alt="Panorama Image 15"
                style="height: 506px; z-index: 15; margin-left: -59px; margin-top: -4px;">
            <img src="../img/16.jpg" alt="Panorama Image 16"
                style="height: 505px; z-index: 16; margin-left: -54px; margin-top: 1px;">
            <img src="../img/17.jpg" alt="Panorama Image 17"
                style="height: 508px; z-index: 17; margin-left: -36px; margin-top: 1px;">
            <img src="../img/18.jpg" alt="Panorama Image 18"
                style="height: 515px; z-index: 18; margin-left: -40px; margin-top: 1.5px;">
            <img src="../img/19.jpg" alt="Panorama Image 19"
                style="height: 526px; z-index: 19; margin-left: -41px; margin-top: -3px;">
            <img src="../img/20.jpg" alt="Panorama Image 20"
                style="height: 534px; z-index: 21; margin-left: -38px; margin-top: -6px;">
            <img src="../img/21.jpg" alt="Panorama Image 21"
                style="height: 526px; z-index: 20; margin-left: -30px; margin-top: 7px;">
            <img src="../img/22.jpg" alt="Panorama Image 22"
                style="height: 542px; z-index: 22; margin-left: -43px; margin-top: -5px;">
            <img src="../img/23.jpg" alt="Panorama Image 23"
                style="height: 528px; z-index: 23; margin-left: -40px; margin-top: 2px;">
            <img src="../img/24.jpg" alt="Panorama Image 24"
                style="height: 506px; z-index: 24; margin-left: -34px; margin-top: 16px;">
            <img src="../img/25.jpg" alt="Panorama Image 25"
                style="height: 524px; z-index: 25; margin-left: -30px; margin-top: 1px;">
            <img src="../img/26.jpg" alt="Panorama Image 26"
                style="height: 510.5px; z-index: 26; margin-left: -35px; margin-top: 12px;">
            <img src="../img/27.jpg" alt="Panorama Image 27"
                style="height: 527px; z-index: 27; margin-left: -42px; margin-top: 5px;">
            <img src="../img/28.jpg" alt="Panorama Image 28"
                style="height: 540px; z-index: 28; margin-left: -48px; margin-top: -4px;">
            <img src="../img/29.jpg" alt="Panorama Image 29"
                style="height: 534px; z-index: 29; margin-left: -44px; margin-top: -1px;">
            <img src="../img/30.jpg" alt="Panorama Image 30"
                style="height: 531px; z-index: 30; margin-left: -53px; margin-top: 5px;">
            <img src="../img/31.jpg" alt="Panorama Image 31"
                style="height: 540px; z-index: 32; margin-left: -47px; margin-top: 1px;">
            <img src="../img/32.jpg" alt="Panorama Image 32"
                style="height: 535px; z-index: 31; margin-left: -48px; margin-top: -4px;">
            <img src="../img/33.jpg" alt="Panorama Image 33"
                style="height: 539px; z-index: 33; margin-left: -45px; margin-top: -2px;">

            <!-- Map overlay with markers/hotspots (stays fixed during panorama scroll) -->
            <div class="map">
        <?php
        try {
            $stmt = $conn->prepare("SELECT * FROM hotspots");
            $stmt->execute();
            $hotspots = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $hotspots = [];
        }

        foreach ($hotspots as $hotspot) {
            $id = isset($hotspot['id']) ? (int)$hotspot['id'] : 0;
            $left = isset($hotspot['x_coord']) ? (int)$hotspot['x_coord'] : 0;
            $top = isset($hotspot['y_coord']) ? (int)$hotspot['y_coord'] : 0;
            $beschrijving = isset($hotspot['beschrijving']) ? htmlspecialchars($hotspot['beschrijving']) : '';
            $title = isset($hotspot['title']) ? htmlspecialchars($hotspot['title']) : "Hotspot {$id}";
            $label = isset($hotspot['label']) ? htmlspecialchars($hotspot['label']) : $id;

            echo "<a class=\"marker\" href=\"#marker{$id}\" style=\"position:absolute; left: {$left}px; top: {$top}px; z-index:10005;\">{$label}</a>\n";
            echo "<aside id=\"marker{$id}\" class=\"map-popup\">";
            echo "<h3 class=\"popup-title\">{$title}</h3>";
            echo "<div class=\"popup-body\">{$beschrijving}</div>";
            echo "</aside>\n";
        }
        ?>
            </div>

        </div>

    </div>

</main>


    <script src="../js/dnd.js"></script>
    
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

            popup.style.visibility = 'hidden';
            popup.classList.add('measuring');
            popup.style.display = 'block';
            const popupRect = popup.getBoundingClientRect();
            const popupW = popupRect.width || 280;
            const popupH = popupRect.height || 160;
            popup.classList.remove('measuring');
            popup.style.visibility = '';

            let top = markerRect.top + (markerRect.height / 2) - (popupH / 2) - mapRect.top;
            if (top < 8) top = 8;
            if (top + popupH > mapRect.height - 8) top = Math.max(8, mapRect.height - popupH - 8);

            let left = markerRect.right - mapRect.left + 6;
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
                    positionPopup(popup, this);
                }
            });
        });

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.marker') && !e.target.closest('.map-popup')) {
                closeAll();
            }
        });

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

    </script>
    
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr class="data-table__row">
                    <th class="data-table__header">Naam</th>
                    <th class="data-table__header">Beschrijving</th>
                    <th class="data-table__header">X_coord</th>
                    <th class="data-table__header">Y_coord</th>
                    <th class="data-table__header">delete</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
$pdo = new PDO("mysql:host=localhost;dbname=utrechtarchief", "root", "");
$stmt = $pdo->prepare("SELECT * FROM hotspots");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->execute();
?>
        <?php foreach ($result as $rij): ?>
            <tr class="data-table__row">
                <td class="data-table__cell" data-label="Naam">
                    <?= htmlspecialchars($rij['naam']); ?>
                </td>

                <td class="data-table__cell" data-label="Beschrijving">
                    <?= htmlspecialchars($rij['beschrijving']); ?>
                </td>

                <td class="data-table__cell" data-label="X_coord">
                    <?= htmlspecialchars($rij['x_coord']); ?>
                </td>

                <td class="data-table__cell" data-label="Y_coord">
                    <?= htmlspecialchars($rij['y_coord']); ?>
                    </td>

                <td class="data-table__cell" data-label="Y_coord">
                    <?php
                        echo "<form method='post' action='cms-home.php' onsubmit='return confirm(\"Weet je zeker dat je dit wilt verwijderen?\");'>";
                        echo "<input type='hidden' name='id' value='" . htmlspecialchars($rij['id']) . "'>";
                        echo "<button type='submit'>Verwijderen</button>";
                        echo "</form>";
                    ?>  
                </td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php
if (isset($_POST['id'])) {
    $id = (int)$_POST['id']; // zorg dat het een integer is
    $stmt = $conn->prepare("DELETE FROM hotspots WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

} else {
}
?>
    </div>

</div>



<?php include '../includes/footer.php'; ?>