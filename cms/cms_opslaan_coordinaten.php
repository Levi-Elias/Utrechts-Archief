<?php
header('Content-Type: application/json');
$raw_post_data = file_get_contents('php://input');
$post_data = json_decode($raw_post_data, true);

//print_r($post_data);

$id = $post_data['id'];
$x_coordinaat = $post_data['x_coord'];
$y_coordinaat = $post_data['y_coord'];

# sql
# include db connectie bestand
# maak pdo sql
# $sql = UPDATE tabel_naam SET x_coordinaat = :x_coordinaat, y_coordinaat = :y_coordinaat WHERE id = :id   


$ge_encodeerde_gegevens = json_encode(array('id' => $id, 'x_coordinaat' => $x_coordinaat, 'y_coordinaat' => $y_coordinaat));
echo $ge_encodeerde_gegevens;
?>