<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');

$id_Produit = $_POST['id_Produit'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];

$select = "
    SELECT id_Categorie
    FROM categorie
    WHERE nom = '$categorie'
    ";

$select_result = mysqli_query($mysqli, $select);

if (!$select_result) {
    echo "Erreur lors de la sélection de la catégorie.";
    exit;
}

$categorie = mysqli_fetch_assoc($select_result);

foreach ($categorie as $key => $value) {
    $id_categorie = $value; // Get the id_Categorie from the result
}

$update = "
    UPDATE produit
    SET nom = '$nom', description = '$description', stock = $stock, prix = $prix, id_categorie = $id_categorie
    WHERE id_Produit = $id_Produit
";

$update_result = mysqli_query($mysqli, $update);

if ($update_result) {
    echo "Produit $id_Produit modifié avec succès.";
} else {
    echo "Erreur lors de la modification du produit.";
}
?>