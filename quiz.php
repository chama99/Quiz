<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Wuiz</title>


</head>
<style>
    /* Mise en forme générale */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("img/bg.png");
  background-size: cover;
  background-position: center;
}
h1 {
        color: #000;
    }

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

/* Style du titre */
#title {
  text-align: center;
  font-size: 36px;
  margin-bottom: 20px;
}

/* Style du formulaire */
form {
  display: flex;
  flex-direction: column;
}

/* Style du tableau de questions */
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 10px;
  text-align: left;
}

th {
        background-color: #9e9e41;
    }

td img {
  display: block;
  margin: 0 auto;
}

/* Style du bouton de soumission */
input[type="submit"] {
  margin-top: 20px;
  background-color: #9e9e41;
  color: #000;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #9e9e41;
}

</style>
<body>
    <a href="thèmes.php"><img src="img/fleche.png" alt="icon" width="50" height="50"> </a>
    <h1 id="title">Quiz</h1>
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
                            
                            $requete = "SELECT * FROM reponses where titre='pays'";
                            $resultat = mysqli_query($conn, $requete);
                             // Initialisation du tableau de questions
                             $images = array();
                            while ($row = mysqli_fetch_assoc($resultat)) {
                                $image = array(
                                "id" => $row["id"],
                                "reponse" => $row["reponse"],
                                "image" => $row["image"],
                                
                                    );
                                // Ajout de l'image au tableau de images
                                array_push($images, $image);
                                                }
                               

                                // Affichage du formulaire de quiz
                                  echo '<form action="traitement_quiz.php" method="POST">';
                                  echo "<table>";
                                  echo "<tr><th>Pays</th><th>Votre reponse</th></tr>";
                                    foreach ($images as $image) {
                                    echo "<tr><td><img src='" . $image["image"] .
                                     "' style='width: 60px; height: 60px;'></td><td><input type='text' name='q" . $image['id'] ."'value=''> </td></tr>";
                                 
                                   
                                   
                                }
                                 echo "</table>";
                                echo '<input type="submit" value="Soumettre">';
                                echo '</form>';
                            ?>
            
        </div>

      
</body>
<audio autoplay>
      <source src="GTA San Andreas Theme Song Full ! !.mp3" type="audio/mpeg">
      Votre navigateur ne supporte pas la lecture de cet audio.
    </audio>
</html>