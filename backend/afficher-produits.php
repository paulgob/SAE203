<?php
require_once 'vendor/autoload.php';
$loader = new Twig\Loader\FilesystemLoader(__DIR__);
$twig = new Twig\Environment($loader);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');

$select = "
    SELECT produit.id_Produit, produit.nom, produit.description, produit.stock, produit.prix, categorie.nom AS categorie_nom
    FROM produit
    LEFT JOIN categorie ON produit.id_Categorie = categorie.id_Categorie
";

$total_produits_query = "
    SELECT COUNT(*) AS total_produits
    FROM produit
    ";

$total_animals_query = "
    SELECT COUNT(*) AS total_animals
    FROM produit
    WHERE id_Categorie = 1
    ";

$total_flowers_query = "
    SELECT COUNT(*) AS total_flowers
    FROM produit
    WHERE id_Categorie = 2
    ";

$result = mysqli_query($mysqli, $select);
$produits = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fetch the total counts
$total_produits_result = mysqli_query($mysqli, $total_produits_query);
$total_produits = mysqli_fetch_assoc($total_produits_result);

$total_animals_result = mysqli_query($mysqli, $total_animals_query);
$total_animals = mysqli_fetch_assoc($total_animals_result);

$total_flowers_result = mysqli_query($mysqli, $total_flowers_query);
$total_flowers = mysqli_fetch_assoc($total_flowers_result);

echo $twig->render('afficher-produits.twig.html', [
    'produits' => $produits,
    'total_produits' => $total_produits['total_produits'],
    'total_animals' => $total_animals['total_animals'],
    'total_flowers' => $total_flowers['total_flowers']
]);
?>