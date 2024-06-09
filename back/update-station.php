<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    $RefSt = $_POST['RefSt'];
    $Descr = $_POST['Descr'];
    
    $query = mysqli_query($con, "UPDATE fuel SET RefSt='$RefSt', Descr='$Descr' WHERE id='$eid'");
    if ($query) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'تم تحديث محطة الوقود بنجاح';
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'حدث خطأ أثناء تحديث محطة الوقود';
    }
}

$eid = $_GET['editid'];
$ret = mysqli_query($con, "SELECT * FROM fuel WHERE ID='$eid'");
$row = mysqli_fetch_array($ret);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تحديث محطة وقود</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Inclure SweetAlert -->
</head>
<body>
    <?php include 'includes/navigation.php'; ?>
    <?php include 'includes/sidebar.php'; ?>

    <?php if (isset($_SESSION['status'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: '<?php echo $_SESSION['status']; ?>',
                    title: '<?php echo $_SESSION['status'] === 'success' ? 'نجاح' : 'خطأ'; ?>',
                    text: '<?php echo $_SESSION['message']; ?>',
                }).then((result) => {
                    if (result.isConfirmed && '<?php echo $_SESSION['status']; ?>' === 'success') {
                        window.location.href = 'lieu-carburant.php';
                    }
                });
            });
        </script>
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['message']);
        ?>
    <?php endif; ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><em class="fa fa-home"></em></a></li>
                <li class="active">تحديث محطة وقود</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">تحديث المحطة</div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>اسم المحطة</label>
                                <input type="text" class="form-control" name="RefSt" value="<?php echo $row['RefSt']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>ملاحظات</label>
                                <textarea class="form-control" name="Descr" required><?php echo $row['Descr']; ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
</body>
</html>
