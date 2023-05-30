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

    h2 {
        color: #333;
    }

    div {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        margin: 20px auto;
        max-width: 600px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    button,
    a {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 20px;
        text-decoration: none;
        font-size: 18px;
        cursor: pointer;
    }

    button:hover,
    a:hover {
        background-color: #0069d9;
    }

    input[type="text"] {
        border-radius: 5px;
        border: 2px solid #ccc;
        padding: 10px;
        width: 100%;
        max-width: 400px;
        margin-top: 10px;
        box-sizing: border-box;
    }

    table {
        border-collapse: collapse;
        margin: 20px auto;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }
</style>

<body>
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

    // Initialisation du score
    $score = 0;

    // Parcours des résultats de la requête avec une boucle while
    while ($row = mysqli_fetch_assoc($resultat)) {
        // Récupération de la réponse correcte de la question
        $reponse_correcte = $row["reponse"];

        // Récupération de la réponse sélectionnée par l'utilisateur
        $reponse_utilisateur = $_POST["q" . $row["id"]];

        // Vérification de la réponse
        if ($reponse_utilisateur == $reponse_correcte) {
            $score++;
        }
    }



    // Affichage du score
    echo "<div><h2>Votre score</h2> <br> " . $score . "<br><a href='affich_rep_logo.php'>
   Vérifier les réponses
</a>
</div>";

// Affichage de la chanson en fonction du score
if ($score == 0) {
    echo "<audio autoplay ><source src='daniel-powter-bad-day-official-music-video-hd-onlinevideoconvertercom_6rDTavjT.mp3' type='audio/mpeg'></audio>";
} else {
    echo "<audio autoplay ><source src='queen-we-are-the-champions-official-video_pru3G86o.mp3' type='audio/mpeg'></audio>";
}

    ?>
</body>

</html>