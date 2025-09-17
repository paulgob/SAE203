<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');

$nom = $_POST['nom'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];

$insert = "INSERT INTO produit (nom, description, stock, prix, id_categorie) VALUES ('" . $nom . "', '" . $description . "', '" . $stock . "', '" . $prix . "', '" . $categorie . "')";

$result = mysqli_query($mysqli, $insert);
if (!$result) {
    echo "Erreur !";
} else {
    echo "Le produit a bien été ajouté !"; 
} 
?>