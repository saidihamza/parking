<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
}

if(isset($_POST['submit'])) {
    $id=intval($_GET['editid']);
    $VehicleCat=$_POST['VehicleCat'];
    $RegistrationNumb=$_POST['RegistrationNumb'];
    $RefSt=$_POST['RefSt'];
    $quatf=$_POST['quatf'];
    $DateRef=$_POST['DateRef'];

    $query=mysqli_query($con, "update fuel set VehiclCat='$VehicleCat', RegistrationNumb='$RegistrationNumb', RefSt='$RefSt', quatf='$quatf', DateRef='$DateRef' where id='$id'");
    if ($query) {
        $msg="تم تحديث بيانات الوقود بنجاح.";
        // Rediriger vers total-income.php après la mise à jour
        header('Location: total-income.php');
        exit; // Assurez-vous qu'aucun autre contenu n'est envoyé après cette redirection
    }
    else {
        $msg="حدث خطأ. يرجى إعادة المحاولة.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تحديث الوقود</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
<?php include 'includes/navigation.php' ?>

<?php include 'includes/sidebar.php' ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="dashboard.php"><em class="fa fa-home"></em></a></li>
            <li class="active">تحديث الوقود</li>
        </ol>
    </div><!--/.row-->

    <div class="panel panel-default">
        <div class="panel-heading">تحديث الوقود</div>
        <div class="panel-body">
            <form role="form" method="post">
                <?php
                $id=intval($_GET['editid']);
                $query=mysqli_query($con,"select * from fuel where id='$id'");
                while($row=mysqli_fetch_array($query))
                {
                ?>
                <div class="form-group">
                    <label>فئة المركبة</label>
                    <input class="form-control" type="text" value="<?php echo htmlentities($row['VehiclCat']);?>" name="VehicleCat" required>
                </div>
                <div class="form-group">
                    <label>لوحة التسجيل</label>
                    <input class="form-control" type="text" value="<?php echo htmlentities($row['RegistrationNumb']);?>" name="RegistrationNumb" required>
                </div>
                <div class="form-group">
                    <label>المحطة</label>
                    <input class="form-control" type="text" value="<?php echo htmlentities($row['RefSt']);?>" name="RefSt" required>
                </div>
                <div class="form-group">
                    <label>كمية الوقود</label>
                    <input class="form-control" type="text" value="<?php echo htmlentities($row['quatf']);?>" name="quatf" required>
                </div>
                <div class="form-group">
                    <label>تاريخ التزود</label>
                    <input class="form-control" type="text" value="<?php echo htmlentities($row['DateRef']);?>" name="DateRef" required>
                </div>
                <?php } ?>
                <button type="submit" name="submit" class="btn btn-primary">تحديث</button>
            </form>
        </div>
    </div>
</div><!--/.main-->

<?php include 'includes/footer.php'?>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
