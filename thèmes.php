<?php session_start(); ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="theme.css">
  <link rel="stylesheet" href="style.css">
  <title>Thèmes</title>
  <style>
    .modal {
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.modal-content {
			background-color: white;
			margin: 15% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
			max-width: 400px;
			text-align: center;
			position: relative;
		}

		.close {
			color: #aaa;
			position: absolute;
			top: 10px;
			right: 20px;
			font-size: 28px;
			font-weight: bold;
			cursor: pointer;
		}

		.avatar-list {
			display: flex;
			justify-content: space-between;
			align-items: center;
			flex-wrap: wrap;
			margin-top: 20px;
		}

		.avatar {
			width: 50px;
			height: 50px;
			border-radius: 50%;
			cursor: pointer;
			transition: all 0.2s ease-in-out;
		}

		.avatar:hover {
			transform: scale(1.2);
		}
    button {
  background-color: olivedrab; /* couleur de fond */
  border: 2px ;
  border-color: #1ec36dd9;
  border-radius: 4px; 
  padding: 10px 20px; /* espace intérieur */
  text-align: center; /* alignement du texte */
 
  display: inline-block; /* affichage en ligne */
  font-size: 16px; /* taille de police */
  cursor: pointer; /* curseur de la souris */
} 

button:hover {
  background-color: wheat; /* couleur de fond au survol */
}

    .column {
      
      width: 49%;
      vertical-align: top;
      text-align: center;
      line-height: 80px;
      /* Ajout d'une marge de 50px pour descendre les images */
      margin-top: 170px;
      margin-left: 400px;

    }
   input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
}
    .image {
      display: block;
      margin: 0 auto;
      max-width: 100%;
      height: 250px;
    }

    .image1 {
      display: block;
      margin: 0 auto;
      max-width: 100%;
      height: 250px;
    }

    .boite {
      display: block;
      margin: 0 auto;
      width: 200px;
      height: 100px;
      background-color: #f2f2f2;
      border: 1px solid rgb(0, 0, 0);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      /* Ajoute une ombre */
      border-radius: 10px;
      /* Ajoute un effet bombé */
      padding: 10px;
    }

    .profile {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      font-family: 'Comic Sans MS';
    }

    .profile img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .profile h3 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .profile a {
      color: #007bff;
      text-decoration: none;
      margin-top: 10px;
    }

    .profile a:hover {
      text-decoration: underline;
    }

   .navigation {
  list-style: none;
  margin: 10px;
  padding-left: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f2f2f2;
}

.navigation li {
  margin: 0 10px;
}

.navigation li a {
  text-decoration: none;
  color: #333;
  font-size: 16px;
  padding: 10px 20px;
  border-radius: 5px;
}

.navigation li a:hover {
  background-color: #333;
  color: #fff;
}
 /* Style pour la boîte de dialogue */
        .dialog-box {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .dialog-box2 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        /* Style pour le contenu de la boîte de dialogue */
        .dialog-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        /* Style pour le bouton de soumission */
        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            border-radius: 4px;
            border: 2px ;
            border-color: #1ec36dd9;
        }

        /* Style pour le champ de texte */
        input[type=text] {
            padding: 10px;
            border-radius: 5px;
           
            width: 100%;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

  </style>
</head>

<body
  style=" box-sizing: border-box;
    font-family: sans-serif;
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url('img/bg.png') no-repeat center center/cover;">
  
  
  <header class="header">
    <div class="logo"></div>
  
    <div class="profile">
      
      
      <?php

      
      if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];
        $photo=$_SESSION['image_profil'];
        echo "<img src='" . $photo . "' style='width: 100px; height: 100px;' class='profile-picture'><img src='img/edit.png' style='width: 30px; height: 30px;'  onclick='showDialogPhoto()' >";
        echo "<ul>
         <li><p> Username : $username 
               <img src='img/edit.png' style='width: 30px; height: 30px;'  onclick='showDialog()'></p></li>
         <li> <p> Email : $email  </p></li>
         <button><a href='deconnexion.php' style='color: white; text-decoration: none; '>Se déconnecter</a> </button>
         <button><a href='modifier_mdp.php' style='color: white;  text-decoration: none;' >Modifier Mot De Passe</a> </button>
          </ul>";
          
      } 
      ?>

  </header>
  
  </div>
  <div class="profile">
    <div>
      <?php

      if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h3 style='margin: 0;
      text-align: center;
      font-style: italic;'>Bonjour " . $username . "!</h3>";
      }
      ?>
    </div>

  </div>
   <!-- Boîte de dialogue -->
    <div id="dialog-box" class="dialog-box">
        <div class="dialog-content">
       <?php
      $servername = 'localhost';
      $username = 'root';
      $password = '';
      $bd = 'projet-chema-amine';

      $conn = mysqli_connect($servername, $username, $password, $bd);
      if (!$conn) {
        die('Erreur : ' . mysqli_connect_error());
      }
      if (isset($_REQUEST['new-value'], $_REQUEST['id'])) {


        // Récupérer la nouvelle valeur de l'username
        $new_nom = stripslashes($_REQUEST['new-value']);
        $new_nom = mysqli_real_escape_string($conn, $new_nom);
        $id = stripslashes($_REQUEST['id']);
        $id = mysqli_real_escape_string($conn, $id);


        $i = intval($id);
        // Préparer la requête SQL
        $sql = "UPDATE users SET username='$new_nom' WHERE id= $i";

        // Exécuter la requête SQL
        if (mysqli_query($conn, $sql)) {
          $message = "Votre nom a été modifié. Fermez votre compte et ouvrez-le pour vérifier.";


        } else {
          echo $i;
        }
      }

      // Fermer la connexion
      mysqli_close($conn);
      ?>
      <?php

      if (isset($_SESSION['username'])) {
        $id = $_SESSION['id'];
        echo "
           <img src='img/croix.png' style='width: 30px; height: 30px;'  onclick='closeDialog()' />
           <h3>Tapez nouveau nom :</h3>
            <form>
            
            <input type='hidden' name='id' value='$id'>
            <input type='text' name='new-value'>
            <button class='submit-button' >Valider</button>
            
            </form>";

      }
      ?>
  
    </div>
  </div>
