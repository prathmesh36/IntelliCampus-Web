<?php
   include'all.php';
?>
<!-- Content Wrapper. Contains page content -->
<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
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
        QR Attendence System
    </h1>
  </section>
  <!-- Main content -->
  <section class="content" style="overflow:scroll;">
    <div class="col-md-6 col-md-offset-2">
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <span class="username" style="margin-left:0px;"><a href="#">Scan the QR Code</a></span>
                    <span class="description" style="margin-left:0px;">Shared publicly by Student Network's QR Team</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                      <i class="fa fa-circle-o"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <center>
                    <div style="display:none" id="result"></div>
                    	<div class="selector" id="webcamimg" onclick="setwebcam()" align="left" ></div>
                    		<div class="selector" id="qrimg" onclick="setimg()" align="right" ></div>
                    			<center id="mainbody"><div id="outdiv"></div></center>
                    				<canvas id="qr-canvas" width="800" height="600" style="display:none;"></canvas>
                  <hr>
                  <p> Student Network QR Attendence System</p>
                  </center>
                </div>
                <!-- /.box-body -->

              </div>
              <!-- /.box -->
            </div>
  </section>
</div>

<?php

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

<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="./main.js"></script>
<script type="text/javascript" src="./llqrcode.js"></script>


<script type="text/javascript">load();</script>
<script src="./jquery-1.11.2.min.js"></script>
