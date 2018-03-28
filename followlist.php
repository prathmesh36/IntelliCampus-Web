<?php
require 'assets/backend/connect.php';
require 'assets/backend/core.php';
$user_id=$_SESSION["user_id"];
$u_id=$_GET['id'];
$query1="SELECT * FROM login WHERE id='$u_id'";
$query1_run=mysqli_query($con,$query1);
$query1_array=mysqli_fetch_assoc($query1_run);
 if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
 {

	$follow=$query1_array['follow'];

	$x= explode(',',$follow);
	foreach($x as $x_a)
	{

	$query_2="SELECT * FROM login WHERE id='$x_a'";
	$query2_run=mysqli_query($con,$query_2);
	while($query_array3=mysqli_fetch_assoc($query2_run))
	{
      if(file_exists('images/users/'.$x_a.'.jpg'))
		  {
        echo $x_a;
		  }
		  else
		  {
        echo 'default'.$x_a;
		  }
	    echo '~'.$query_array3['firstname'].' '.$query_array3['surname'].'~';
      $checklist=$query_array3['follow'];
	    $y= explode(',',$checklist);
      $a=0;
      foreach($y as $y_a)
   		{
     		if($y_a==$user_id)
     		{
     		$a=1;
     		}
   		}
      if(@$a!=1)
      {
        if($user_id!=$x_a)
        {
          echo 'Follow/';
        }
        else {
          echo '/';
        }

      }
      else {
          echo 'Following/';
      }
	}

	}

	}
  ?>
