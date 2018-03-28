<?php
require 'assets/backend/data.php';
 if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
 {
?>
<div style="position:relative;top:20px;left:150px;width:400px;border:solid 1px silver;padding:10px;">

<?php
if(isset($_POST['rec']) && isset($_POST['mess']))
{
$sender=$user_id;
$recnames=explode(" ",trim($_POST["rec"]));
$query2="SELECT id,firstname, surname FROM login WHERE firstname='".$recnames[0]."' AND surname='".$recnames[1]."'";
$query2_run=mysqli_query($con,$query2);
$query2_assoc=mysqli_fetch_assoc($query2_run);
$firstname2=$query2_assoc['firstname'];
$surname2=$query2_assoc['surname'];
$reciever=$query2_assoc['id'];
$mess=htmlentities($_POST['mess']);
	date_default_timezone_set("Asia/Kolkata");
	 $datetime=date("y/m/d H:i:s");
$time=time();
echo $firstname2;
if(!empty($sender) && !empty($reciever))
{
$querym="INSERT INTO message VALUES('','".mysqli_real_escape_string($con,$sender)."','".mysqli_real_escape_string($con,$reciever)."','".mysqli_real_escape_string($con,$mess)."','".mysqli_real_escape_string($con,$firstname)."','".mysqli_real_escape_string($con,$surname)."','".mysqli_real_escape_string($con,$datetime)."',$time)";
if($querym_run=mysqli_query($con,$querym))
{
$url="chat.php";
echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';

}
}
else
{
echo '<b>Please Enter the Details</b>';
}
}
}
?>
</div>
<br><br>
