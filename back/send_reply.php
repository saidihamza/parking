<?php
session_start();
include('includes/dbconn.php');
require 'vendor/autoload.php'; // Assurez-vous que le chemin est correct

use SendGrid\Mail\Mail;
use SendGrid\Mail\TypeException;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_id = intval($_POST['message_id']);
    $replyMessage = trim($_POST['replyMessage']);

    if ($message_id && !empty($replyMessage)) {
        $stmt = $con->prepare("SELECT email FROM messages WHERE id = ?");
        $stmt->bind_param("i", $message_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $stmt->close();

        if ($email) {
            try {
                // Création de l'objet Email
                $emailToSend = new Mail();
                $emailToSend->setFrom("khawlahlel@gmail.com", "Votre Nom"); // Remplacez par votre adresse et nom
                $emailToSend->addTo($email);
                $emailToSend->setSubject("Réponse à votre message");
                $emailToSend->addContent("text/plain", "Bonjour,\n\n" . $replyMessage . "\n\nCordialement,\nVotre équipe");

                // Envoi de l'email via SendGrid
                $sendgrid = new SendGrid('YOUR_SENDGRID_API_KEY'); // Remplacez YOUR_SENDGRID_API_KEY par votre clé API SendGrid
                $response = $sendgrid->send($emailToSend);

                // Vérification du succès de l'envoi
                if ($response->statusCode() == 202) {
                    header('Location: message.php?alert=success');
                } else {
                    header('Location: message.php?alert=error&message=' . urlencode('Erreur lors de l\'envoi de l\'email.'));
                }
            } catch (TypeException $e) {
                header('Location: message.php?alert=error&message=' . urlencode($e->getMessage()));
            }
        } else {
            header('Location: message.php?alert=error&message=' . urlencode('Email not found for the given message ID.'));
        }
    } else {
        header('Location: message.php?alert=error&message=' . urlencode('Invalid message ID or empty reply message.'));
    }
} else {
    header('Location: message.php');
}
?>
