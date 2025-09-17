<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Formulaire de Création produit</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 50%
        }
        input {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Ajouter une commande</h1>
    <form action="passer-commande.php" method="POST">
        <?php
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');
                $produit_result = mysqli_query($mysqli, "SELECT * FROM produit;");
                $produit_fetched_result = mysqli_fetch_all($produit_result, MYSQLI_ASSOC);

                echo "<select name='produit'>";

                foreach ($produit_fetched_result as $produit) {
                    echo "<option value='" . $produit["id_Produit"] . "'>" . $produit["nom"] . "</option>";
                }
                echo "</select>";

                $client_result = mysqli_query($mysqli, "SELECT * FROM client;");
                $client_fetched_result = mysqli_fetch_all($client_result, MYSQLI_ASSOC);

                echo "<select name='client'>";

                foreach ($client_fetched_result as $client) {
                    echo "<option value='" . $client["id_Client"] . "'>" . $client["prenom"] . " " . $client["nom"] . "</option>";
                }
                echo "</select>";
            ?>
        <input type="text" name="adresse" placeholder="Adresse de livraison">
        <input type="date" name="date_commande" placeholder="Date de commande">
        <input type="hidden" name="statut" value="en attente">
        <input type="number" name="total" placeholder="Quantité">
        <button type="submit">Passer commande</button>
    </form>
</body>
</html>