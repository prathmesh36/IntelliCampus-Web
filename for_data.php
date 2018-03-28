<?php
require 'assets/backend/connect.php';
require 'assets/backend/core.php';
require 'assets/backend/data.php';
$query="SELECT topic_id FROM forum_question";
$query_run=mysqli_query($con,$query);
global $pro_id;

while($data=mysqli_fetch_assoc($query_run))
{
$pro_id=$data['topic_id'];
}
global $page_id;
?>
