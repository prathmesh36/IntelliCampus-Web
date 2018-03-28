<?php
   include 'all.php';
   if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
   {
?>
<div class="content-wrapper">

    <div class="col-md-12" style="padding-left:10px;padding-right:10px;">
      <div class="box boxzol" style="">
        <div class="box-header with-border bg-title2" style="">
          <h2 class="box-title" style="font-size:22px;color:Black;">Assignment Submission</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <?php
           include 'plag/assignment_submission.php';
           ?>
         </div>
        </div>
        </div>
      </div>
 </div>
<?php
    }else {
      echo '<script type="text/javascript">';
      echo 'window.location.href="login.php";';
      echo '</script>';
    }

   include 'footer.php';
?>
