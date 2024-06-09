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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.4/sweetalert2.min.css">
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="row">
            
        </div><!--/.row-->
        <a href="total-income.php"><button class="btn btn-primary">العودة</button></a>

        <?php
            $cid = $_GET['vid']; // Ensure you sanitize and validate this input
            $ret = mysqli_query($con, "SELECT * FROM fuel WHERE id='$cid'");
            while ($row = mysqli_fetch_array($ret)) {
        ?>
        <div id="example">
            <table id="dom-jqry" class="table table-striped table-bordered">
                <tr>
                    <th colspan="4" style="text-align: center; font-size:22px;">إيصال استهلاك الوقود</th>
                </tr>
                <tr>
                    <th>لوحة التسجيل</th>
                    <td><?php echo $row['RegistrationNumb'];?></td>
                    <th>فئة المركبة</th>
                    <td><?php echo $row['VehiclCat'];?></td>
                </tr>
                <tr>
                    <th>المحطة</th>
                    <td><?php echo $row['RefSt'];?></td>
                    <th>كمية الوقود</th>
                    <td><?php echo $row['quatf'];?></td>
                </tr>
                <tr>
                    <th>تاريخ التزود</th>
                    <td><?php echo $row['DateRef'];?></td>
                    <th>ملاحظات</th>
                    <td><?php echo $row['Descr'];?></td>
                </tr>
                <?php if (!empty($row['Remark'])) { ?>
                <tr>
                    <th>تعطلت في</th>
                    <td><?php echo $row['OutTime'];?></td>
                    <th>المسافة الإجمالية</th>
                    <td><?php echo $row['ParkingCharge'] . "Km/h";?></td>
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
    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.4/sweetalert2.all.min.js"></script>

    <script>
        function confirmPrint() {
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "هل ترغب حقًا في طباعة هذا الإيصال؟",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، اطبع',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    printReceipt();
                }
            });
        }

        function printReceipt() {
            var prtContent = document.getElementById("example");
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
