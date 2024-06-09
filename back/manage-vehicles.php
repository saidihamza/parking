<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
    exit(); // Ensure to exit after redirect
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
                        title: '!تمت إضافة تفاصيل دخول المركبة بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function(){
                        window.location.href = 'dashboard.php';
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'حدث خطأ ما. يرجى المحاولة مرة أخرى!',
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
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navigation.php'; ?>
    
    <?php include 'includes/sidebar.php'; ?>
    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">إدارة المركبات</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">Vehicle Management</h1> -->
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-default">
            <div class="panel-heading"> إضافة مركبة</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form method="POST">
                        <div class="form-group">
                            <label>رقم التسجيل</label>
                            <input type="text" class="form-control" placeholder="  104تونس2 " id="vehreno" name="vehreno" required>
                        </div>

                        <div class="form-group">
                            <label>اسم الشركة المصنعة للمركبة</label>
                            <input type="text" class="form-control" placeholder="Passat" id="vehcomp" name="vehcomp" required>
                        </div>
                        
                        <div class="form-group">
                            <label>فئة المركبة</label>
                            <select class="form-control" name="catename" id="catename">
                                <option value="0">اختر الفئة</option>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM vcategory");
                                while($row = mysqli_fetch_array($query)) {
                                    echo "<option value='".$row['VehicleCat']."'>".$row['VehicleCat']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>اسم المالك الكامل</label>
                            <input type="text" class="form-control" placeholder="أدخل هنا.." id="ownername" name="ownername" required>
                        </div>

                        <div class="form-group">
                            <label>رقم جوال المالك</label>
                            <input type="text" class="form-control" placeholder="أدخل هنا.." maxlength="10" pattern="[0-9]+" id="ownercontno" name="ownercontno" required>
                        </div>

                        <button type="submit" class="btn btn-success" name="submit-vehicle">إرسال</button>
                        <button type="reset" class="btn btn-default">إعادة تعيين</button>
                    </form>
                </div>
            </div>
        </div>
        
        <?php include 'includes/footer.php'; ?>
    </div> <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert CDN -->
    <script>
        $(document).ready(function(){
            // Optional: You can add client-side form validation here if needed
        });
    </script>
</body>
</html>
