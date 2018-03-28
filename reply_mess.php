<script type="text/javascript">
function setm()
{
	<?php $_SESSION['data']=$mess;?>
}
 </script>
<?php

 //if($set==0)
 //{
	 $frame_id=$_GET['id'];
?>
<div onunload="setm();" style="position:relative;top:-45px;left:3px;width:250px;border:solid 1px silver;padding:10px;background:#F0f0F0;">
<form  action="<?php echo $filename.'?id='.$frame_id;?>" method="POST">
<br>
<select name="rec" style="width:200px;height:30px;">
<?php
//if($b==0)
//{
	$reciever=$_GET['id'];
	$set=1;
/*}else{
	$reciever=$_GET['id'];
	$set=1;
}*/

	if($reciever!=$user_id)
	{
	$query1="SELECT * FROM login WHERE id= $reciever";
	$query_run1=mysqli_query($con,$query1);
	while($query_array3=mysqli_fetch_assoc($query_run1))
	echo '<option value="'.$query_array3['id'].'">'.$query_array3['firstname'].' '.$query_array3['surname'].'</option>';
	}

?>
</select><br><br>

<b  style="color:black;font-family:arial;font-size:15;">Type your Message-:</b><br><br>
<textarea cols="28" rows="5" name="mess"></textarea>
<br><br>
<input type="submit" Value="Send" >
</form>

<?php
 //}

if(isset($_POST['rec']) && isset($_POST['mess']))
{
$sender=$user_id;
$reciever=$_POST['rec'];
$query2="SELECT firstname, surname FROM login WHERE id='$reciever'";
$query2_run=mysqli_query($con,$query2);
$query2_assoc=mysqli_fetch_assoc($query2_assoc);
$firstname2=$query2_assoc['firstname'];
$surname2=$query2_assoc['surname'];
$mess=htmlentities($_POST['mess']);
	date_default_timezone_set("Asia/Kolkata");
	 $datetime=date("y/m/d H:i:s");
$time=time();
if(!empty($sender) && !empty($reciever) && !empty($mess))
{
$querym="INSERT INTO message VALUES('','".mysqli_real_escape_string($con,$sender)."','".mysqli_real_escape_string($con,$reciever)."','".mysqli_real_escape_string($con,$mess)."','".mysqli_real_escape_string($con,$firstname)."','".mysqli_real_escape_string($con,$surname)."','".mysqli_real_escape_string($con,$datetime)."',$time)";
if($querym_run=mysqli_query($con,$querym))
{
$url="iframemess.php?id=".$frame_id;
echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
//break;
}
}
else
{
echo '<b>Please Enter the Details</b>';
}
}
?>
</div>
