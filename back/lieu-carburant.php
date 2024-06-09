<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إدارة محطات التزود بالوقود</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include 'includes/navigation.php'; ?>
    <?php include 'includes/sidebar.php'; ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><em class="fa fa-home"></em></a></li>
                <li class="active">إدارة محطات التزود بالوقود</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">محطة الوقود<a href="add-lieu.php" class="btn btn-sm btn-primary">إضافة محطة جديدة</a></div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المحطة</th>
                                    <th>ملاحظات</th>
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
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['RefSt']; ?></td>
                                        <td><?php echo '<span>' . $row['Descr'] . '</span>'; ?></td>
                                        <td>
                                            <a href="update-station.php?editid=<?php echo $row['id']; ?>">
                                                <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                            </a>
                                            <button class="btn btn-danger btn-sm" onclick="deleteStation(<?php echo $row['id']; ?>)"><i class="fa fa-trash"></i></button>
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
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function deleteStation(stationId) {
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "سيتم حذف هذه المحطة الوقود نهائياً!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، احذفها!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'delete-station.php',
                        type: 'POST',
                        data: { id: stationId },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire('تم الحذف!', 'تم حذف المحطة الوقود بنجاح.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('خطأ!', 'حدث خطأ أثناء حذف المحطة الوقود.', 'error');
                            }
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>
