
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!--two add-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>

	.element::-webkit-scrollbar { width: 0 !important }
	.element { overflow: -moz-scrollbars-none; }
	.element { -ms-overflow-style: none; }

	.element, .outer-container {
	 width: 317px;
	 height: 377px;
	}
	 
	.outer-container {
	 border: 8px solid purple;
	 position: relative;
	 overflow: hidden;
	}
	 
	.inner-container {
	 position: absolute;
	 left: 0;
	 overflow-x: hidden;
	 overflow-y: scroll;
	}
	 
	.inner-container::-webkit-scrollbar {
	 display: none;
	}

	div.speech:before
	{
		content: ' ';
		position: absolute;
		width: 0;
		height: 0;
		left: 30px;
		bottom: -45px;
		border: 25px solid;
		border-color: #E0E0E0 transparent transparent #E0E0E0;
	}
	div.speech:after
	{
		content: ' ';
		position: absolute;
		width: 0;
		height: 0;
		left: 30px;
		bottom: -45px;
		border: 25px solid;
		border-color: #E0E0E0 transparent transparent #E0E0E0;
	}
	</style>
</head>

  <meta http-equiv="refresh" content="10" />
<?php
include 'assets/backend/connect.php';
include 'assets/backend/core.php';
require 'assets/backend/data.php';
$set=0;
$frame_id=mysqli_real_escape_string($con,$_GET['id']);
if($frame_id!=$user_id)
{
$allq="SELECT id FROM message";
$allq_run=mysqli_query($con,$allq);
$allq_count=mysqli_num_rows($allq_run);
$sidq="SELECT sen_id FROM message WHERE rec_id='".mysqli_real_escape_string($con,$user_id)."' ";
$sidqrun=mysqli_query($con,$sidq);
$i=0;
while($sidqrows=mysqli_fetch_array($sidqrun))
{
$sendlist[$i]=$sidqrows['sen_id'];
$i++;
}
for($j=0;$j<$allq_count;$j++)
{
	$alone[$j]=0;
}
$sql2="SELECT sen_id,fname_sen,sname_sen,rec_id FROM message WHERE (rec_id='".mysqli_real_escape_string($con,$user_id)."' OR sen_id='".mysqli_real_escape_string($con,$user_id)."') AND (rec_id='".mysqli_real_escape_string($con,$frame_id)."' OR sen_id='".mysqli_real_escape_string($con,$frame_id)."') ORDER BY time DESC";
 $result2=mysqli_query($con,$sql2);
$i=0;
 	  $messt="SELECT messtime FROM login WHERE id='$user_id'";
	  $messtrun=mysqli_query($con,$messt);
	  $messtrows=mysqli_fetch_assoc($messtrun);
	  $messtime=$messtrows['messtime'];

while($rows=mysqli_fetch_array($result2))
{
$b=0;
$c=0;
$d=0;

if($i==0 && $rows['sen_id']==$user_id)
{
	$b++;
}

$a[$i]=$rows['sen_id'];

for($j=0;$j<$i;$j++)
{
	if($a{$j}==$rows['sen_id'])
	{
	$b++;
	}
}

if($rows['rec_id']==$user_id)
{
	$c=1;
}
for($k=0;$k<count($sendlist);$k++)
{
	if(($sendlist[$k]==$rows['rec_id']))
	{
		$c++;
	}
}



for($k=0;$k<count($alone);$k++)
{
	if($rows['rec_id']==$alone[$k])
	{
		$d=1;
	}
}


if($c==0 && $d!=1)
{
	$alone[$i]=$rows['rec_id'];
}

if(($b==0) || ($c==0 && $d==0 ))
{?>
  <div  id="over" style="width:280px;padding:0px;">
		<script type="text/javascript">
	  var element = document.getElementById("over");
	 element.scrollTop = element.scrollHeight;
	  </script>
<div class="direct-chat-messages">
 <?php
 if($c==0 && $d==0)
 {
  $sql3="SELECT fname_sen,sname_sen,mess,date,sen_id FROM message WHERE (sen_id='".mysqli_real_escape_string($con,$rows['sen_id'])."' AND rec_id='".mysqli_real_escape_string($con,$user_id)."') OR (sen_id='".mysqli_real_escape_string($con,$user_id)."' AND rec_id='".mysqli_real_escape_string($con,$rows['rec_id'])."') ";
 }else{
 $sql3="SELECT fname_sen,sname_sen,mess,date,sen_id FROM message WHERE (sen_id='".mysqli_real_escape_string($con,$rows['sen_id'])."' AND rec_id='".mysqli_real_escape_string($con,$user_id)."') OR (sen_id='".mysqli_real_escape_string($con,$user_id)."' AND rec_id='".mysqli_real_escape_string($con,$rows['sen_id'])."') ";
 }$sql3_run=mysqli_query($con,$sql3);
 $m=0;
 $e=0;
 while($sql3_rows=mysqli_fetch_assoc($sql3_run))
 {
	if($sql3_rows['sen_id']==$user_id)
	{
 ?>

 <div class="direct-chat-msg right">
 	<div class="direct-chat-info clearfix">
 		<span class="direct-chat-name pull-left"><?php echo $sql3_rows['fname_sen']." ".$sql3_rows['sname_sen']; ?></span>
 		<span class="direct-chat-timestamp pull-right"><?php echo $sql3_rows['date']; ?></span>
 	</div>
 	<!-- /.direct-chat-info -->
 	<img class="direct-chat-img" src='images/users/<?php if(file_exists('images/users/'.$user_id.'.jpg')){echo $user_id;}else{echo 'default';}?>.jpg' alt="message user image">
 	<!-- /.direct-chat-img -->
 	<div class="direct-chat-text">
 		<?php echo $sql3_rows['mess']; ?>
 	</div>
 	<!-- /.direct-chat-text -->
 </div>
<?php
	 }
	 else
	 {
?>
<div class="direct-chat-msg">
<?php
if($e==0)
{
if($sql3_rows['date']>$messtime){
	echo '<b style="background:#E0E0E0;padding:10px;color:black;position:relative;left:10px;">New Message</b><br><br>';
	$e=1;
}
}
?>
	<div class="direct-chat-info clearfix">
		<span class="direct-chat-name pull-left"><?php echo $sql3_rows['fname_sen']." ".$sql3_rows['sname_sen']; ?></span>
		<span class="direct-chat-timestamp pull-right"><?php echo $sql3_rows['date']; ?></span>
	</div>
	<!-- /.direct-chat-info -->
	<img class="direct-chat-img" src='images/users/<?php if(file_exists('images/users/'.$rows['sen_id'].'.jpg')){echo $rows['sen_id'];}else{echo 'default';}?>.jpg' alt="message user image">
	<!-- /.direct-chat-img -->
	<div class="direct-chat-text">
		<?php echo $sql3_rows['mess']; ?>
	</div>
	<!-- /.direct-chat-text -->
</div>

<?php
	 }
	 $m++;
 }
?>
</div>
</div>



 <?php
}

$i++;
}
}else{

	echo '<center><b style="color:silver;">Click on some Other Person to see his Messages</b></center>';
}
?>

 <!--<tr>
 <td  colspan="2" >
 <?php
// require 'create_mess.php';

 ?>
 </td>
 </tr>-->
