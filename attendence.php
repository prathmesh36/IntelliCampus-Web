

<?php
   include'all.php';
?>
<!-- Content Wrapper. Contains page content -->
<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {
    $queryg="SELECT * FROM attendence WHERE id=".$user_id;
    $queryg_run=mysqli_query($con,$queryg);
    $atten=mysqli_fetch_assoc($queryg_run);
?>

<div class="content-wrapper"
  <!-- Content Header (Page header) -->
  <section class="content-header" style="border-bottom:solid 1px silver;padding-top:10px;padding-bottom:10px;margin:10px;">
    <h1>
        <?php echo $rows["firstname"]." ".$rows["surname"]."/'s Attendence"; ?>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content" style="overflow:scroll;">
    <div class="col-md-12">
              <!-- /.info-box -->
              <div class="info-box bg-green">
                <span class="info-box-icon">
                <?php
                $now = time(); // or your date as well
                $your_date = strtotime("2017-09-01");
                $datediff = $now - $your_date;
                echo floor($atten["sub1"]/floor($datediff / (60 * 60 * 24))*100)."%";
                ?>
              </span>

                <div class="info-box-content">
                  <span class="info-box-text">Subject 1</span>
                  <span class="info-box-number"><?php echo $atten["sub1"]; ?> out of <?php

                  echo floor($datediff / (60 * 60 * 24));
                   ?></span>

                  <div class="progress">
                    <div class="progress-bar" style="width: <?php echo ($atten["sub1"]/floor($datediff / (60 * 60 * 24))*100)."%";?>"></div>
                  </div>
                  <span class="progress-description">
                        <?php echo floor($atten["sub1"]/floor($datediff / (60 * 60 * 24))*100)."%";?> Attendence
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <div class="info-box bg-green">
                <span class="info-box-icon">
                  <?php
                  $now = time(); // or your date as well
                  $your_date = strtotime("2017-09-01");
                  $datediff = $now - $your_date;
                  echo floor($atten["sub2"]/floor($datediff / (60 * 60 * 24))*100)."%";
                  ?>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text">Subject 2</span>
                  <span class="info-box-number"><?php echo $atten["sub2"]; ?> out of <?php

                  echo floor($datediff / (60 * 60 * 24));
                   ?></span>

                  <div class="progress">
                    <div class="progress-bar" style="width: <?php echo ($atten["sub2"]/floor($datediff / (60 * 60 * 24))*100)."%";?>"></div>
                  </div>
                  <span class="progress-description">
                         <?php echo floor($atten["sub2"]/floor($datediff / (60 * 60 * 24))*100)."%";?> Attendece
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <div class="info-box bg-green">
                <span class="info-box-icon">
                  <?php
                  $now = time(); // or your date as well
                  $your_date = strtotime("2017-09-01");
                  $datediff = $now - $your_date;
                  echo floor($atten["sub3"]/floor($datediff / (60 * 60 * 24))*100)."%";
                  ?>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text">Subject 3</span>
                  <span class="info-box-number"><?php echo $atten["sub3"]; ?> out of <?php

                  echo floor($datediff / (60 * 60 * 24));
                   ?></span>

                  <div class="progress">
                    <div class="progress-bar" style="width: <?php echo ($atten["sub3"]/floor($datediff / (60 * 60 * 24))*100)."%";?>"></div>
                  </div>
                  <span class="progress-description">
                        <?php echo floor($atten["sub3"]/floor($datediff / (60 * 60 * 24))*100)."%";?> Attendence
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
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
   <link rel="stylesheet" type="text/css" href="style.css">
   <script type="text/javascript" src="./main.js"></script>
   <script type="text/javascript" src="./llqrcode.js"></script>
   <script type="text/javascript">load();</script>
   <script src="./jquery-1.11.2.min.js"></script>
<?php
   include'footer.php';

?>
