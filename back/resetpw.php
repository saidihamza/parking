<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['resetpw'])) {
    $secode = $_SESSION['secode'];
    $email = $_SESSION['email'];
    $password = md5($_POST['newpassword']);

    $query = mysqli_query($con, "UPDATE admin SET Password='$password' WHERE Email='$email' AND Security_Code='$secode'");
    
    if($query) {
        // Replace standard alert with SweetAlert
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Password Changed!",
                    text: "Your password has been successfully updated.",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "index.php";
                    }
                });
              </script>';
        
        session_destroy();
        exit; // Optionally exit here after showing SweetAlert
    } else {
        $msg = "Failed to update password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Recovery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        function checkpass() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert('New Password and Confirm Password field does not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
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
                    <form method="POST" name="changepassword" onsubmit="return checkpass()">

                    <?php if(isset($msg)): ?>
                        <div class="alert bg-danger" role="alert">
                            <em class="fa fa-lg fa-warning">&nbsp;</em>
                            <?php echo $msg; ?>
                            <a href="#" class="pull-right">
                                <em class="fa fa-lg fa-close"></em>
                            </a>
                        </div>
                    <?php endif; ?>

                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="New Password" name="newpassword" type="password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Confirm Password" name="confirmpassword" type="password" required>
                        </div>
                        
                        <button id="btn-success" class="btn btn-success btn-block" type="submit" name="resetpw">تسجيل</button>
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
