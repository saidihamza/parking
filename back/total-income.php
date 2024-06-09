<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
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

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <?php include 'includes/navigation.php' ?>
    
    <?php
    $page = "income";
    include 'includes/sidebar.php';
    ?>
    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">الوقود</li>
            </ol>
        </div><!--/.row-->
        
        <div class="panel panel-default">
            <div class="panel-heading">استهلاك الوقود <a href="add-total.php" type="button" class="btn btn-sm btn-primary">  إضافة بيانات جديدة</a></div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                    
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>فئة المركبة</th>
                            <th>لوحة التسجيل</th>
                            <th>المحطة</th>
                            <th>كمية الوقود</th>
                            <th>تاريخ التزود</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM fuel");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
   
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><?php echo $row['VehiclCat'];?></td>
                            <td><?php echo $row['RegistrationNumb'];?></td>
                            <td><?php echo $row['RefSt'];?></td>
                            <td><?php echo $row['quatf'];?></td>
                            <td><?php echo $row['DateRef'];?></td>
                            <td>
                                <a href="update-fuel.php?editid=<?php echo $row['id'];?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                
                                <button onclick="deleteFuel(<?php echo $row['id'];?>)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        
                        <?php $cnt++; }?>
                    </tbody>
                    
                    <tfoot>

                    </tfoot>
                    
                </table>
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

        $(document).ready(function() {
            $('#example').DataTable();
        });

        function deleteFuel(id) {
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "سيتم حذف هذا السجل نهائيًا!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم, احذفه!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'remove-fuel.php?editid=' + id;
                }
            });
        }
    </script>

</body>
</html>
