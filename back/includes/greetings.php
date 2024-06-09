<?php 
 
    include 'dbconn.php';
    date_default_timezone_set('Asia/Kathmandu');
    //Here we define out main variables 
    $welcome_string="مرحباً"; 
    $numeric_date=date("G"); 
    
    //Start conditionals based on military time 
    if($numeric_date>=0&&$numeric_date<=11) 
    $welcome_string="صباح الخير "; 
    else if($numeric_date>=12&&$numeric_date<=17) 
    $welcome_string="مساء الخير "; 
    else if($numeric_date>=18&&$numeric_date<=23) 
    $welcome_string="مساء النور "; 

    $adminid=$_SESSION['vpmsaid'];
    $ret=mysqli_query($con,"SELECT * from admin where ID='$adminid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {
    
        echo $welcome_string, $row['AdminName']; }
 
?>