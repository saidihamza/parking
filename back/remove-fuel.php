<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
}

if(isset($_GET['editid'])) {
    $id=$_GET['editid'];
    $query=mysqli_query($con, "DELETE FROM fuel WHERE id='$id'");
    if($query) {
       
        echo "<script>window.location.href='total-income.php'</script>";
    } else {
       
        echo "<script>window.location.href='total-income.php'</script>";
    }
}
?>
