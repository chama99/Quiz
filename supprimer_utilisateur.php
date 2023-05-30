<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$bd = 'projet-chema-amine';

$conn = mysqli_connect($servername, $username, $password, $bd);
if (!$conn) {
    die('Erreur : ' . mysqli_connect_error());
}
// Récupération de l'ID de l'utilisateur à supprimer
   $id = $_GET["id"];
   
   // Suppression de l'utilisateur dans la base de données
   $sql = "DELETE FROM users WHERE id='$id'";
   if ($conn->query($sql) === TRUE) {
    header('location: consulterusers.php'); ;}
?>