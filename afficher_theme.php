<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter tous les users</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <body
        style=" box-sizing: border-box;
    font-family: sans-serif;
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url('img/bg.png') no-repeat center center/cover;">
        <header class="header">
            <div class="logo"></div>

        </header>
          <a href="consulter.php"><img src="img/fleche.png" alt="icon" width="50" height="50"> </a>
        <div class="container">
            <div>

                <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $bd = 'projet-chema-amine';

                $conn = mysqli_connect($servername, $username, $password, $bd);
                if (!$conn) {
                    die('Erreur : ' . mysqli_connect_error());
                }
                // Requête SQL pour récupérer les utilisateurs
                $requete = "SELECT * FROM reponses";
                $resultat = mysqli_query($conn, $requete);
                // Affichage des utilisateurs dans un tableau HTML
                echo "<table>";
                echo "<tr><th>Theme</th><th>Nom</th><th>Image</th></tr>";
                while ($r = mysqli_fetch_assoc($resultat)) {
               
                    echo "<tr><td>" . $r["titre"] . "</td><td>" . $r["reponse"] .

                        "</td><td><img src='" . $r["image"] . "' style='width: 60px; height: 60px;'></td></tr>";

                }
                ?>
            </div>


        </div>
    </body>

</body>

</html>