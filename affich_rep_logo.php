<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("img/bg.png");
    }
    table {
        border-collapse: collapse;
        margin: 20px auto;
        font-size: 18px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }
     td{
        background-color: white;
     }
    th {
        background-color: #ddd;
    }

    img {
        display: block;
        margin: 0 auto;
    }
</style>

<body>
     <a href="thèmes.php"><img src="img/fleche.png" alt="icon" width="50" height="50"> </a>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $bd = 'projet-chema-amine';

    $conn = mysqli_connect($servername, $username, $password, $bd);
    if (!$conn) {
        die('Erreur : ' . mysqli_connect_error());
    }
    // Requête SQL pour récupérer toutes les questions
    $resultat = mysqli_query($conn, "SELECT * FROM reponses where titre='logo'");

    // Affichage des utilisateurs dans un tableau HTML
    echo "<table>";
    echo "<tr><th>Nom</th><th>Image</th></tr>";
    while ($r = mysqli_fetch_assoc($resultat)) {

        echo "</td><td>" . $r["reponse"] .

            "</td><td><img src='" . $r["image"] . "' style='width: 60px; height: 60px;'></td></tr>";

    }





    ?>
</body>
<audio autoplay>
      <source src="bee-gees-stayin-alive-official-video_S9VgP8tX.mp3" type="audio/mpeg">
      Votre navigateur ne supporte pas la lecture de cet audio.
    </audio>

</html>