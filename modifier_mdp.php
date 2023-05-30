
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mot de passe</title>
     <link rel="stylesheet" href="style.css">
     <style>
        body {
            box-sizing: border-box;
            font-family: sans-serif;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url('img/bg.png') no-repeat center center/cover;
        }
        .container {
            margin: 0 auto;
            max-width: 800px;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            margin-top: 250px;
        }
     </style>
</head>

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
    session_start();
    if (isset($_SESSION['username'])) {
        $id = $_SESSION['id'];
        $password = $_SESSION['password'];}
    if (isset($_REQUEST['new-mtp'], $_REQUEST['mtp'])) {


        // Récupérer la nouvelle valeur de l'username
        $new_pass = stripslashes($_REQUEST['new-mtp']);
        $new_pass = mysqli_real_escape_string($conn, $new_pass);

        $pass = stripslashes($_REQUEST['mtp']);
        $pass = mysqli_real_escape_string($conn, $pass);

        $i = intval($id);
        // Préparer la requête SQL
        $sql = "UPDATE users SET password='$new_pass' WHERE id= $i";
      if ($pass == $password){
            if (mysqli_query($conn, $sql)) {
                $message = "Votre mot de passe a été modifié. Fermez votre compte et ouvrez-le pour vérifier.";
                header('location:thèmes.php');

            } else {
                echo "erreur";
            }
      }else {
        $message=" mot de passe invalide";
      }
    
        $_SESSION['messg_mtp'] = $message;
      
    }
    ?>
 <div class="container">
    <form class="form">
            
            <label for="">Mot de passe actuel</label><br><br>
            <input type="password" id="password" name="mtp"><br><br>
         <?php if (!empty($message)) { ?>
            <p style="color:red">
                <?php echo $message; ?>
            </p>
        <?php } ?>
        <label for="">Nouveau mot de passe</label>
        <input type='password' name='new-mtp'><br><br>
        <button class='submit-button'>Valider</button>
    
    </form>
 </div>
 
</body>

</html>