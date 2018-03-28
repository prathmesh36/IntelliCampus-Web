<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {
    $user_id=$_SESSION['user_id'];
    $query="SELECT * FROM login WHERE id='".$user_id."'";
    $query_run=mysqli_query($con,$query);
    $rows=mysqli_fetch_assoc($query_run);
    $firstname=$rows["firstname"];
    $surname=$rows["surname"];
    $email=$rows["email"];
  }

?>
