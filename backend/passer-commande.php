<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            margin: 5px;
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .delete {
            background-color: #f44336;
        }

        .update {
            background-color: #4CAF50;
        }

        a {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    

    <h1>Passer commandes</h1>
    
    <h2>Récapitulatif de la commande</h2>
    <table>
        <thead>
            <tr>
                <th>Adresse de livraison</th>
                <th>Date de commande</th>
                <th>Statut</th>
                <th>Quantité</th>
                <th>Produit</th>
                <th>Client</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 

                $adresse = $_POST['adresse'];
                $date_commande = $_POST['date_commande'];
                $statut = $_POST['statut'];
                $total = $_POST['total'];
                $id_Produit = $_POST['produit'];
                $id_Client = $_POST['client'];
                
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');
                $produit = mysqli_query($mysqli, "SELECT nom FROM produit WHERE id_Produit = $id_Produit;");
                $produit_result = mysqli_fetch_assoc($produit);
                $produit = $produit_result['nom'];

                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');
                $client = mysqli_query($mysqli, "SELECT prenom, nom FROM client WHERE id_Client = $id_Client;");
                $client_result = mysqli_fetch_assoc($client);
                $client = $client_result['prenom'] . " " . $client_result['nom'];                

                echo "<td>" . $adresse . "</td>";
                echo "<td>" . $date_commande . "</td>";
                echo "<td>" . $statut . "</td>";
                echo "<td>" . $total . "</td>";
                echo "<td>" . $produit . "</td>";
                echo "<td>" . $client . "</td>";

                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');
                $prix = mysqli_query($mysqli, "SELECT prix FROM produit WHERE id_Produit = $id_Produit;");
                $prix_result = mysqli_fetch_assoc($prix);
                $prix_total = $prix_result['prix'] * $total;
                echo "<td>" . $prix_total . "€" . "</td>";


                ?>
            </tr>
        </tbody>
    </table>

    <h2>Etat de la commande</h2>
    <?php 
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost', 'root', '', 'db-animals-flowers');
    $result = mysqli_query($mysqli, "INSERT INTO commande(adresse, date_commande, statut, total, id_Produit, id_Client) VALUES ('$adresse', '$date_commande', '$statut', $total, $id_Produit, $id_Client);");
    if ($result) {
        echo "<p>Commande passée avec succès !</p>";
    } else {
        echo "<p>Erreur lors de la passation de la commande.</p>";
    }

    ?>
</body>
</html>