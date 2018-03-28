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
    $dquery="DELETE FROM livestream WHERE hr<CURRENT_TIMESTAMP";
    $dquery_run=mysqli_query($con,$dquery);
    $queryl="SELECT * FROM livestream";
    $queryl_run=mysqli_query($con,$queryl);
?>

<div class="content-wrapper"
  <!-- Content Header (Page header) -->
  <section class="content-header" style="border-bottom:solid 1px silver;padding-top:10px;padding-bottom:10px;margin:10px;">
    <h1>
      Live Stream Lectures
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary" style="border-top-color:#d2d6de;">
            <div class="box-header with-border bg-title" style="background:#dd4b39;">
              <h3 class="box-title" style="color:white;">Active Live streaming of Lectures</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php
                if(mysqli_num_rows($queryl_run)==0)
                {
                ?>
                <li class="item">
                  <div>
                    <div class="product-info" style="margin-left:10px;">
                      <a href="live.php" class="product-title" style="font-size:16px;">No Live Streams at this moment
                      </a>
                          <span class="product-description">
                            Visit us Later or Contact ur Faculty
                          </span>
                    </div>
                  </div>
                </li>
                <?php
                }
                while($rowsl=mysqli_fetch_assoc($queryl_run))
                {
                ?>
                <li class="item">
                  <div>
                    <div class="product-info" style="margin-left:10px;">
                      <a href="livestream.php?id=<?php echo $rowsl["id"];?>" class="product-title" style="font-size:16px;"><?php echo $rowsl["sub"]?><span class="label pull-right " style="color:#999999;"><?php echo $rowsl["sdate"]?></span>
                      </a>
                          <span class="product-description">
                            <?php echo 'Live stream of Subject '.$rowsl["sub"].' started on '.$rowsl["sdate"];?>
                          </span>
                    </div>
                  </div>
                  <br>
                  <span style="margin-top:3px;font-size:12px;margin-left:10px;" class="label label-success pull-left">20 </span> <b style="margin-top:3px;">&nbsp; Views</b>
                  <span style="margin-top:3px;font-size:12px;margin-left:15px" class="label label-danger ">2</span><b style="margin-top:3px;">&nbsp; Replies</b>
                </li>
                <?php
              }
                ?>
                                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              Students Network Live Stream Portal
            </div>
            <!-- /.box-footer -->
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
