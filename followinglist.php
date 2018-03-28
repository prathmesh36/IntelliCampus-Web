<?php
require 'assets/backend/connect.php';
require 'assets/backend/core.php';
  $u_id=$_GET['id'];
  $user_id=$_SESSION["user_id"];

  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {
		$query1="SELECT * FROM login";
		$query_run1=mysqli_query($con,$query1);
		while($query_array3=mysqli_fetch_assoc($query_run1))
		{
		$follow=$query_array3['follow'];
		$x= explode(',',$follow);
    $a=0;
    $b=0;
		foreach($x as $x_a)
		{
		  if($x_a==$u_id)
			{
        $b=1;
			    if(file_exists('images/users/'.$query_array3['id'].'.jpg'))
				  {
				  echo $query_array3['id'];
				  }
				  else
				  {
				   echo "default".$query_array3['id'];
				  }
    			echo '~'.$query_array3['firstname'].' '.$query_array3['surname'].'~';
			}
        if($x_a==$user_id)
        $a=1;
		 }
     if($a==1 && $b==1)
     {
         echo 'Following/';
     }
     else if($b==1) {
         echo 'Follow/';
     }
		}


	}
