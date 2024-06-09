<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit-category'])) {
        $catname = $_POST['catename'];
        $sdesc = $_POST['sdesc'];

        $query = mysqli_query($con, "INSERT INTO vcategory(VehicleCat, shortDescription) VALUES ('$catname','$sdesc')");
        if ($query) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'تمت إضافة الفئة بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'vehicle-category.php';
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'حدث خطأ ما',
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
    <title>نظام إدارة المركبات</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include 'includes/navigation.php'; ?>
    
    <?php
    $page = "vehicle-category";
    include 'includes/sidebar.php';
    ?>
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><em class="fa fa-home"></em></a></li>
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
                    <div class="panel-heading">  إضافة فئة جديدة </div>
                    <div class="panel-body">
                        <?php if ($msg) {
                            echo "<div class='alert bg-info' role='alert'>
                                    <em class='fa fa-lg fa-warning'>&nbsp;</em> 
                                    $msg
                                    <a href='#' class='pull-right'>
                                    <em class='fa fa-lg fa-close'></em>
                                    </a>
                                  </div>";
                        } ?>
                        
                        <div class="col-md-12">
                            <form method="POST">
                                <div class="form-group">
                                    <label> الفئة</label>
                                    <input type="text" class="form-control" placeholder="أدخل هنا.." id="catename" name="catename" required>
                                </div>

                                <div class="form-group">
                                    <label>الوصف</label>
                                    <input type="text" class="form-control" placeholder="أدخل هنا.." id="sdesc" name="sdesc" required>
                                </div>
                                
                                <button type="submit" class="btn btn-success" name="submit-category">تأكيد</button>
                                <button type="reset" class="btn btn-default">إعادة</button>
                            </form>
                        </div> <!--  col-md-12 ends -->
                    </div>
                </div>
            </div>
        </div><!--/.row-->
        
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
