<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Battle Quiz</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="icon" type="image/png" href="img/mushroom.png" sizes="16x16">

</head>
<style>
  
    form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    label {
        font-weight: bold;
    }

    span {
        color: red;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

  

    #emailHelp {
        font-size: 14px;}

</style>
<body>
    <header>
        <link rel="icon" type="image/png" href="img/board-game.png" sizes="16x16">
        <h1> <a href="test.html"><img src="img/board-game.png" alt="icon" width="50" height="50"> Battle Quiz</h1></a>
        <nav>
            <ul class="right">
                <li><a href="regles.html">Règle de jeu</a></li>

                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Quiz</a>
                    <ul>
                        <li><a href="testauthen.php"><img src="img/sign-in.png" alt="icon" width="50" height="50"></a>
                        </li>
                        <li><a href="testins.php"><img src="img/signup.png" alt="icon" width="48" height="48"></a></li>
                    </ul>
                </li>


            </ul>
        </nav>
    </header>
    <main>
        <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $bd = 'projet-chema-amine';
        
                $conn = mysqli_connect($servername, $username, $password, $bd);
                if (isset( $_REQUEST['email'], $_REQUEST['nom'], $_REQUEST['message'])){
               
                 
                  // récupérer l'email 
                  $email = stripslashes($_REQUEST['email']);
                  $email = mysqli_real_escape_string($conn, $email);
                  // récupérer nom
                  $nom= stripslashes($_REQUEST['nom']);
                  $nom = mysqli_real_escape_string($conn, $nom);
                    // récupérer message
                    $mssg = stripslashes($_REQUEST['message']);
                    $mssg= mysqli_real_escape_string($conn, $mssg);
                  
                  $query = "SELECT * FROM users WHERE email = '$email' ";
                  $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                // Insérer les données dans la base de données
                $sql = "INSERT INTO messages (nom, email, message) VALUES ('$nom','$email','$mssg')";

                if (mysqli_query($conn, $sql)) {
                    $message = "Message a été envoyée avec succès";
                } else {
                    $message = "Erreur: " . $sql . "<br>" . mysqli_error($conn);
                }
               
            } else {
                $message = " cet email n'existe pas.";
            }
                    }
                ?>
               
        <form>

            <div class="mb-3">
                <label for="exampleInputNom" class="form-label">Nom</label><span>*</span>
                <input type="text" class="form-control" id="exampleInputNom" name="nom">
        
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1=" class="form-label">Email address</label><span>*</span>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputMssg" class="form-label">Message</label>
                <br>
                <textarea name="message" class="form-control"></textarea>
        
            </div>
        
            <label for="exampleInputChmp">(*) Champs obligatoires</label>
            <br><br>
            <button type="sumbit" style="padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        color: #fff;
        background-color: #fb911f;">Envoyer</button>
            
            <br><br>
        <?php if (!empty($message)) { ?>
            <p style="color:red">
                <?php echo '<h2 style="color:red">' . $message . '</h2>'; ?>
            </p>
        <?php } ?>
        </form>
    </main>

    <audio autoplay>
      <source src="Super Mario Bros. Theme Song.mp3" type="audio/mpeg">
      Votre navigateur ne supporte pas la lecture de cet audio.
    </audio>

</body>

</html>