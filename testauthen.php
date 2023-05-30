<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'authentifier</title>
  
   
   
    
</head>
<style>
  body{
    box-sizing: border-box;
    font-family: sans-serif;
    min-height: 100vh;
    background: url('img/bg.png') no-repeat center center/cover;
  }
    .container {
  width: 50%;
  margin-top: 50px;
  margin-left: 400px;
  padding: 30px;
  background-color: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

h2 {
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
}

.form {
  display: flex;
  flex-direction: column;
}

.form-control {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #333;
}

input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

i {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
}

i.fa-check-circle {
  color: green;
  display: none;
}

i.fa-exclamation {
  color: red;
  display: none;
}

small {
  display: none;
  color: red;
}

button[type="submit"] {
  background-color: #333;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #555;
}
</style>
<body>
 <a href="test.html"><img src="img/board-game.png" alt="icon" width="80" height="80"></a>
    
    <div class="container">
        <div>
            <h2 style="margin: 0;
    text-align: center;
    font-style: italic;">S'authentifier</h2>
        </div>
        <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $bd = 'projet-chema-amine';

        $conn = mysqli_connect($servername, $username, $password, $bd);
        if (isset( $_REQUEST['emal'], $_REQUEST['pass'])){
       
         
          // récupérer l'email 
          $email = stripslashes($_REQUEST['emal']);
          $email = mysqli_real_escape_string($conn, $email);
          // récupérer le mot de passe 
          $password = stripslashes($_REQUEST['pass']);
          $password = mysqli_real_escape_string($conn, $password);
          
          $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
          $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) == 1){
                $user = mysqli_fetch_assoc($res);
                // vérifier si l'utilisateur est un administrateur ou un utilisateur
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['password'] = $user['password'];
                $_SESSION['image_profil']=$user['image_profil'];
                if ($user['role'] == 'admin') {
                    header('location: consulter.php');
                } else {
                    header('location: thèmes.php');
                }
            }else {
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";}
            }
        ?>
        <form class="form" id="form" action="" method="post"  >
           
            <div class="form-control ">
                <label for="">Email</label>
                <input type="email"  name="emal">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <small>Message d'erreur</small>
            </div>
            <div class="form-control">
                <label for="">Mot de passe</label>
                <input type="password"  name="pass">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <small>Message d'erreur</small>
            </div>
            
            <button type="submit" > <i class="fas fa-user-plus"></i> Se connecter</button>
            <?php if (! empty($message)) { ?>
    <p style="color:red"class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
        </form>
     
    </div>
    <audio autoplay>
      <source src="Simple Plan - Whats New Scooby Doo (Official Lyric Video).mp3" type="audio/mpeg">
      Votre navigateur ne supporte pas la lecture de cet audio.
    </audio>
</body>
 
</html>