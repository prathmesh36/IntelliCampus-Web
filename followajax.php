<?php
require 'assets/backend/connect.php';
require 'assets/backend/core.php';
require 'assets/backend/data.php';

$u_id=$_GET['id'];

$query="SELECT follow FROM login WHERE id='$u_id'";
$query_run=mysqli_query($con,$query);
$query_array=mysqli_fetch_assoc($query_run);
$follow=$query_array['follow'];
$a=0;
$x= explode(',',$follow);
foreach($x as $x_a)
{
  if($x_a==$user_id)
  {
  $a=1;
  }
}

if($a!=1)
{
  $query1="UPDATE login SET follow='$follow,$user_id' WHERE id='$u_id'";
}

if(@$query_run1=mysqli_query($con,$query1))
{
  echo 'pass';
}
else {

  echo "fsdf".$u_id.'fail';
}
