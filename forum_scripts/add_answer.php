<?php
 $host="localhost"; // Host name
$username="prathmesh36"; // Mysql username
$password="161297pmM"; // Mysql password
$db_name="gpmnetwork"; // Database name
$tbl_name="forum_answer"; // Table name


include '../assets/backend/connect.php';
include '../assets/backend/core.php';
require '../assets/backend/data.php';


// Get value of id that sent from hidden field
 $id=$_POST['id'];


// Find highest answer number.
 $sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id'";
 $result=mysqli_query($con,$sql);
 $rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1
 if ($rows) {
 $Max_id = $rows['Maxa_id']+1;
 }
 else {
 $Max_id = 1;
 }



// get values that sent from form
 if(isset($_POST['a_answer'])){
 $a_name=$firstname.' '.$surname;
 $a_email=$email;
 $a_answer=htmlentities($_POST['a_answer']);
 $uid=$user_id;
 	date_default_timezone_set("Asia/Kolkata");
 $datetime=date("d/m/y H:i:s"); // create date and time
if(!empty($a_answer))
{
 // Insert answer
 $sql2="INSERT INTO $tbl_name(question_id, a_id, a_name, a_email, a_answer, a_datetime,id) VALUES('".mysqli_real_escape_string($con,$id)."', '".mysqli_real_escape_string($con,$Max_id)."', '".mysqli_real_escape_string($con,$a_name)."', '".mysqli_real_escape_string($con,$a_email)."', '".mysqli_real_escape_string($con,$a_answer)."', '".mysqli_real_escape_string($con,$datetime)."','".mysqli_real_escape_string($con,$uid)."')";
 $result2=mysqli_query($con,$sql2);



if($result2){
 echo "Successful<BR>";


 // If added new answer, add value +1 in reply column
 $tbl_name2="forum_question";
 $sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE topic_id='$id'";
 $result3=mysqli_query($con,$sql3);
 header('Location:../view_topic.php?id='.$id.'');
}
 else {
 echo 'ERROR2';
 }
 }
 else
 {
 echo 'Please Fill the details';
 }
}
// Close connection


mysql_close($con);
 ?>
