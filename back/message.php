<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
    exit(); // Assurez-vous de sortir après une redirection
} else {
    // Définition des variables de pagination
    $limit = 10; // Nombre d'éléments par page
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; // Numéro de page par défaut

    // Calcul de l'offset pour la requête SQL
    $offset = ($page - 1) * $limit;

    // Récupérer les messages depuis la base de données avec pagination
    $query = "SELECT id, name, email, message FROM messages LIMIT $limit OFFSET $offset";
    $result = mysqli_query($con, $query);

    // Compter le nombre total de messages pour la pagination
    $countQuery = "SELECT COUNT(id) as total FROM messages";
    $countResult = mysqli_query($con, $countQuery);
    $totalCount = mysqli_fetch_assoc($countResult)['total'];
    $totalPages = ceil($totalCount / $limit);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <img src="assets/img/logo_HMPIT3.png" alt="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navigation.php' ?>
    <?php include 'includes/sidebar.php' ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><em class="fa fa-home"></em></a></li>
                <li class="active">عرض التقرير</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">تقارير  الرسالة</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الرسالة</th>
                                        <th>الرد</th>
                                        <th>حذف</th> <!-- Nouvelle colonne pour le bouton de suppression -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['message'] . "</td>";
                                        echo "<td>";
                                        // Bouton pour ouvrir le modal de réponse
                                        echo "<button class='btn btn-primary' data-toggle='modal' data-target='#replyModal_" . $row['id'] . "'>الرد على الرسالة</button>";

                                        // Modal pour la réponse à chaque message
                                        echo "<div class='modal fade' id='replyModal_" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='replyModalLabel_" . $row['id'] . "' aria-hidden='true'>";
                                        echo "<div class='modal-dialog' role='document'>";
                                        echo "<div class='modal-content'>";
                                        echo "<div class='modal-header'>";
                                        echo "<h5 class='modal-title' id='replyModalLabel_" . $row['id'] . "'>الرد على الرسالة</h5>";
                                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                        echo "<span aria-hidden='true'>&times;</span>";
                                        echo "</button>";
                                        echo "</div>";
                                        echo "<form action='send_reply.php' method='post'>";
                                        echo "<div class='modal-body'>";
                                        echo "<input type='hidden' name='message_id' value='" . $row['id'] . "'>";
                                        echo "<div class='form-group'>";
                                        echo "<label for='replyMessage'>الرسالة:</label>";
                                        echo "<textarea class='form-control' id='replyMessage' name='replyMessage' rows='5' required></textarea>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='modal-footer'>";
                                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>إغلاق</button>";
                                        echo "<button type='submit' class='btn btn-primary' name='submitReply'>إرسال الرد</button>";
                                        echo "</div>";
                                        echo "</form>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</td>";

                                        // Bouton de suppression
                                        echo "<td>";
                                        echo "<button class='btn btn-danger' onclick='deleteMessage(" . $row['id'] . ")'>حذف</button>";
                                        echo "</td>";

                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php
                                // Afficher les liens de pagination
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                                }
                                ?>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div><!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
    // Fonction pour envoyer une demande de suppression AJAX
    function deleteMessage(messageId) {
        // Confirmation de suppression
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لا يمكن التراجع عن هذا الإجراء!",
            icon: 'تأكيد',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، احذفها!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Envoi de la demande de suppression au serveur
                $.ajax({
                    type: 'POST',
                    url: 'delete_message.php',
                    data: { messageId: messageId },
                    success: function(response) {
                        // Afficher une alerte après suppression
                        Swal.fire(
                            'تم الحذف!',
                            'تم حذف الرسالة بنجاح.',
                            'success'
                        ).then(function() {
                            // Recharger la page après suppression
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Afficher une alerte en cas d'erreur
                        Swal.fire(
                            'خطأ!',
                            'حدث خطأ أثناء محاولة حذف الرسالة.',
                            'error'
                        );
                    }
                });
            }
        });
    }
    </script>
</body>
</html>

