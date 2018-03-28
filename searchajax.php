<?php
  require 'assets/backend/connect.php';
  require 'assets/backend/core.php';
  $name=$_GET["name"];

  $query="SELECT * FROM login WHERE firstname LIKE '".$name."%' LIMIT 10";
  $query_run=mysqli_query($con,$query);
  while($rows=mysqli_fetch_assoc($query_run))
  {
    echo trim($rows["firstname"])." ".trim($rows["surname"])."~";
  }
?>
