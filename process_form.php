<?php
// Inclure le fichier de connexion à la base de données
$servername = "localhost"; // Adresse du serveur MySQL (généralement localhost)
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL (laissez vide si aucun)
$dbname = "vehicle-parking-db"; // Nom de la base de données MySQL à laquelle se connecter

// Connexion à la base de données
$con = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$con) {
    http_response_code(500);
    echo json_encode(array('success' => false, 'error' => 'Échec de la connexion à la base de données : ' . mysqli_connect_error()));
    exit;
}

// Vérifier si les données du formulaire sont définies
if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Requête SQL pour insérer les données dans la table messages
    $query = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Exécuter la requête et vérifier si elle a réussi
    if (mysqli_query($con, $query)) {
        // Répondre avec un JSON si l'insertion est réussie
        echo json_encode(array('success' => true));
    } else {
        // Répondre avec une erreur HTTP 500 si l'insertion a échoué
        http_response_code(500);
        echo json_encode(array('success' => false, 'error' => mysqli_error($con)));
    }
} else {
    // Répondre avec une erreur HTTP 400 si les données du formulaire sont manquantes
    http_response_code(400);
    echo json_encode(array('success' => false, 'error' => 'Données du formulaire incomplètes.'));
}

// Fermer la connexion à la base de données
mysqli_close($con);
?>