<?php if (!empty($message)) { ?>
 
      <?php echo   "<div style='background-color: white; border: 1px solid black; padding: 10px;'><h3 style='color:green'>".$message."</h3></div>"; ?>
   
  <?php } ?>
  <?php
        if (isset($_SESSION['messg_mtp'])) {
          $mssg=$_SESSION['messg_mtp'];
        
       
        ?>
        <?php echo "<div style='background-color: white; border: 1px solid black; padding: 10px;'><h3 style='color:green'>".$mssg."</h3></div>"; }?>
        <?php
        if (isset($_SESSION['messg_photo'])) {
          $mssg = $_SESSION['messg_photo'];


          ?>
          <?php echo "<div style='background-color: white; border: 1px solid black; padding: 10px;'><h3 style='color:green'>" . $mssg . "</h3></div>";
        } ?>
  <div class="column">
       <ul class="navigation">
          <li><a href="quiz.php">Choisissez un thème de pays</a></li>
          <li><a href="quiz_logo.php">Choisissez un thème de logo</a></li>
        </ul>

  </div>


    <div id="dialog-box2" class="dialog-box2">
      <div class="dialog-content">
        <?php

      if (isset($_SESSION['username'])) {
        $id = $_SESSION['id'];
        echo'<form action="modifier_photo.php" method="post"  enctype="multipart/form-data">
          <img src="img/croix.png" style="width: 30px; height: 30px;"  onclick="closeDialog2()" />
        
          
         
           
              <span class="close">&times;</span>
              <h2>Choisissez votre avatar</h2>
             
                <img src="Test/1.png" alt="Avatar 1" class="avatar">
                <img src="Test/2.png" alt="Avatar 2" class="avatar">
                <img src="Test/3.png" alt="Avatar 3" class="avatar">
                <img src="Test/4.png" alt="Avatar 4" class="avatar">
                <img src="Test/5.png" alt="Avatar 5" class="avatar">
                <img src="Test/6.png" alt="Avatar 6" class="avatar">
                <img src="Test/7.png" alt="Avatar 7" class="avatar">
                <img src="Test/8.png" alt="Avatar 8" class="avatar">
                <img src="Test/9.png" alt="Avatar 9" class="avatar">
                <img src="Test/10.png" alt="Avatar 10" class="avatar">
                <img src="Test/11.png" alt="Avatar 11" class="avatar">
                <img src="Test/12.png" alt="Avatar 12" class="avatar">
                <img src="Test/13.png" alt="Avatar 13" class="avatar">
                <img src="Test/14.png" alt="Avatar 14" class="avatar">
                <img src="Test/15.png" alt="Avatar 15" class="avatar">
                <img src="Test/18.png" alt="Avatar 16" class="avatar">
            
         
          <input type="hidden" name="id" value="'.$id.'">
          <input type="file" name="image" id="image"><br><br>
         <input type="submit" value="Modifier" >
        </form>';
      }
       ?>
      </div>
    <script>
        // Récupération de la boîte de dialogue et du bouton de fermeture
        var dialogBox = document.getElementById("dialog-box");
        var dialogboxphoto=document.getElementById("dialog-box2");
        const avatars = document.querySelectorAll('.avatar');
        const profilePicture = document.querySelector('.profile-picture');
        function showDialogPhoto() {
           dialogboxphoto.style.display = "block";
        }
        // Fonction pour afficher la boîte de dialogue
        function showDialog() {
            dialogBox.style.display = "block";
        }
        // Fonction pour fermer la boîte de dialogue2
         function closeDialog2() {
            dialogboxphoto.style.display = "none";
        }
        // Fonction pour fermer la boîte de dialogue
        function closeDialog() {
            dialogBox.style.display = "none";
        }
       avatars.forEach((avatar) => {
		   avatar.addEventListener("click", () => {
			const newAvatarSrc = avatar.getAttribute("src");
			profilePicture.setAttribute("src", newAvatarSrc);
			modal.style.display = "none";
		});
	});
    
    </script>
    <audio autoplay>
      <source src="SpongeBob SquarePants Theme Song (NEW HD)  Episode Opening Credits  Nick Animation.mp3" type="audio/mpeg">
      Votre navigateur ne supporte pas la lecture de cet audio.
    </audio>
</body>


</html>