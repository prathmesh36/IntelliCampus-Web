<?php
require '../assets/backend/core.php';
require '../assets/backend/connect.php';
date_default_timezone_set("Asia/Kolkata");
 $datetime=date("y/m/d h:i:s"); //create date time
 $sql="UPDATE login SET lastvisit='$datetime' WHERE id='$user_id'";
 if($sql_run=mysqli_query($con,$sql))
 {
 	unset($_SESSION['user_id']);
 	header('Location:../login.php');
 }
 ?>
