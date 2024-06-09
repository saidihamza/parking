<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
    exit(); // Ensure to exit after redirect
} else {
    if(isset($_POST['submit-profile'])){
        $adminid = $_SESSION['vpmsaid'];
        $aname = $_POST['adminname'];
        $mobno = $_POST['contactnumber'];

        $query = mysqli_query($con, "UPDATE admin SET AdminName ='$aname', MobileNumber='$mobno' WHERE ID='$adminid'");
        if ($query) {
            echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "تم تحديث ملفك الشخصي بنجاح!",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function(){
                        window.location.href = "dashboard.php";
                    });
                  </script>';
        } else {
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "حدث خطأ ما. يرجى المحاولة مرة أخرى!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                  </script>';
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
                <li class="active">ملف التعريف</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">Vehicle Management</h1> -->
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-default">
            <div class="panel-heading">الملف الشخصي</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form method="POST">
                        <?php
                        $adminid = $_SESSION['vpmsaid'];
                        $ret = mysqli_query($con,"SELECT * FROM admin WHERE ID='$adminid'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <div class="form-group col-lg-6">
                            <label>الاسم الكامل</label>
                            <input type="text" class="form-control" value="<?php echo $row['AdminName'];?>" id="adminname" name="adminname" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>اسم المستخدم</label>
                            <input type="text" class="form-control" value="<?php echo $row['UserName'];?>" id="username" name="username" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>البريد الإلكتروني</label>
                            <input type="email" class="form-control" value="<?php echo $row['Email'];?>" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>رقم الاتصال</label>
                            <input type="number" class="form-control" name="contactnumber" value="<?php echo $row['MobileNumber'];?>" required>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-info" name="submit-profile">إجراء التغييرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php include 'includes/footer.php'; ?>
    </div> <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert CDN -->
</body>
</html>

<?php } ?>
