<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
} else {
    if(isset($_POST['set-settings'])){
        $adminid = $_SESSION['vpmsaid'];
        $cname = $_POST['cname'];
        $cemail = $_POST['cemail'];
        $cwebsite = $_POST['cwebsite'];
        $caddress = $_POST['caddress'];
    
        $query = mysqli_query($con, "UPDATE settings SET c_name ='$cname', c_email='$cemail', c_website='$cwebsite', c_address='$caddress' WHERE ID='$adminid'");
        if ($query) {
            $msg = "تم تحديث الإعدادات بنجاح";
        } else {
            $msg = "حدث خطأ ما";
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
                <li class="active">إعدادات موقف المستشفى العسكري</li>
            </ol>
        </div><!--/.row-->
        
        <div class="panel panel-default">
            <div class="panel-heading">الإعدادات</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php if(isset($msg)): ?>
                    <div class="alert bg-info" role="alert">
                        <em class="fa fa-lg fa-check">&nbsp;</em> <?php echo $msg; ?>
                    </div>
                    <?php endif; ?>

                    <form method="POST">
                        <?php
                        $adminid = $_SESSION['vpmsaid'];
                        $ret = mysqli_query($con, "SELECT * FROM settings WHERE ID='$adminid'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <p style="color:red;"><?php echo "آخر تحديث في ", $row['last_update']; ?></p>
                        
                        <div class="form-group col-lg-6">
                            <label>اسم المستشفى</label>
                            <input type="text" class="form-control" value="<?php echo $row['c_name']; ?>" name="cname" required>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>البريد الإلكتروني</label>
                            <input type="email" class="form-control" value="<?php echo $row['c_email']; ?>" name="cemail" required>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>الموقع الإلكتروني</label>
                            <input type="text" class="form-control" value="<?php echo $row['c_website']; ?>" name="cwebsite" required>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>العنوان</label>
                            <input type="text" class="form-control" value="<?php echo $row['c_address']; ?>" name="caddress" required>
                        </div>
                        
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-info" name="set-settings">إجراء التغييرات</button>
                            </center>
                        </div>
                        <?php } ?>
                    </form>
                </div> 
            </div>
        </div>
    </div><!--/.main-->

    <?php include 'includes/footer.php'?>

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
