<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$bd = 'projet-chema-amine';

$conn = mysqli_connect($servername, $username, $password, $bd);
if (!$conn) {
    die('Erreur : ' . mysqli_connect_error());
}
$id=$_POST["id"];
// Récupérer la nouvelle valeur de l'username
$new_nom = $_POST['new-value'];
$i=intval($id);
// Préparer la requête SQL
$sql = "UPDATE users SET username='$new_nom' WHERE id= $i";

// Exécuter la requête SQL
if (mysqli_query($conn, $sql)) {
    header('location: thèmes.php');
    
   
} else {
    echo $i;
}

// Fermer la connexion
mysqli_close($conn);
?>