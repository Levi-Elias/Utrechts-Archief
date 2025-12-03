<?php
include 'includes/connect.php'; // jouw database connectie

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Controleer of het id geldig is
    if (!is_numeric($id)) {
        die("Ongeldig ID.");
    }

    try {
        // Verwijder record met het opgegeven id
        $stmt = $pdo->prepare("DELETE FROM hotspots WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Terug naar indexpagina na verwijderen
            header("Location: index.php?verwijderd=1");
            exit;
        } else {
            echo "⚠️ Er ging iets mis bij het verwijderen.";
        }

    } catch (PDOException $e) {
        echo "Database fout: " . $e->getMessage();
    }
} else {
    echo "Geen ID opgegeven.";
}
?>
