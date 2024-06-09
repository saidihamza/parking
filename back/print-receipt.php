<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <div class="row"></div><!--/.row-->
    <a href="out-vehicles.php"><button class="btn btn-primary">العودة</button></a>
    <?php
    $cid=$_GET['vid'];
    $ret=mysqli_query($con,"SELECT * from vehicle_info where ID='$cid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {
    ?>
    <div  id="exampl">
        <table id="dom-jqry" class="table table-striped table-bordered">
            <tr>
                <th colspan="4" style="text-align: center; font-size:22px;"> إيصال نظام موقف المركبات</th>
            </tr>

            <tr>
                <th>لوحة التسجيل</th>
                <td><?php echo $row['RegistrationNumber'];?></td>
                <th>فئة المركبة</th>
                <td><?php echo $row['VehicleCategory'];?></td>
            </tr>

            <tr>
                <th>شركة المركبة</th>
                <td><?php echo $row['VehicleCompanyname'];?></td>
                <th>سائق السيارة</th>
                <td><?php echo ''.$row['ParkingNumber'];?></td>
            </tr>

            <tr>
                <th>اسم المستخدم</th>
                <td><?php echo $row['OwnerName'];?></td>
                <th>رقم هاتف المستخدم</th>
                <td><?php echo $row['OwnerContactNumber'];?></td>
            </tr>

            <tr>
                <th>في الخدمة منذ</th>
                <td><?php echo $row['InTime'];?></td>
                <th>الوضع الحالي</th>
                <td> 
                    <?php  
                    if($row['Status'] == ""){
                        echo " في الخدمة";
                    } elseif($row['Status'] == "Out"){
                        echo " خارج الخدمة";
                    }
                    ?>
                </td>
            </tr>

            <?php if($row['Remark'] != ""){ ?>
            <tr>
                <th>تعطلت في</th>
                <td><?php echo $row['OutTime'];?></td>
                <th>المسافة الإجمالية</th>
                <td><?php echo $row['ParkingCharge'] . " Km";?></td>
            </tr>

            <tr>
                <th>ملاحظات</th>
                <td colspan="3"><?php echo $row['Remark'];?></td> 
            </tr>
            <?php } ?>

            <tr>
                <td colspan="4" style="text-align:center; cursor:pointer">
                    <i class="fa fa-print fa-4x" aria-hidden="true" onclick="confirmPrint()" style="color: blue;"></i>
                </td>
            </tr>
        </table>
    </div>
    <?php } ?>
</div><!--/.main-->
<div class="col-lg-2"></div>

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

<!-- SweetAlert Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.js"></script>

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

    function confirmPrint() {
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "هل ترغب حقًا في طباعة هذا الإيصال؟",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم, طباعة!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                printReceipt();
            }
        });
    }

    function printReceipt() {
        var prtContent = document.getElementById("exampl");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
</body>
</html>
