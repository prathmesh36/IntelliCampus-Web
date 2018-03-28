<?php
require 'assets/backend/connect.php';
require 'assets/backend/core.php';
require 'assets/backend/data.php';
$name=explode(" ",$_GET['id']);
$query="SELECT id FROM login WHERE firstname='".$name[0]."' AND surname='".$name[1]."'";
$query_run=mysqli_query($con,$query);

$query_array=mysqli_fetch_assoc($query_run);
$id=$query_array["id"];

echo '<script type="text/javascript">';
echo 'window.location.href="profile.php?id='.$id.'";';
echo '</script>';
?>
