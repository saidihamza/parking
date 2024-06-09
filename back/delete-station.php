<?php
session_start();
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $query = "DELETE FROM fuel WHERE id=$id";
    if (mysqli_query($con, $query)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
