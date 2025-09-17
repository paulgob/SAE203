<?php

require_once 'vendor/autoload.php'; 
$loader = new Twig\Loader\FilesystemLoader(__DIR__);
$twig = new Twig\Environment($loader);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');

$id_Produit = $_POST['id_Produit'];

$select = "
    SELECT produit.id_Produit, produit.nom, produit.description, produit.stock, produit.prix, categorie.nom AS categorie_nom
    FROM produit
    LEFT JOIN categorie ON produit.id_Categorie = categorie.id_Categorie
    WHERE produit.id_Produit = $id_Produit
";

$result = mysqli_query($mysqli, $select);

$produit = mysqli_fetch_assoc($result);

echo $twig->render('formulaire-actualiser-produit.twig.html', ['produit' => $produit]);
?>