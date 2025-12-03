    <link rel="stylesheet" href="../css/style.css">

<?php 
include '../includes/header.php';
include '../includes/connect.php';

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