<?php
// Paramètres de connexion à la base de données MySQL
$servername = "localhost"; // Adresse du serveur MySQL (généralement localhost)
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL (laissez vide si aucun)
$dbname = "vehicle-parking-db"; // Nom de la base de données MySQL à laquelle se connecter

// Connexion à la base de données MySQL
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Connexion échouée : " . $mysqli->connect_error);
}
?>
