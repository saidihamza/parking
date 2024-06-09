<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
    } else {
        $msg = '';

        if(isset($_POST['update-category'])) {
            $cid = $_GET['editid'];
            $catename = $_POST['catename'];
            $catedate = $_POST['catedate'];

            $query = "UPDATE vcategory SET VehicleCat='$catename', CreationDate='$catedate' WHERE ID='$cid'";
            $result = mysqli_query($con, $query);

            if($result) {
                $msg = "تم تحديث الفئة بنجاح.";
            } else {
                $msg = "حدث خطأ أثناء تحديث الفئة. الرجاء المحاولة مرة أخرى.";
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

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <?php include 'includes/navigation.php' ?>
    
    <?php
    $page = "vehicle-category";
    include 'includes/sidebar.php';
    ?>
    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">إدارة فئة السيارة</li>
            </ol>
        </div><!--/.row-->
        
        <div class="panel panel-default">
            <div class="panel-heading">تحديث فئة السيارة</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php if(!empty($msg)): ?>
                        <div class="alert bg-info" role="alert">
                            <em class="fa fa-lg fa-warning">&nbsp;</em> 
                            <?php echo $msg; ?>
                            <a href="#" class="pull-right">
                                <em class="fa fa-lg fa-close"></em>
                            </a>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <?php
                        $cid = $_GET['editid'];
                        $ret = mysqli_query($con, "SELECT * FROM vcategory WHERE ID='$cid'");
                        $row = mysqli_fetch_array($ret);
                        ?>
                        
                        <div class="form-group">
                            <label>اسم الفئة</label>
                            <input type="text" class="form-control" placeholder="الفئة" value="<?php echo $row['VehicleCat']; ?>" id="catename" name="catename" required>
                        </div>
                        
                        <div class="form-group">
                            <label>تاريخ البدء</label>
                            <input type="text" class="form-control" placeholder="jj/mm/aaaa" value="<?php echo $row['CreationDate']; ?>" id="catedate" name="catedate" required>
                        </div>

                        <button type="submit" class="btn btn-success" name="update-category">إجراء التغييرات</button>
                    </form>
                </div> <!-- col-md-12 ends -->
            </div> <!-- panel-body ends -->
        </div> <!-- panel panel-default ends -->
        
        <?php include 'includes/footer.php' ?>
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

<?php } ?>
