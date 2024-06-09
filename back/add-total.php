<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
} else {
    if(isset($_POST['submit-vehicle'])) {
        $parkingnumber = mt_rand(10000, 99999);
        $catename = $_POST['catename'];
        $vehcomp = $_POST['vehcomp'];
        $vehreno = $_POST['vehreno'];
        $ownername = $_POST['ownername'];
        $ownercontno = $_POST['ownercontno'];
        $enteringtime = $_POST['enteringtime'];

        $query = mysqli_query($con, "INSERT INTO vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber) VALUES ('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno')");
        if ($query) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'نجاح!',
                        text: 'تمت إضافة تفاصيل دخول المركبة بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'dashboard.php';
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ!',
                        text: 'حدث خطأ أثناء إضافة تفاصيل دخول المركبة',
                        showConfirmButton: false,
                        timer: 1500
                    });
                  </script>";
        }
    }
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
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navigation.php'; ?>
    <?php include 'includes/sidebar.php'; ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><em class="fa fa-home"></em></a></li>
                <li class="active"> إدارة استهلاك الوقود</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">Vehicle Management</h1> -->
            </div>
        </div><!--/.row-->
        <div class="panel panel-default">
            <div class="panel-heading">  إضافة بيانات جديدة</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form method="POST">
                        <div class="form-group">
                            <label>فئة المركبة</label>
                            <select class="form-control" name="catename" id="catename">
                                <option value="0">اختر الفئة</option>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM vcategory");
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<option value='" . $row['VehicleCat'] . "'>" . $row['VehicleCat'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>رقم التسجيل</label>
                            <input type="text" class="form-control" name="vehreno" required>
                        </div>

                        <div class="form-group">
                            <label>الشركة المصنعة</label>
                            <input type="text" class="form-control" name="vehcomp" required>
                        </div>

                        <div class="form-group">
                            <label>اسم المالك</label>
                            <input type="text" class="form-control" name="ownername" required>
                        </div>

                        <div class="form-group">
                            <label>رقم الاتصال للمالك</label>
                            <input type="text" class="form-control" name="ownercontno" required>
                        </div>

                        <div class="form-group">
                            <label>وقت الدخول</label>
                            <input type="datetime-local" class="form-control" name="enteringtime" required>
                        </div>

                        <button type="submit" class="btn btn-success" name="submit-vehicle">إرسال</button>
                        <button type="reset" class="btn btn-default">إعادة تعيين</button>
                    </form>
                </div> <!--  col-md-12 ends -->
            </div>
        </div>
    </div><!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
