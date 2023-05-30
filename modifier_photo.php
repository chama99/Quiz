<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$bd = 'projet-chema-amine';

$conn = mysqli_connect($servername, $username, $password, $bd);
if (!$conn) {
    die('Erreur : ' . mysqli_connect_error());
}


    $id = $_POST['id'];
    $image = $_FILES['image']['name'];
    $chemin_image = 'images/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $chemin_image);
    $i = intval($id);
    // Préparer la requête SQL
    $sql = "UPDATE users SET image_profil='$chemin_image' WHERE id= $i";

    // Exécuter la requête SQL
    if (mysqli_query($conn, $sql)) {
        $message = "Votre photo a été modifié. Fermez votre compte et ouvrez-le pour vérifier.";
        header('location:thèmes.php');
       
    } else {
        echo $i;
    }
  session_start();
  $_SESSION['messg_photo'] = $message;
// Fermer la connexion
mysqli_close($conn);
?>