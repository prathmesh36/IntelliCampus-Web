<?php
 $host="localhost"; // Host name
$username="prathmesh36"; // Mysql username
$password="161297pmM"; // Mysql password
$db_name="gpmnetwork"; // Database name
$tbl_name="forum_question"; // Table name


include '../assets/backend/connect.php';
include '../assets/backend/core.php';
require '../assets/backend/data.php';

$query="SELECT pro_id, page_id FROM store";
$query_run=mysqli_query($con,$query);
while($data=mysqli_fetch_assoc($query_run))
{
$page_id=$data['page_id'];
}
global $page_id;


// get data that sent from form
 if(isset($_POST['topic']) && isset($_POST['detail']))
{
for($i=1;$i<=1;$i++){
$doubt="SELECT page_id FROM store WHERE page_id='$i'";
$doubt_run=mysqli_query($con,$doubt);
$numx=mysqli_num_rows($doubt_run);
if($numx>=10)
{
$page_id++;
}
}

 $topic=$_POST['topic'];
 $detail=htmlentities($_POST['detail']);
 $name=$firstname.' '.$surname;
 $id = $user_id;
 if(!empty($topic) && !empty($detail))
{
 	date_default_timezone_set("Asia/Kolkata");
 $datetime=date("d/m/y h:i:s"); //create date time

 $sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime, id,view,reply,type,page_id)VALUES('".mysqli_real_escape_string($con,$topic)."', '".mysqli_real_escape_string($con,$detail)."', '".mysqli_real_escape_string($con,$name)."', '".mysqli_real_escape_string($con,$email)."', '".mysqli_real_escape_string($con,$datetime)."','".mysqli_real_escape_string($con,$id)."','0','0','".mysqli_real_escape_string($con,'perl')."','$page_id')";
 $result=mysqli_query($con,$sql);

 if($result){
 $url="../file_upload_for.php";
echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';

 echo "<font color='black' >Successful<BR></font>";
 }
 else {
     echo '<script type="text/javascript">';
     echo 'window.location.href="../create_topic.php#error2";';
     echo '</script>';
 }
 mysqli_close($con);
 }
  else
 {
     echo '<script type="text/javascript">';
     echo 'window.location.href="../create_topic.php#error1";';
     echo '</script>';
 }
 }


 ?>
<head>
<meta charset="UTF-8">
<meta name="description" content="Government Polytechnic Mumbai (GPM) Forum">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Prathmesh & Mandar">
</head>
