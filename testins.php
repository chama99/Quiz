<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un compte</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="icon" type="image/png" href="img/mushroom.png" sizes="16x16">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
   


</head>

<body>
     
     <h1> <a href="test.html"><img src="img/board-game.png" alt="icon" width="50" height="50"> Battle Quiz</h1></a>
    <div class="container">
        <div >
            <h2 style="margin: 0;
          text-align: center;
          font-style: italic;">Créer un compte</h2>
        </div>
        <?php
         $servername = 'localhost';
         $username = 'root';
         $password = '';
         $bd = 'projet-chema-amine';

         $conn = mysqli_connect($servername, $username, $password, $bd);
         if (isset($_REQUEST['name'], $_REQUEST['emaill'],$_REQUEST['passwordd'])) {

            // récupérer le nom
            $nom = stripslashes($_REQUEST['name']);
            $nom = mysqli_real_escape_string($conn, $nom);
            // récupérer l'email 
            $email = stripslashes($_REQUEST['emaill']);
            $email = mysqli_real_escape_string($conn, $email);
            // récupérer le mot de passe 
            $password = stripslashes($_REQUEST['passwordd']);
            $password = mysqli_real_escape_string($conn, $password);
          
                $sql = "SELECT * FROM users WHERE  email='$email'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $message = "Un utilisateur avec  cet email existe déjà.";
                } else {
                    // Insérer les données dans la base de données
                    $sql = "INSERT INTO users (username, email, password,role,image_profil) VALUES ('$nom','$email','$password','user','images/istockphoto-1223671392-170667a.jpg')";

                    if (mysqli_query($conn, $sql)) {
                        $message ="Les données ont été insérées avec succès dans la base de données. ";
                    } else {
                        $message = "Erreur: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            
        }
        ?>
        <form class="form" id="form" action="" method="post" onsubmit="return form_verify() ">
            <div class="form-control ">
                <label for="">Nom d'utilisateur</label>
                <input type="text" id="username" name="name">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <small>Message d'erreur</small>
            </div>
            <div class="form-control ">
                <label for="">Email</label>
                <input type="email" id="email" name="emaill">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <small>Message d'erreur</small>
            </div>
            <div class="form-control">
                <label for="">Mot de passe</label>
                <input type="password" id="password" name="passwordd">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <small>Message d'erreur</small>
            </div>
            <div class="form-control">
                <label for="">Confirmation du mot de passe</label>
                <input type="password" id="password2" name="password2" >
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation"></i>
                <small>Message d'erreur</small>
            </div>
            <button type="submit" > <i class="fas fa-user-plus"></i> S'inscrire</button>
            <?php if (! empty($message)) { ?>
                <p style="color:red" >
                    <?php echo $message; ?>
                </p>
            <?php } ?>
        </form>
    </div>
</body>
<script>
    const form = document.querySelector("#form");
        const username = document.querySelector('#username');
        const email = document.querySelector('#email');
        const password = document.querySelector('#password');
        const password2 = document.querySelector('#password2');

        // Evenements


        // Fonstions
        function form_verify() {
            // Obtenir toutes les valeurs des inputs
            const userValue = username.value.trim();
            const emailValue = email.value.trim();
            const pwdValue = password.value.trim();
            const pwd2Value = password2.value.trim();
            test = false
            // Username verify
            if (userValue === "") {
                let message = "Username ne peut pas être vide";
                setError(username, message);
                
            } else if (!userValue.match(/^[a-zA-Z]/)) {
                let message = "Username doit commencer par une lettre";
                setError(username, message)
              
            } else {
                let letterNum = userValue.length;
                if (letterNum < 3) {
                    let message = "Username doit avoir au moins 3 caractères";
                    setError(username, message)
                   
                } else {
                    setSuccess(username);
                    
                }
            }

            // email verify
            if (emailValue === "") {
                let message = "Email ne peut pas être vide";
               
                setError(email, message);
                
            } else if (!emailValue.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)) {
                let message = "Email non valide(Exemple@gmail.com)";
                setError(email, message);
                
            } else {
                setSuccess(email)
               
            }

            // password verify
            if (pwdValue === "") {
                let message = "Le mot de passe ne peut pas être vide";
                setError(password, message)
                
            } else if (!pwdValue.match(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,50}$/)) {
                let message = "Le mot de passe est trop faible (8 à 50 caractères,au moins 1 chiffre et 1 lettre et 1 majuscule et 1 symbole .)";
                setError(password, message)
                


            } else {
                setSuccess(password);
               if (pwd2Value === "") {
                    let message = "Le mot de passe confirm ne peut pas être vide";
                    setError(password2, message)

                } else if (pwdValue !== pwd2Value) {
                    let message = "Les mot de passes ne correspondent pas";
                    setError(password2, message)

                } else {
                    setSuccess(password2)
                    test = true;
                }

            }
            // pwd confirm
            
            return test ;
        }

        function setError(elem, message) {
            const formControl = elem.parentElement;
            const small = formControl.querySelector('small');

            // Ajout du message d'erreur
            small.innerText = message

            // Ajout de la classe error
            formControl.className = "form-control error";
        }

        function setSuccess(elem) {
            const formControl = elem.parentElement;
            formControl.className = 'form-control success'
        }

    

</script>
  
</html>