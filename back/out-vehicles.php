<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
    exit(); // Ensure to exit after redirect
} else {
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
                <li class="active">إدارة المركبات المعطلة </li>
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
                    <div class="panel-heading"> مركبات في حالة عطل </div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>رقم اللوحة</th>
                                    <th>المركبة</th>
                                    <th>الفئة</th>
                                    <th>اسم  السائق</th>
                                    <th>المسافة</th>
                                    <th>مالك المركبة</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM vehicle_info WHERE Status='Out'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                <tr>
                                    <td><?php echo $cnt;?></td>
                                    <td><?php echo $row['RegistrationNumber'];?></td>
                                    <td><?php echo $row['VehicleCompanyname'];?></td>
                                    <td><?php echo $row['VehicleCategory'];?></td>
                                    <td><?php echo '' . $row['ParkingNumber'];?></td>
                                    <td><?php echo $row['ParkingCharge'] . 'Km';?></td>
                                    <td><?php echo $row['OwnerName'];?></td>
                                    <td>
                                        <a href="#" onclick="showDetails(<?php echo $row['ID'];?>)" class="btn btn-sm btn-info">عرض التفاصيل</a>
                                        <a href="print-receipt.php?vid=<?php echo $row['ID'];?>" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    $cnt++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
        
        <?php include 'includes/footer.php'; ?>
    </div> <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert CDN -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function showDetails(vehicleId) {
            // Redirect to details page with SweetAlert confirmation
            Swal.fire({
                title: 'هل تريد عرض التفاصيل؟',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'إلغاء',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'outgoing-detail.php?updateid=' + vehicleId;
                }
            });
        }
    </script>
</body>
</html>

<?php } ?>
