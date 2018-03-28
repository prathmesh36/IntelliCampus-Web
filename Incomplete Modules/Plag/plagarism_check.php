<?php
  function content(){
    $con = mysqli_connect("localhost", "root", "", "assignment");
    if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $query = "select * from plagarised WHERE plagarised_label='copied'";
    $result = mysqli_query($con, $query);
    if($result){
      while($row = mysqli_fetch_array($result)){
        $name = $row['Name'];
        $rollno = $row['roll_no'];
        $subject = $row['subject'];
        $fname = $row['plagarised_from'];
        $frollno = $row['plagarised_from_rollno'];
        echo "<tr>
            <td>".$rollno."</td>
            <td>".$name."</td>
            <td>".$subject."</td>
            <td><span class='label label-danger'>Copied</span></td>
           <td>Copied From ".$fname."(".$frollno.")</td>
       </tr> ";
      }
  }
  else{
    echo "<h3>No Assignments submitted</h3>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Plagarism Check</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
  <link rel="stylesheet" href="Stylesheet3">
</head>

<body>
<div class="box" style="margin-left:10px;margin-right:10px;">
            <div class="box-header">
              <h3 class="box-title">Plagiarism Results</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                <?php

                content();

                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
</div>
</body>
