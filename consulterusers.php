<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter tous les users</title>
     <link rel="stylesheet" href="style.css">
     <style>
        body {
            box-sizing: border-box;
            font-family: sans-serif;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url('img/wallpaperflare.com_wallpaper (7).jpg') no-repeat center center/cover;
        }
        .container {
            margin: 0 auto;
            max-width: 1000px;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            margin-top: 130px;
        }
        table {
           
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding:5px;
            border-bottom: 1px solid #ddd;
            width: 100px;
        }
        th {
            background-color: #4CAF50;
            color: white;
            
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #333;
        }
        a:hover {
            color: #000;
        }
        img {
            width: 30px;
            height: 30px;
        }
        .back {
            display: block;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
   <body
    style=" box-sizing: border-box;
    font-family: sans-serif;
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url('img/wallpaperflare.com_wallpaper (7).jpg') no-repeat center center/cover;">
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
            $requete = "SELECT * FROM users where role != 'admin'";
            $resultat = mysqli_query($conn, $requete);
            // Affichage des utilisateurs dans un tableau HTML
             echo "<table>";
             echo "<tr><th>Nom d'utilisateur</th><th>Email</th><th>Supprimer</th></tr>";
             while ($utilisateur = mysqli_fetch_assoc($resultat)) {

               echo "<tr><td>" . $utilisateur["username"] . "</td><td>" . $utilisateur["email"] . 
               "</td> <td><a href='supprimer_utilisateur.php?id=" . $utilisateur["id"] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet utilisateur ?\")'>
               <img src='img/icone_supprimer.jpg' style='width: 30px; height: 30px;'></a></td></tr>" ;

         }
        ?>
        </div>
       

    </div>
</body>
 
</body>
</html>