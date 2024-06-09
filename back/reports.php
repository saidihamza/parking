<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $fromdate = $_POST['fromdate'];
        $todate = $_POST['todate'];

        // Process your report generation logic here

        // Assuming report generation is successful, show SweetAlert
        $msg = "تم إنشاء التقرير بنجاح!";
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'تم!',
                    text: '$msg',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'حسناً'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'reports.php';
                    }
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

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navigation.php' ?>

    <?php
    $page = "reports";
    include 'includes/sidebar.php'
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">عرض التقرير</li>
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
                    <div class="panel-heading">تقارير موقف المركبات</div>

                    <form method="POST" enctype="multipart/form-data" name="datereports" action="generate-reports.php">
                        <div class="panel-body">

                            <?php if($msg): ?>
                            <div class="alert bg-info" role="alert">
                                <em class="fa fa-lg fa-check">&nbsp;</em>
                                <?php echo $msg; ?>
                            </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="">من</label>
                                    <input class="form-control" type="date" name="fromdate" id="fromdate" required="true">
                                </div>

                                <div class="col-lg-6">
                                    <label for="">إلى</label>
                                    <input class="form-control" type="date" name="todate" id="todate" required="true">
                                </div>
                            </div>

                        </div>
                        <center><button type="submit" class="btn btn-primary" name="submit">إنشاء التقرير</button></center>
                    </form>
                </div>
            </div>
        </div>
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
