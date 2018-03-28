<?php
require 'assets/backend/data.php';
$query="SELECT pro_id FROM store";
$query_run=mysqli_query($con,$query);
global $pro_id;

while($data=mysqli_fetch_assoc($query_run))
{
$pro_id=$data['pro_id'];
}
global $page_id;
?>
