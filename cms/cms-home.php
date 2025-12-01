<?php 
include 'header_cms.php';
include '../includes/connect.php';

if (isset($_GET['image_url']) && isset($_GET['title']) && !empty($_GET['image_url']) && !empty($_GET['title'])) {
    $image_url = htmlspecialchars($_GET['image_url']);
    $title = htmlspecialchars($_GET['title']);
    
    $stmt = $conn->prepare("INSERT INTO slideshow (image_url, title)
  VALUES (:image_url, :title)");
  $stmt->bindParam(':image_url', $image_url);
  $stmt->bindParam(':title', $title);

  // insert a row
  $stmt->execute();
}
?>

<div class="cms-intro">
    <h2>Content Management Systeem</h2>
    <p>Welkom bij het CMS. Hier kunt u de inhoud van uw website beheren.</p>
</div>
<div class="cms-container">

    <?php include '../includes/cms_links_paginas.php'; ?>

    <div class="cms-inhoud">
    <form action="homepagina_cms.php" method="GET">
        <label for="image_url" class="gegevens">image_url:</label>
        <input type="url" id="image_url" name="image_url" placeholder="Enter your image_url" required class="gegevens_invoer"><br>
        
        <label for="title" class="gegevens">title:</label>
        <input type="text" id="title" name="title" placeholder="Enter your title" required class="gegevens_invoer"><br>

        <button type="submit" class="aanmelden_button">toevoegen</button>
    </form>


    <?php
$pdo = new PDO("mysql:host=localhost;dbname=5.2cms", "root", "");

// $id = 6; // voorbeeld-id
$stmt = $pdo->prepare("SELECT * FROM slideshow");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->execute();
foreach ($result as $slideshow) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($slideshow['title']) . "</h3>";
    echo "<img src='" . htmlspecialchars($slideshow['image_url']) . "' alt='" . htmlspecialchars($slideshow['title']) . "' style='max-width:200px;'><br>";

    echo "<form method='post' action='homepagina_cms.php' onsubmit='return confirm(\"Weet je zeker dat je dit wilt verwijderen?\");'>";
    echo "<input type='hidden' name='id' value='" . htmlspecialchars($slideshow['id']) . "'>";
    echo "<button type='submit'>Verwijderen</button>";
    echo "</form>";

    echo "</div>";
}

if (isset($_POST['id'])) {
    $id = (int)$_POST['id']; // zorg dat het een integer is
    $stmt = $conn->prepare("DELETE FROM slideshow WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo "Record verwijderd!";
} else {
    echo "Geen ID ontvangen om te verwijderen.";
}


?>

    </div>

</div>



<?php include '../includes/footer.php'; ?>