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
<?php
$queryl="SELECT * FROM livestream WHERE id=".$_GET["id"];
$queryl_run=mysqli_query($con,$queryl);
$rowsl=mysqli_fetch_assoc($queryl_run);
?>
<div class="content-wrapper"
  <!-- Content Header (Page header) -->
  <section class="content-header" style="border-bottom:solid 1px silver;padding-top:10px;padding-bottom:10px;margin:10px;">
    <h1>
        <?php echo "Live stream of Subject ".$rowsl["sub"]." by Prof. ".$rowsl['tfname']." ".$rowsl['tlname'] ;?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content" style="overflow:scroll;">
    <div class="col-md-6 col-md-offset-2">
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <img class="img-circle" src="users/<?php echo $rowsl["tid"]?>.jpg" alt="User Image">
                    <span class="username"><a href="#">Prof. <?echo $rowsl["tfname"]." ".$rowsl["tlname"];?></a></span>
                    <span class="description">Shared publicly - <?php echo $rowsl["sdate"]?></span>
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

                  <center><iframe src="http://d3kedutmscl43l.cloudfront.net/iframe.htm?v=4xhUrEY&w=550&h=338" style="margin-left:-35px;padding-left:10px;border-width:0;width:550px;height:338px" scrolling="no" allowFullScreen></iframe></center>
                  <p><?php echo 'Live stream of Subject '.$rowsl["sub"].' started on '.$rowsl["sdate"];?></p>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                  <span class="pull-right text-muted">127 likes - 3 comments</span>
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->

                <!-- /.box-footer -->
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
