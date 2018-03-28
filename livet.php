<?php
   include'all.php';
?>
<!-- Content Wrapper. Contains page content -->
<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) )
  {
    if($_SESSION['user_id']==5)
    {
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
      $user_id=$_GET['id'];
      $query="SELECT * FROM login WHERE id='".$user_id."'";
      $query_run=mysqli_query($con,$query);
      $rows=mysqli_fetch_assoc($query_run);
    }
?>

<div class="content-wrapper"
  <!-- Content Header (Page header) -->
  <section class="content-header" style="border-bottom:solid 1px silver;padding-top:10px;padding-bottom:10px;margin:10px;">
    <h1>
      Live Stream Lectures Admin Page
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Start a Lecture Streaming</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="livet.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputsub">Subject Name</label>
                  <input type="text" class="form-control" id="exampleInputsub" name="sub" placeholder="Enter Subject">
                </div>
                <div class="form-group">
                                  <label>Select Department</label>
                                  <select class="form-control" name="dept">
                                    <option>IT</option>
                                    <option>CO</option>
                                    <option>ME</option>
                                    <option>EC</option>
                                    <option>EX</option>
                                  </select>
                </div>
                <div class="form-group">
                                  <label>Select Hrs</label>
                                  <select class="form-control" name="hr">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
  </section>
</div>

<?php
    if(isset($_POST["sub"]) && isset($_POST["hr"]) && isset($_POST["dept"]))
    {
      $sub=$_POST["sub"];
      $hr=$_POST["hr"];
      $dept=$_POST["dept"];
      if(!empty($sub) && !empty($hr) && !empty($dept))
      {
        date_default_timezone_set("Asia/Kolkata");
        if($dept=="IT")
        {
          $link="V9wHOCvD";
        }
        $edate = date("Y-m-d H:i:s", strtotime('+'.$hr.' hours'));
        $query="INSERT INTO livestream VALUES('','".$sub."','".$dept."','".$link."','".date("Y/m/d h:i:s")."','".$edate."','".$user_id."','".$rows["firstname"]."','".$rows["surname"]."')";
        if($queryrun=mysqli_query($con,$query))
        {
          echo '<script type="text/javascript">';
          echo 'window.location.href="live.php";';
          echo '</script>';
        }

      }else {
      }
    }
    else {

    }
    }
    else {
      echo '<script type="text/javascript">';
      echo 'window.location.href="live.php";';
      echo '</script>';
    }
    }else
    {
      echo '<script type="text/javascript">';
      echo 'window.location.href="login.php";';
      echo '</script>';
    }
   ?>
<?php
   include'footer.php';

?>
