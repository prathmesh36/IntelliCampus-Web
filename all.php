<?php
include 'assets/backend/connect.php';
include 'assets/backend/core.php';
require 'assets/backend/data.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Intelli Campus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!--two add-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

</head>


<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ITC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Intelli</b> Campus</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <?php
      if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
      {
      ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <?php
            $messt="SELECT messtime FROM login WHERE id='$user_id'";
         	  $messtrun=mysqli_query($con,$messt);
         	  $messtrows=mysqli_fetch_assoc($messtrun);
         	  $messtime=$messtrows['messtime'];
            $noofmess="SELECT DISTINCT sen_id FROM message WHERE date>'$messtime' AND rec_id='$user_id'";
         	  $noofmess_run=mysqli_query($con,$noofmess);
         	  $noofmess_count=mysqli_num_rows($noofmess_run);
          ?>
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success"><?php echo $noofmess_count;?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have <?php echo $noofmess_count; ?> messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                  <?php
                    if($noofmess_count!=0)
                    {
                      while($senders=mysqli_fetch_assoc($noofmess_run))
                      {
                      $sender=$senders["sen_id"];
                   	  $numq="SELECT sen_id, id, mess , fname_sen, sname_sen FROM message WHERE date>'$messtime' AND rec_id='$user_id' AND sen_id='$sender' ORDER BY id DESC";
                   	  $numq_run=mysqli_query($con,$numq);
                   	  $numq_count=mysqli_num_rows($numq_run);
                      $messrows=mysqli_fetch_assoc($numq_run);
                  ?>
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <?php
                          			if(file_exists('users/'.$messrows["sen_id"].'.jpg'))
                          	        {
                          	         echo'<img src="users/'.$messrows["sen_id"].'.jpg"  class="img-circle" alt="User Image">';

                          	        }else
                          	        {
                                	     echo'<img src="users/default.jpg" class="img-circle" alt="User Image">';

                                    }
                          	?>
                            <!--<img src="images/users/<?php //echo $messrows["sen_id"]; ?>.jpg" class="img-circle" alt="User Image">-->
                          </div>
                          <h4>
                            <?php echo $messrows["fname_sen"].' '.$messrows["sname_sen"].' ('.$numq_count.')'; ?>
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p><?php echo $messrows["mess"]; ?></p>
                        </a>
                      </li>
                      <!-- end message -->
                  <?php
                      }
                    }else {
                  ?>
                  <li><!-- start message -->
                    <a href="#">
                      <h4> No New Message
                      </h4>
                    </a>
                  </li>
                  <?php
                    }
                  ?>
                </ul>
              </li>
              <li class="footer"><a href="chat.php">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php
              if(file_exists('images/users/'.$user_id.'.jpg'))
          	  {
                echo 'images/users/'.$user_id.'.jpg';
              }
              else
              {
                echo 'images/users/default.jpg';
              }
              ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
              <?php
                echo $rows['firstname'].' '.$rows['surname'];
              ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php
                if(file_exists('images/users/'.$user_id.'.jpg'))
            	  {
                  echo 'images/users/'.$user_id.'.jpg';
                }
                else
                {
                  echo 'images/users/default.jpg';
                }
                ?>" class="img-circle" alt="User Image">

                <p>
                  <?php
                    echo $rows['firstname'].' '.$rows['surname'];
                  ?>
                  <small><?php echo 'Member Since '.date("M Y",strtotime($rows['doj']));?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#" style="font-weight:bold;">Followers</a>
                    <?php
                   		$follow=$rows['follow'];
                   		$x= explode(',',$follow);
                   		$a=0;
                   		foreach($x as $x_a)
                   		{
                   		 $a++;
                   		}
                   		$b=$a-1;
                      echo '<br>'.$b.'<br><a href="folllist.php?id='.$user_id.'">See all</a><br>';
                 		?>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#"  style="font-weight:bold;">Following</a>
                    <?php
                  	 $query="SELECT follow FROM login";
                  		$query_run=mysqli_query($con,$query);
                  		$a=0;
                  		while($query_array=mysqli_fetch_assoc($query_run))
                  		{
                  		$follow=$query_array['follow'];
                  		$x= explode(',',$follow);

                  		foreach($x as $x_a)
                  		{
                  		if($x_a==$user_id)
                  			{
                  			 $a++;
                  			}
                  		}
                  		}
                  		$b=$a;
                      echo '<br>'.$b.'<br><a href="followlist2.php?id='.$user_id.'">See all</a><br>';
                      ?>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat" style="background-color:green;color:white;">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="login_reg_scripts/logout.php" class="btn btn-default btn-flat " style="background-color:#C70039;color:white;">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
      <?php }
      else {
      ?>
      <div  class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="login.php">
              <span>Login</span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="login.php">
              <span>Register</span>
            </a>
          </li>
        </ul>
      <?php
      }
      ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php
      if(isset($_SESSION['user_id']))
      {
      ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php
          if(file_exists('images/users/'.$user_id.'.jpg'))
      	  {
            echo 'images/users/'.$user_id.'.jpg';
          }
          else
          {
            echo 'images/users/default.jpg';
          }
          ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $rows['firstname'].' '.$rows['surname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php
      }
      ?>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="names" list="namelist" id="names" class="form-control" placeholder="Search..." onkeyup="searchnames();" oninput="linking();">
          <datalist id="namelist"></datalist>
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat" style="position:relative;padding:0 25px"><span style="position:absolute;top:10px;left:20px;" class="glyphicon glyphicon-search"></span>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      <li class="header">What we have</li>
        <li><a href="profile.php"><i class="fa fa-user"></i> <span>Your Profile</span></a></li>
        <li><a href="chat.php"><i class="fa fa-commenting-o"></i> <span>Chat with Online Counsellor</span></a></li>
        <li><a href="live.php"><i class="fa fa-calendar-o"></i> <span>Live Lectures</span></a></li>
        <?php       if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ if($_SESSION['user_id']==5){ echo '<li><a href="livet.php"><i class="fa fa-calendar"></i> <span>Start a Live Lecture Stream</span></a></li>';}}?>
        <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ if($_SESSION['user_id']==5){ echo '<li><a href="plagdet.php"><i class="fa fa-book"></i> <span>Plagarism Check Status</span></a></li>';}}?>
        <li><a href="onl_vid.php"><i class="fa fa-sticky-note-o"></i> <span>Online Course Videos</span></a></li>
        <li><a href="indexqr.php"><i class="fa fa-camera-retro"></i> <span>Attendence QR Scan</span></a></li>
        <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ if($_SESSION['user_id']==5){ echo '<li><a href="qrgen.php"><i class="fa fa-book"></i> <span>QR Generator</span></a></li>';}}?>
        <li><a href="attendence.php"><i class="fa fa-bar-chart"></i> <span>Check your Attendence</span></a></li>
        <li><a href="main_pro.php"><i class="fa fa-shopping-cart"></i> <span>Campus E-Store</span></a></li>
        <li><a href="main_forum.php"><i class="fa fa-foursquare"></i> <span>Teacher-Student Forum</span></a></li>
        <li><a href="books.php"><i class="fa fa-book"></i> <span>Ebooks</span></a></li>
        <li><a href="assign.php"><i class="fa fa-book"></i> <span>Assignment Submission</span></a></li>
        <li><a href="qrnav.php"><i class="fa fa-book"></i> <span>QR Navigation</span></a></li>
        <li class="header">About Us</li>
        <li><a href=""><i class="fa fa-phone"></i> <span>Contact Us</span></a></li>
        <li><a href="">&nbsp<i class="fa fa-info "></i> <span>About ITC</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
		<script type="text/javascript">
        function linking()
        {
          var val = document.getElementById("names").value;
          if(val.substring(0,1)=="|")
          {
            window.location.href="find.php?id="+val.substring(1,val.length-1);
          }
        }

    		function searchnames(){
          var list = document.getElementById('namelist');
          while (list.firstChild) {
              list.removeChild(list.firstChild);
          }
          var xmlhttp=new XMLHttpRequest();
          var sinput=document.getElementById('names');
          var name= sinput.value;
          xmlhttp.open("GET","searchajax.php?name="+name,false);
          xmlhttp.send(null);
          var udata=xmlhttp.responseText;
          var udataarr = udata.split("~");
          for(i=0;i<udataarr.length;i++)
          {
          var option = document.createElement('option');
          // Set the value using the item in the JSON array.
          option.value = "|"+udataarr[i]+"|";


          // Add the <option> element to the <datalist>.
          list.appendChild(option);
          }
        }
    </script>
