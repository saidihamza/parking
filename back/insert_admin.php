<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure le fichier de configuration de la base de données
    include 'includes/config.php'; // Assurez-vous de remplacer 'config.php' par le chemin réel du fichier de configuration

    // Récupérer les valeurs des champs du formulaire
    $adminName = $_POST['adminName'];
    $userName = $_POST['userName'];
    $mobileNumber = $_POST['mobileNumber'];
    $securityCode = $_POST['securityCode'];
    $email = $_POST['email'];
    // Crypter le mot de passe en MD5 (non recommandé pour des raisons de sécurité)
    $password = md5($_POST['password']);

    // Vérifier si l'email existe déjà
    $checkEmailSql = "SELECT * FROM admin WHERE Email = ?";
    if ($stmt = $mysqli->prepare($checkEmailSql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // L'email existe déjà
            $response = array('status' => 'error', 'message' => 'email_exists');
        } else {
            // L'email n'existe pas, procéder à l'insertion
            $stmt->close();

            $sql = "INSERT INTO admin (AdminName, UserName, MobileNumber, Security_Code, Email, Password, AdminRegdate) 
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("ssssss", $adminName, $userName, $mobileNumber, $securityCode, $email, $password);

                if ($stmt->execute()) {
                    // Insertion réussie
                    $response = array('status' => 'success');
                } else {
                    // Erreur lors de l'exécution de la requête
                    $response = array('status' => 'error', 'message' => 'Erreur lors de l\'insertion.');
                }

                $stmt->close();
            } else {
                // Erreur de préparation de la requête
                $response = array('status' => 'error', 'message' => 'Erreur de préparation de la requête.');
            }
        }

        $stmt->close();
    } else {
        // Erreur de préparation de la requête SQL
        $response = array('status' => 'error', 'message' => 'Erreur de préparation de la requête SQL.');
    }

    // Fermer la connexion à la base de données
    $mysqli->close();

    // Renvoyer la réponse JSON
    echo json_encode($response);
}
?>
