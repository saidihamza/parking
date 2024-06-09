<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
    exit(); // Assurez-vous de sortir après une redirection
} else {
    if(isset($_POST['messageId'])) {
        $messageId = $_POST['messageId'];

        // Requête pour supprimer le message de la base de données
        $deleteQuery = "DELETE FROM messages WHERE id = '$messageId'";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if($deleteResult) {
            // Suppression réussie
            echo json_encode(array("status" => "success"));
        } else {
            // Erreur lors de la suppression
            echo json_encode(array("status" => "error", "message" => "Erreur lors de la suppression du message."));
        }
    } else {
        // ID du message non fourni
        echo json_encode(array("status" => "error", "message" => "ID du message non fourni."));
    }
}
?>
