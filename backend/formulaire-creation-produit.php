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
    <h1>Ajouter un produit</h1>
    <form action="creer-produit.php" method="POST">
            <?php
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');
                $result = mysqli_query($mysqli, "SELECT * FROM categorie;");
                $fetched_result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                echo "<select name='categorie'>";

                foreach ($fetched_result as $data) {
                    echo "<option value='" . $data["id_Categorie"] . "'>" . $data["nom"] . "</option>";
                }
                echo "</select>";
            ?>
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="description" placeholder="Description">
        <input type="number" name="stock" placeholder="Stock">
        <input type="number" name="prix" placeholder="Prix">
        <button type="submit">Créer produit</button>
    </form>
</body>
</html>