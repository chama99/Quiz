<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$bd = 'projet-chema-amine';

$conn = mysqli_connect($servername, $username, $password, $bd);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Récupération des données du formulaire
$titre = $_POST['titre'];
$reponse = $_POST['reponse'];
$image = $_FILES['image']['name'];
$chemin_image = 'images/' . $image;
move_uploaded_file($_FILES['image']['tmp_name'], $chemin_image);
// Insertion des données dans la base de données
$sql = "INSERT INTO reponses (titre, reponse, image) VALUES ('$titre', '$reponse', '$chemin_image')";
if (mysqli_query($conn, $sql)) {
    header('location: afficher_theme.php');
} else {
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
}
// Déplace le fichier téléchargé vers le dossier "images" sur le serveur



// Fermeture de la connexion à la base de données
mysqli_close($conn);

?>