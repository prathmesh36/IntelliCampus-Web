<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {

    $user_id=$_SESSION['user_id'];
    $onlq="SELECT id,time FROM online WHERE id='$user_id'";
    $onlq_run=mysqli_query($con,$onlq);
    $onlq_rows=mysqli_fetch_assoc($onlq_run);
    $onlq_count=mysqli_num_rows($onlq_run);
    date_default_timezone_set("Asia/Kolkata");
    $datetime=date("y/m/d H:i:s");
    $query="SELECT * FROM login WHERE id='".$user_id."'";
    $query_run=mysqli_query($con,$query);
    $rows=mysqli_fetch_assoc($query_run);
    $firstname=$rows["firstname"];
    $surname= $rows["surname"];   
    if($onlq_count==0)
    {
       $onliq="INSERT INTO online VALUES('$user_id','$firstname','$surname','$datetime')";
       $onliq_run=mysqli_query($con,$onliq);
    }else{
      $onluq="UPDATE online SET time='$datetime' WHERE id='$user_id'";
       $onluq_run=mysqli_query($con,$onluq);
    }
    $parad=date("y/m/d");
    $parad=1;
    $time=$onlq_rows['time'];
    $para=date("H:i:s");
    $para='00:05:00';
    $onld="DELETE FROM online WHERE TO_DAYS(DATEDIFF(SYSDATE(),time))>='$parad' || TIMEDIFF(SYSDATE(),time)>'$para' ";
    $onld_run=mysqli_query($con,$onld);
    $onld_count=mysqli_affected_rows($con);
  }
?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy;2017 <a href="#">Intelli Campus</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content active">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 data-toggle="collapse" href="#collapse1" class="control-sidebar-heading" >People Online &nbsp<i class="fa fa-angle-down"></i></h3>
        <ul id="collapse1" class="control-sidebar-menu">
        <?php
        $onlli="SELECT * FROM online";
      	$onlli_run=mysqli_query($con,$onlli);
        while($onlli_rows=mysqli_fetch_assoc($onlli_run))
      	{
        ?>
          <li>
            <a href="javascript:void(0)">
              <?php
                  if(file_exists('users/'.$onlli_rows["id"].'.jpg'))
                      {
                       echo'<img  style="float:left;" src="images/users/'.$onlli_rows['id'].'.jpg" class="img-circle" alt="Cinque Terre" width="35" height="35">';

                      }else
                      {
                         echo'<img  style="float:left;" src="images/users/default.jpg" class="img-circle" alt="Cinque Terre" width="35" height="35">';

                      }
              ?>

              <div class="menu-info" style="margin:2px 10px;float:left;">
                <h4 class="control-sidebar-subheading"><?php echo $onlli_rows['firstname'].' '.$onlli_rows['surname']; ?></h4>
                <p>&nbsp<i class="fa fa-circle text-success"></i> &nbsp Online</p>
              </div>
            </a>
          </li>
        <?php
        }
        ?>
        </ul>
        <!-- /.control-sidebar-menu -->


      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <ul id="collapse1" class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)" style="padding:1px 15px;">
                <div class="menu" >

                  <h4 class="control-sidebar-subheading" style="color: #3c8dbc"><i class="fa fa-file-picture-o fa-1g" style="color: #ffffff"></i>&nbsp Upload Profile Picture</h4>

                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)" style="padding:1px 15px;">

                <div class="menu">
                  <h4 class="control-sidebar-subheading" style="color: #3c8dbc"><i class="fa fa-gear fa-1g" style="color: #ffffff"></i>&nbsp Change Password</h4>

                </div>
              </a>
            </li>
          </ul>


        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->


<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

</body>
</html>
