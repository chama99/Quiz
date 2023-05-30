
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="style.css">
    <title>Consulter</title>
    <style>
		.column {
			display: inline-block;
			width: 30%;
			vertical-align: top;
			text-align: center;
			line-height: 20px; /* Ajout d'une marge de 50px pour descendre les images */
            margin-top: 170px;

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
		  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Ajoute une ombre */
      border-radius: 10px; /* Ajoute un effet bombé */
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
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
.titi {
    
}

	</style>
</head>

<body
    style=" box-sizing: border-box;
    font-family: sans-serif;
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url('img/wallpaperflare.com_wallpaper (1).jpg') no-repeat center center/cover;">
    <header class="header">
        <div class="logo"></div>
        
<div class="profile">
        <img src="robot.png" alt="Avatar">
        <?php
        
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $id = $_SESSION['id'];
            echo "<ul>
         <li><p> Username : $username </p></li>
         <li> <p> Email : $email </p></li>
         <button><a href='deconnexion.php'>Se déconnecter</a> </button>
          </ul>";
        } else {
            echo 'jkkkkk';
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
        } else {
            echo 'jkkkkk';
        }
        ?>
        </div>        

    </div>
    <div class="column">
		<a href="ajoutertheme.html">
			<img class="image" src="quiz.png" alt="Image 1"> <br>
			<div class="boite">
				<p>Quiz</p>        
			</div>
		</a>		
	 </div>
    <div class="column">
      <a href="consulterusers.php">
        <img class="image1" src="add-group.png" alt="Image 2"> <br>
        <div class="boite">
          <p >Utilisateurs</p>
        </div>
        </a>
        
    </div>		
      <div class="column">
      <a href="messages.php">
        <img class="image1" src="img/message.png" alt="Image 3"> <br>
        <div class="boite">
          <p >Messages</p>
        </div>
        </a>
        
    </div>	
	</div>
</body>

</html>