<?php
include 'assets/backend/connect.php';
include 'assets/backend/core.php';
require 'assets/backend/data.php';

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
	if(isset($_POST['send'])){

		$arr= array();

		if(preg_replace( "/\r|\n/", "", $_POST["credential"] ) <70){
			if(function_exists('date_default_timezone_set')) {
					date_default_timezone_set("Asia/Kolkata");
			}
			$date=time();
			$dayofweek = date('D', $date);
      $queryg="SELECT * FROM room WHERE roomno=".$_POST["credential"]." AND day='".$dayofweek."'";
      $queryg_run=mysqli_query($con,$queryg);
      $cdet=mysqli_fetch_assoc($queryg_run);
			$arr['success']=true;
			$hrtime=intval(date('Hi',$date));
			if($hrtime>700 && $hrtime<800)
			{
							$arr['det']=$cdet["slot1"];
			}
			else if($hrtime>800 && $hrtime<900)
			{
							$arr['det']=$cdet["slot2"];
			}
			else if($hrtime>900 && $hrtime<930)
			{
							$arr['det']=$cdet["slot3"];
			}
			else if($hrtime>930 && $hrtime<1030)
			{
							$arr['det']=$cdet["slot4"];
			}
			else if($hrtime>1030 && $hrtime<1100)
			{
							$arr['det']=$cdet["slot5"];
			}
			else if($hrtime>1100 && $hrtime<1130)
			{
							$arr['det']=$cdet["slot6"];
			}
			else if($hrtime>1130 && $hrtime<1200)
			{
							$arr['det']=$cdet["slot7"];
			}
			else if($hrtime>1200 && $hrtime<1230)
			{
							$arr['det']=$cdet["slot8"];
			}
			else if($hrtime>1230 && $hrtime<1300)
			{
							$arr['det']=$cdet["slot9"];
			}
			else if($hrtime>1300 && $hrtime<1330)
			{
							$arr['det']=$cdet["slot10"];
			}
			else if($hrtime>1330 && $hrtime<1400)
			{
							$arr['det']=$cdet["slot11"];
			}
			else if($hrtime>1400 && $hrtime<1430)
			{
							$arr['det']=$cdet["slot12"];
			}
			else if($hrtime>1430 && $hrtime<1530)
			{
							$arr['det']=$cdet["slot13"];
			}
			else if($hrtime>1530 && $hrtime<1630)
			{
							$arr['det']=$cdet["slot14"];
			}
			else if($hrtime>1630 && $hrtime<1730)
			{
							$arr['det']=$cdet["slot15"];
			}
			else {
							$arr['det']="College Closed/";
			}
		}
		 else {
			$arr['success'] = false;
		}
    //echo "<script>alert('ey')</script>";

		echo json_encode($arr);
	}
}else
{
  echo '<script type="text/javascript">';
  //echo 'window.location.href="login.php";';
  echo '</script>';
  }
?>
