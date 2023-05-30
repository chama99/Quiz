<?php 
$servername='localhost';
$username='root';
$password= '';
$bd='projet-chema-amine';

$conn =mysqli_connect($servername,$username,$password,$bd);
if(!$conn){
    die('Erreur : '.mysqli_connect_error());
}


// Récupérer les données du formulaire
$nom = $_POST["name"];
$email = $_POST["emaill"];
$password = $_POST["passwordd"];
$username = "";
$eml = "";
if (empty($nom)) {
    echo "Username est requis <br>";
} 
if (empty($email)) {
        echo "Email est requis <br>";
    }
 
  if (empty($password)) {
    echo "Password est requis <br>";
}else{
    $sql = "SELECT * FROM users WHERE  email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Un utilisateur avec  cet email existe déjà.";
    } else {
        // Insérer les données dans la base de données
        $sql = "INSERT INTO users (username, email, password) VALUES ('$nom','$email','$password')";

        if (mysqli_query($conn, $sql)) {
            echo "Les données ont été insérées avec succès dans la base de données. ";
        } else {
            echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}








// Fermer la connexion à la base de données
mysqli_close($conn);

?>