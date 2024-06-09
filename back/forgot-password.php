<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

$msg = "";

if (isset($_POST['reset'])) {
    $secode = $_POST['secode'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "SELECT ID FROM admin WHERE Email='$email' AND Security_Code='$secode'");
    $ret = mysqli_fetch_array($query);

    if ($ret > 0) {
        $_SESSION['secode'] = $secode;
        $_SESSION['email'] = $email;
        header('location:resetpw.php');
    } else {
        $msg = "تفاصيل غير صحيحة. الرجاء المحاولة مرة أخرى.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نظام estacionamento المركبات</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="row">
        <h2 class="text-center mb-4">
            <img src="assets/img/logo_HMPIT3.png" alt="Logo" class="img-fluid" style="max-height: 100px;">
        </h2>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading text-center"><b>استعادة كلمة المرور</b></div>
                <div class="panel-body">
                    <form method="POST">
                        <div id="error-alert">
                            <?php
                            if ($msg) {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'خطأ!',
                                            text: '$msg',
                                            showCloseButton: true,
                                            showConfirmButton: false
                                        });
                                     </script>";
                            }
                            ?>
                        </div>

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="رمز الأمان" name="secode" type="text" autofocus="" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="البريد الإلكتروني" name="email" type="email" required>
                            </div>

                            <button id="btn-success" class="btn btn-success btn-block" type="submit" name="reset">المتابعة</button>
                            <a href="index.php" class="btn btn-primary btn-block mt-3">العودة</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>