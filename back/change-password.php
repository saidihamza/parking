<?php
session_start();
include('includes/dbconn.php');
error_reporting(0);

if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
} else {
    
    $msg = "";

    if(isset($_POST['change-password'])){
        $adminid = $_SESSION['vpmsaid'];
        $cpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);
        $confirmpassword = md5($_POST['confirmpassword']);

        // Check if current password is correct
        $query = mysqli_query($con,"SELECT ID FROM admin WHERE ID='$adminid' AND Password='$cpassword'");
        $row = mysqli_fetch_array($query);

        if($row > 0){
            // Check if new password matches confirm password
            if ($newpassword === $confirmpassword) {
                $ret = mysqli_query($con,"UPDATE admin SET Password='$newpassword' WHERE ID='$adminid'");
                if ($ret) {
                    $msg = "تم تحديث كلمة المرور بنجاح";
                } else {
                    $msg = "حدث خطأ أثناء تحديث كلمة المرور";
                }
            } else {
                $msg = "كلمة المرور الجديدة وتأكيد كلمة المرور غير متطابقين";
            }
        } else {
            $msg = "كلمة المرور الحالية غير صحيحة";
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
                <li class="active">كلمة المرور </li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">إدارة المركبات</h1> -->
            </div>
        </div><!--/.row-->
        <div class="panel panel-default">
            <div class="panel-heading">تغيير كلمة المرور</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php
                    if($msg) {
                        echo "<script>
                                Swal.fire({
                                    icon: 'info',
                                    title: 'تنبيه!',
                                    text: '$msg',
                                    showCloseButton: true,
                                    showConfirmButton: false
                                });
                              </script>";
                    }
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>كلمة المرور الحالية</label>
                            <input type="password" class="form-control" name="currentpassword" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>كلمة مرور جديدة</label>
                                    <input type="password" class="form-control" name="newpassword" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تأكيد كلمة المرور</label>
                                    <input type="password" class="form-control" name="confirmpassword" required>
                                </div>
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-info" name="change-password">تغيير كلمة المرور</button>
                        </center>
                    </form>
                </div> <!--  col-md-12 ends -->
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div><!--/.main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>
</body>
</html>
<?php } ?>
