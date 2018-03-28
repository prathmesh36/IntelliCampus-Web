<?php
require("connect.php");
//include "admin.php";
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql="UPDATE leavedb SET Status='Approved' where ID=".$id;
$result = mysqli_query($con,$sql);
if($result==1)
{
  echo '<script type="text/javascript">';
  echo 'window.location.href="admin.php";';
  echo '</script>';
}
}
?>
