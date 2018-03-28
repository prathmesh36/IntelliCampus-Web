<?php
include 'assets/backend/connect.php';
include 'assets/backend/core.php';
require 'assets/backend/data.php';

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
	if(isset($_POST['send'])){

		$arr= array();

		if(preg_replace( "/\r|\n/", "", $_POST["credential"] ) == "sub1"){
      $queryg="SELECT * FROM attendence WHERE id=".$user_id;
      $queryg_run=mysqli_query($con,$queryg);
      $atten=mysqli_fetch_assoc($queryg_run);
      $attenint=$atten[$_POST["credential"]]+1;
			if(function_exists('date_default_timezone_set')) {
			    date_default_timezone_set("Asia/Kolkata");
			}
			$now = time(); // or your date as well
			$your_date = strtotime($atten["sub1time"]);
			$datediff = $now - $your_date;

			$days = floor($datediff / (60 * 60 * 24));
			// then use the date functions, not the other way around
			$date = date("y/m/d H:i:s");
			if($days>=1)
			{
	      $queryu="UPDATE attendence SET sub1=".$attenint.", sub1time='".$date."' WHERE id=".$user_id;
	      if($queryu_run=mysqli_query($con,$queryu))
	      {
				     $arr['success'] = true;
	      }
			}else {
				$arr['success'] = "already";
			}
		}else if(preg_replace( "/\r|\n/", "", $_POST["credential"] ) == "sub2"){
			$queryg="SELECT * FROM attendence WHERE id=".$user_id;
			$queryg_run=mysqli_query($con,$queryg);
			$atten=mysqli_fetch_assoc($queryg_run);
			$attenint=$atten[$_POST["credential"]]+1;
			if(function_exists('date_default_timezone_set')) {
					date_default_timezone_set("Asia/Kolkata");
			}
			$now = time(); // or your date as well
			$your_date = strtotime($atten["sub2time"]);
			$datediff = $now - $your_date;

			$days = floor($datediff / (60 * 60 * 24));
			// then use the date functions, not the other way around
			$date = date("y/m/d H:i:s");
			if($days>=1)
			{
				$queryu="UPDATE attendence SET sub2=".$attenint.", sub2time='".$date."' WHERE id=".$user_id;
				if($queryu_run=mysqli_query($con,$queryu))
				{
						 $arr['success'] = true;
				}
			}else {
				$arr['success'] = "already";
			}
		}else if(preg_replace( "/\r|\n/", "", $_POST["credential"] ) == "sub3"){
      $queryg="SELECT * FROM attendence WHERE id=".$user_id;
      $queryg_run=mysqli_query($con,$queryg);
      $atten=mysqli_fetch_assoc($queryg_run);
      $attenint=$atten[$_POST["credential"]]+1;
			if(function_exists('date_default_timezone_set')) {
			    date_default_timezone_set("Asia/Kolkata");
			}
			$now = time(); // or your date as well
			$your_date = strtotime($atten["sub3time"]);
			$datediff = $now - $your_date;

			$days = floor($datediff / (60 * 60 * 24));
			// then use the date functions, not the other way around
			$date = date("y/m/d H:i:s");
			if($days>=1)
			{
	      $queryu="UPDATE attendence SET sub3=".$attenint.", sub3time='".$date."' WHERE id=".$user_id;
	      if($queryu_run=mysqli_query($con,$queryu))
	      {
				     $arr['success'] = true;
	      }
			}else {
				$arr['success'] = "already";
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
