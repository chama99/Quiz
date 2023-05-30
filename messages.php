<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter tous les messages</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            box-sizing: border-box;
            font-family: sans-serif;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url('img/123.png') no-repeat center center/cover;
        }

        .container {
            margin: auto;
            margin-top: 130px;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            color: #333;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #77b5fe;
            color: white;
            font-weight: bold;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <a href="consulter.php"><img src="img/fleche.png" alt="icon" width="50" height="50"></a>
    <div class="container">
        <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $bd = 'projet-chema-amine';

        $conn = mysqli_connect($servername, $username, $password, $bd);
        if (!$conn) {
            die('Erreur : ' . mysqli_connect_error());
        }
        // Requête SQL pour récupérer les messages
        $requete = "SELECT * FROM messages";
        $resultat = mysqli_query($conn, $requete);
        // Affichage des messages dans un tableau HTML
        echo "<table>";
        echo "<tr><th>Nom</th><th>Email</th><th>Message</th></tr>";
        while ($message = mysqli_fetch_assoc($resultat)) {
            echo "<tr>";
            echo "<td>" . $message["nom"] . "</td>";
            echo "<td>" . $message["email"] . "</td>";
            echo "<td>" . $message["message"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>

</html>
