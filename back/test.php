<?php
session_start();
include('includes/dbconn.php');

$msg = ""; // Variable pour stocker le message d'erreur

if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']); // Utilisation de MD5 pour le mot de passe (à des fins de démonstration)

    $query = mysqli_query($con, "SELECT ID FROM admin WHERE UserName='$adminuser' AND Password='$password'");
    $ret = mysqli_fetch_array($query);

    if ($ret) {
        $_SESSION['vpmsaid'] = $ret['ID'];
        header('location: dashboard.php');
        exit();
    } else {
        $msg = "فشل تسجيل الدخول! الرجاء التحقق من اسم المستخدم وكلمة المرور.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نظام مواقف السيارات</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .image-section {
            flex: 1;
            background: url('assets/img/defense.png') no-repeat center center;
            background-size: cover;
        }

        .form-section {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-section a {
            color: white;
            list-style: none;
            text-decoration: none;
        }

        .form-section a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-section"></div>
        <div class="form-section">
            <h2> <a href="index.php" class="logo d-flex align-items-center me-auto">
                    <img src="assets/img/logo_HMPIT3.png" alt="">
                </a></h2>
            <?php if (!empty($msg)) : ?>
                <!-- Affichage de l'alerte SweetAlert pour le message d'erreur -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'فشل تسجيل الدخول!',
                            text: '<?php echo $msg; ?>',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'موافق'
                        });
                    });
                </script>
            <?php endif; ?>
            <!-- Formulaire de connexion -->
            <form method="POST">
                <div class="form-group">
                    <input class="form-control" placeholder="الاسم الكامل" name="adminName" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder=" اسم المستخدم" name="userName" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder=" رقم الهاتف المحمول" name="mobileNumber" type="number">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="  رمز الأمان" name="securityCode" type="number">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder=" البريد الإلكتروني " name="email" type="email">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="كلمة المرور" name="password" type="password">
                </div>
                <div class="form-group">
                    <a href="forgot-password.php"> العودة إلى صفحة تسجيل الدخول</a>
                </div>
                <button id="btn-success" class="btn btn-success btn-block" type="submit" name="login"> الدخول</button>
                <a href="inscription.php" class="btn btn-primary btn-block mt-3">إضافة</a>
                <a href="../index.php" class="btn btn-info btn-block mt-3">العودة إلى الموقع</a>
            </form>
           
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
