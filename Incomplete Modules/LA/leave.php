<?php
require("connect.php");
if(isset($_POST['submit'])){
	if(isset($_POST['leave_type'])){
	$leave=$_POST['leave_type'];
	}
	if(isset($_POST['fromDate'])){
	$from=$_POST['fromDate'];
	}
	if(isset($_POST['toDate'])){
	$to=$_POST['toDate'];
	}
	if(isset($_POST['reasons'])){
	$rs=$_POST['reasons'];
	}
	$sql="INSERT INTO leavedb (LeaveType,FromDate,ToDate,Reason) VALUES ('$leave','$from','$to','$rs')";
	$result = mysqli_query($con,$sql);

	//mysql_query("INSERT INTO leavedb (LeaveType,FromDate,ToDate) VALUES ('$leave_type','$from','$to')");
}
?>
