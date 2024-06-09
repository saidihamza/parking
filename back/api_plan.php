<?php
// En-tête pour autoriser l'accès depuis un domaine de confiance
header("Access-Control-Allow-Origin: https://example.com");
header("Content-Type: application/json; charset=UTF-8");

// Ajouter des en-têtes de sécurité
header("Content-Security-Policy: default-src 'self';");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

// Initialiser le tableau de réponse
$response = array();

// Vérifier si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si les données sont présentes dans la requête POST
    if (isset($_POST['planName']) && isset($_POST['planPrice']) && isset($_POST['planService'])) {
        // Valider et nettoyer les données
        $planName = filter_var($_POST['planName'], FILTER_SANITIZE_STRING);
        $planPrice = filter_var($_POST['planPrice'], FILTER_VALIDATE_FLOAT);
        $planService = filter_var($_POST['planService'], FILTER_SANITIZE_STRING);

        if ($planName === false || $planPrice === false || $planService === false) {
            $response['error'] = true;
            $response['message'] = "Données invalides";
            echo json_encode($response);
            exit;
        }

        // Paramètres de connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vehicle-parking-db";

        // Connexion à la base de données
        $con = mysqli_connect($servername, $username, $password, $dbname);

        if (!$con) {
            // En cas d'erreur de connexion à la base de données
            $response['error'] = true;
            $response['message'] = "Erreur de connexion à la base de données";
            error_log("Erreur de connexion à la base de données: " . mysqli_connect_error());
        } else {
            // Préparer la requête SQL d'insertion
            $sql = "INSERT INTO plans (planName, planPrice, planService) VALUES (?, ?, ?)";

            // Préparer la déclaration SQL
            $stmt = mysqli_prepare($con, $sql);

            if ($stmt) {
                // Lier les paramètres et exécuter la déclaration
                mysqli_stmt_bind_param($stmt, "sds", $planName, $planPrice, $planService);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    // En cas de succès de l'insertion
                    $response['error'] = false;
                    $response['message'] = "Plan ajouté avec succès";
                } else {
                    // En cas d'échec de l'insertion
                    $response['error'] = true;
                    $response['message'] = "Échec de l'ajout du plan";
                    error_log("Échec de l'ajout du plan: " . mysqli_stmt_error($stmt));
                }

                // Fermer la déclaration
                mysqli_stmt_close($stmt);
            } else {
                // En cas d'erreur de préparation de la déclaration SQL
                $response['error'] = true;
                $response['message'] = "Erreur de préparation de la requête SQL";
                error_log("Erreur de préparation de la requête SQL: " . mysqli_error($con));
            }

            // Fermer la connexion
            mysqli_close($con);
        }
    } else {
        // En cas de données manquantes dans la requête POST
        $response['error'] = true;
        $response['message'] = "Données manquantes dans la requête POST";
    }
} else {
    // En cas de méthode de requête non autorisée
    $response['error'] = true;
    $response['message'] = "Méthode de requête non autorisée";
}

// Envoyer la réponse JSON
echo json_encode($response);
?>
