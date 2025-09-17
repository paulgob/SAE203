<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');

$id_Produit = $_POST['id_Produit'];

$delete = "
    DELETE FROM produit 
    WHERE id_Produit = $id_Produit
";

$result = mysqli_query($mysqli, $delete);

if ($result) {
    echo "Produit $id_Produit supprimé avec succès.";
} else {
    echo "Erreur lors de la suppression du produit.";
}
?>