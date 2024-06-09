<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit-in'])) {
        $cid = $_GET['updateid'];
        $remark = $_POST['remark'];
        $status = $_POST['status'];
        $parkingcharge = $_POST['parkingcharge'];

        $query = mysqli_query($con, "UPDATE vehicle_info SET Remark='$remark', Status='$status', ParkingCharge='$parkingcharge' WHERE ID='$cid'");
        if ($query) {
            $msg = "تم تحديث جميع الملاحظات بنجاح.";
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'نجاح!',
                        text: 'تم تحديث الملاحظات بنجاح.',
                    }).then(function() {
                        window.location = 'out-vehicle.php';
                    });
                 </script>";
        } else {
            $msg = "حدث خطأ ما";
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ!',
                        text: 'حدث خطأ أثناء تحديث الملاحظات.',
                    });
                 </script>";
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
    <link href="css/datatable.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.4/sweetalert2.min.css">
</head>
<body>
    <?php include 'includes/navigation.php' ?>
    
    <?php include 'includes/sidebar.php' ?>

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
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">المركبات في حالة عطل</div>
                    <div class="panel-body">
                        <?php
                        if ($msg) {
                            echo "<div class='alert bg-info' role='alert'>
                                    <em class='fa fa-lg fa-warning'>&nbsp;</em> 
                                    $msg
                                    <a href='#' class='pull-right'>
                                        <em class='fa fa-lg fa-close'></em>
                                    </a>
                                </div>";
                        }
                        ?> 

                        <div class="col-md-12">
                            <form method="POST">
                                <?php
                                $cid = $_GET['updateid'];
                                $ret = mysqli_query($con, "SELECT * FROM vehicle_info WHERE ID='$cid'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?> 
                                <div class="form-group">
                                    <label>لوح التسجيل</label>
                                    <input type="text" class="form-control" value="<?php echo $row['RegistrationNumber']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>المركبة</label>
                                    <input type="text" class="form-control" value="<?php echo $row['VehicleCompanyname']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>الفئة</label>
                                    <input type="text" class="form-control" value="<?php echo $row['VehicleCategory']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>السائق</label>
                                    <input type="text" class="form-control" value="<?php echo $row['ParkingNumber']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>مركبة في الخدمة منذ</label>
                                    <input type="text" class="form-control" value="<?php echo $row['InTime']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>تعطَّلت المركبة في</label>
                                    <input type="text" class="form-control" value="<?php echo $row['OutTime']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>مالك المركبة</label>
                                    <input type="text" class="form-control" value="<?php echo $row['OwnerName']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>هاتف صاحب المركبة</label>
                                    <input type="text" class="form-control" value="<?php echo $row['OwnerContactNumber']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>الحالة الحالية</label>
                                    <input type="text" class="form-control" value="<?php if ($row['Status'] == "") { echo "مركبة في الخدمة"; } if ($row['Status'] == "Out") { echo "مركبة معطلة"; } ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>المسافة الإجمالية</label>
                                    <input type="text" class="form-control" value="<?php echo $row['ParkingCharge'] . " Km"; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>الحالة</label>
                                    <input type="text" name="status" value="<?php echo $row['Status']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>الملاحظات</label>
                                    <input type="text" class="form-control" value="<?php echo $row['Remark']; ?>" name="remark">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit-in" class="btn btn-primary">تحديث الملاحظات</button>
                                </div>
                                <?php } ?>
                            </form>
                        </div><!--  col-md-12 ends -->
                    </div>
                </div>
            </div>
        </div><!--/.row-->
        
        <?php include 'includes/footer.php'?>
    </div> <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.4/sweetalert2.all.min.js"></script>
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
