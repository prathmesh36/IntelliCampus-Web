<?php
   include'all.php';
   if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
   {
?>
<head>
<style>
@import url(http://fonts.googleapis.com/css?family=Raleway:500,600,700,800,400);

.element::-webkit-scrollbar { width: 0 !important }
.element { overflow: -moz-scrollbars-none; }
.element { -ms-overflow-style: none; }

.element, .outer-container {
 width: 317px;
 height: 377px;
}
 
.outer-container {
 border: 8px solid purple;
 position: relative;
 overflow: hidden;
}
 
.inner-container {
 position: absolute;
 left: 0;
 overflow-x: hidden;
 overflow-y: scroll;
}
 
.inner-container::-webkit-scrollbar {
 display: none;
}

body {
  background-image: url("http://www.jamiecoulter.co.uk/dev/codepen/blurred_bg.jpg");
  font-family: 'Raleway', sans-serif;
  background-size: 100% 100%;
  height: 100vh;
}
body .title {
  width: 750px;
  text-align: center;
  height: 500px;
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  color: white;
  top: 0;
  bottom: 0;
}
body .title_inner {
  float: right;
  width: 260px;
  text-align: left;
  position: relative;
  top: 160px;
}
body .title_inner h1 {
  margin: 0;
  text-transform: uppercase;
}
body .title_inner h2 {
  margin: 0;
  font-weight: 500;
  font-size: 14px;
  line-height: 24px;
  margin-top: 15px;
}
body .container {
  width: 800px;
  width: 750px;
  text-align: center;
  height: 500px;
  position: absolute;
  left: -80px;
  right: 0;
  margin: auto;
  top: -500px;
  bottom: 0;
}
body .container_ui {
  width: 350px;
  height:486px;
  z-index:6;
  background: white;
  -webkit-transition-property: opacity, top;
  transition-property: opacity, top;
  -webkit-transition-duration: 0.4s;
          transition-duration: 0.4s;
  -webkit-animation: pop .5s forwards;
          animation: pop .5s forwards;
}
body .container_ui__heading {
  height: 60px;
  width: 100%;
  background: #333658;
}
body .container_ui__heading .header_icon {
  float: left;
  text-align: left;
}
body .container_ui__heading .header_icon img {
  margin: 17px 20px 20px 20px;
  cursor: pointer;
}
body .container_ui__heading h1 {
  color: #aeb1d8;
  text-transform: uppercase;
  font-weight: 700;
  height: 10px;
  margin: 0;
  font-size: 12px;
  float: left;
  width: 33%;
  letter-spacing: 1px;
  line-height: 64px;
}
body .container_ui__heading .header_icon {
  float: left;
  width: 33%;
  height: 40px;
}
body .container_ui__heading .menu_icon {
  width: 33%;
  float: left;
  text-align: right;
  position: relative;
  top: 25px;
  right: 20px;
  cursor: pointer;
}
body .container_ui__heading .menu_icon div {
  width: 21px;
  height: 2px;
  float: right;
  display: block;
  margin-bottom: 3px;
  border-radius: 1px;
  clear: both;
  background: rgba(0, 0, 0, 0.26);
}

body .container_ui__expand {
  width: 350px;
  height: 486px;
  position: absolute;
  top: 0;
  -webkit-transition-delay: .2s;
          transition-delay: .2s;
  -webkit-transition-property: left, opacity;
  transition-property: left, opacity;
  opacity: 1;
  -webkit-transition-duration: .4s;
          transition-duration: .4s;
  left: 0;
  z-index: -1;
  display:none;
  background: white;
}

body .container_ui input[type="checkbox"] {
  display: none;
}
body .container_ui label:hover > .container_ui__item .face .color_bar {
  width: 81px;
  -webkit-transition-property: width;
  transition-property: width;
  -webkit-transition-duration: .4s;
          transition-duration: .4s;
  -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
body .container_ui label:hover > .container_ui__item .face .color_bar span {
  opacity: 1;
  -webkit-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-duration: .2s;
          transition-duration: .2s;
  -webkit-transition-timing-function: linear;
  -webkit-transition-delay: .3s;
          transition-delay: .3s;
}
body .container_ui label:hover > .container_ui__item .face .color_bar p {
  opacity: 0;
}
body .container_ui input[type="checkbox"]:checked + label > .container_ui__expand {
  -webkit-transition-property: left, opacity;
  transition-property: left, opacity;
  -webkit-transition-duration: .4s;
          transition-duration: .4s;
  left: 380px;
  z-index: 3;
  display:block;
  opacity: 1;
  -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
  overflow:scroll !important;
}

@media only screen and (max-width:992px)
{
  body .container {
    width: 800px;
    width: 750px;
    text-align: center;
    height: 500px;
    position: absolute;
    left: 0px;
    right: 0;
    top: -500px;
    left: 21%;
  }



  body .container_ui input[type="checkbox"]:checked + label > .container_ui__expand {
    -webkit-transition-property: left, opacity;
    transition-property: left, opacity;
    -webkit-transition-duration: .4s;
            transition-duration: .4s;
    left: 0px;
    z-index: 3;
    opacity: 1;
    -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    overflow:scroll !important;
  }
}

@media only screen and (max-width:650px)
{
  body .container {
    width: 400px !important;
    width: 350px !important;
    text-align: center;
    height: 500px;
    position: absolute;
    left: 0px;
    right: 0;
    margin: auto;
    top: -500px;
    bottom: 0;
    padding-left:0px;

  }
   body .title{
     width:350px !important;
     padding-left:0px !important;
   }

   .message-box1{
     margin-top:30px;
     margin:
     padding:0 ;
   }

   .content{
     padding-left:5px
   }
}
body .container_ui .container_ui__expand label {
  width: 10px;
  position: absolute;
  right: 10px;
  top: 20px;
  font-size: 12px;
  font-weight: 700;
  color: #a6a6a6;
}
body .container_ui .container_ui__expand label:hover {
  color: #444444;
}
body .container_ui input[type="checkbox"]:checked + label > .container_ui__expand label {
  pointer-events: auto;
}
body .container_ui input[type="checkbox"]:checked + label > .container_ui__expand .body .user .face img {
  -webkit-animation: pop .5s .5s forwards;
          animation: pop .5s .5s forwards;
}
body .container_ui input[type="checkbox"]:checked + label > .container_ui__expand .body .user .details {
  -webkit-animation: popup .5s .5s forwards;
          animation: popup .5s .5s forwards;
}
body .container_ui input[type="checkbox"]:checked + label > .container_ui__expand .body .content {
  -webkit-animation: popup .5s .7s forwards;
          animation: popup .5s .7s forwards;
}
body .container_ui input[type="checkbox"]:not(:checked) + label > .container_ui__expand .body .user .face img {
  -webkit-animation: poprev .5s .5s forwards;
          animation: poprev .5s .5s forwards;
  -webkit-transform: scale(0);
          transform: scale(0);
  -webkit-transition-property: -webkit-transform;
  transition-property: -webkit-transform;
  transition-property: transform;
  transition-property: transform, -webkit-transform;
}
body .container_ui input[type="checkbox"]:checked + label > .container_ui__item .face .color_bar {
  right: auto;
  width: 350px;
  height: 71px;
}
body .container_ui input[type="checkbox"]:checked + label > .container_ui__item .face .color_bar p {
  opacity: 1;
  -webkit-transition-duration: .3s;
          transition-duration: .3s;
  -webkit-transition-delay: 0.4s;
          transition-delay: 0.4s;
  -webkit-transition-property: opacity;
  transition-property: opacity;
}
body .container_ui input[type="checkbox"]:checked + label > .container_ui__item .face .color_bar span {
  display: none;
}
body .container_ui label {
  cursor: pointer;
  display: block;
  max-height: 71px;
  float: left;
  width: 100%;
  overflow: hidden;
}
body .container_ui label:hover > .container_ui__item {
  background-color: #EAEAEA !important;
}
body .container_ui label .container_ui__item {
  pointer-events: none;
}
body .container_ui__item {
  width: 100%;
  float: left;
  height: 74px;
  text-align: left;
  color: black;
  color: white;
  background: #F5F5F5;
  cursor: pointer;
}
body .container_ui__item h2,
body .container_ui__item h3,
body .container_ui__item h4 {
  color: black;
}
body .container_ui__item h2 {
  font-size: 11px;
  display: inline-block;
  color: #515151;
  text-transform: uppercase;
  font-weight: 800;
  margin: 10px 0px 0px 0px;
  padding-top: 0px;
}
body .container_ui__item h3 {
  font-size: 8px;
  font-weight: 800;
  margin: 5px 0px 10px 0px;
  text-transform: uppercase;
  color: #B2B2B2;
}
body .container_ui__item h4 {
  font-size: 10px;
  font-weight: 600;
  margin: 0;
  color: #919191;
}
body .container_ui__item .face {
  float: left;
  clear: left;
  margin: 0;
  margin-right: 10px;
  position: relative;
}
body .container_ui__item .face img {
  height: 81px;
  /* margin: 10px; */
  /* border-radius: 5px; */
}
body .container_ui__item .face .color_bar {
  float: right;
  width: 6px;
  background: #56b699;
  position: absolute;
  right: 0;
  text-align: center;
  height: 71px;
  top: 0;
  z-index: 1;
}
body .container_ui__item .face .color_bar p {
  opacity: 0;
  margin-top: 26px;
}
body .container_ui__item .face .color_bar span {
  opacity: 0;
  font-size: 12px;
  position: relative;
  top: -56px;
}
body .container_ui .dot {
  width: 6px;
  height: 6px;
  background: #cdcdcd;
  border-radius: 100%;
  display: inline-block;
  position: relative;
  top: -1px;
  z-index: -0;
  left: 3px;
}
body .container_ui .active {
  background: #6cbe63;
}


body .container_ui__expand .body .content {
  text-align: left;
  position: relative;
  top: 10px;
  opacity: 0;
}
body .container_ui__expand .body .content p {
  text-align: justify;
  font-size: 10px;
  line-height: 20px;
  padding: 25px;
  color: #9b9b9b;
  font-weight: 500;
}
body .container_ui__expand .body .content p b {
  color: #444444;
}
body .container_ui__expand .body .content span {
  display: block;
  padding: 0px 25px;
  font-weight: 800;
  position: relative;
  top: -10px;
  font-size: 10px;
  color: #7d7d7d;
}
body .container_ui__expand .body .content textarea {
  margin: 0px 25px;
  width: 295px;
  resize: none;
  border: 1px solid #e0e0e0;
  height: 60px;
  border-radius: 3px;
}
body .container_ui__expand .body .user {
  border-bottom: 1px solid #ececec;
  height: 65px;
}
body .container_ui__expand .body .user .details {
  opacity: 0;
  top: 10px;
  position: relative;
  float: left;
  width: 240px;
  text-align: left;
}
body .container_ui__expand .body .user .details h2 {
  font-size: 14px;
  display: inline-block;
  color: #515151;
  text-transform: uppercase;
  font-weight: 800;
  margin: 13px 0px 0px 0px;
  padding-top: 0px;
}
body .container_ui__expand .body .user .details h3 {
  font-size: 12px;
  font-weight: 300;
  margin: 5px 0px 10px 0px;
  text-transform: uppercase;
  color: #B2B2B2;
}
body .container_ui__expand .body .user .details h4 {
  font-size: 10px;
  font-weight: 600;
  margin: 0;
  color: #919191;
}
body .container_ui__expand .body .user .face {
  float: left;
}
body .container_ui__expand .body .user .face img {
  width: 40px;
  -webkit-transform: scale(0);
          transform: scale(0);
  border-radius: 100%;
  border: 2px solid white;
  margin: 10px 25px;
}
body .container_ui__expand .heading {
  height: 10px;
  width: 100%;
  background: #56b699;
}
body .container_ui__expand .heading_head h1 {
  color: #aeb1d8;
  text-transform: uppercase;
  font-weight: 700;
  height: 10px;
  margin: 0;
  font-size: 12px;
  float: left;
  width: 100%;
  letter-spacing: 1px;
  line-height: 64px;
}

.two {
  background: #5674B6 !important;
}

.three {
  background: #D05E5E !important;
}

.four {
  background: #ACD35D !important;
}

.five {
  background: #EA9739 !important;
}

.six {
  background: #B6568D !important;
}

body .container_ui input[type="checkbox"]:checked + label > .container_ui__expand a {
  pointer-events: auto;
}

/* Let's do some animations! */
@-webkit-keyframes pop {
  0% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes pop {
  0% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@-webkit-keyframes poprev {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
}
@keyframes poprev {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
}
@-webkit-keyframes popup {
  from {
    top: 10px;
    opacity: 0;
  }
  to {
    top: 0px;
    opacity: 1;
  }
}
@keyframes popup {
  from {
    top: 10px;
    opacity: 0;
  }
  to {
    top: 0px;
    opacity: 1;
  }
}

.scrollit::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 7px;
}
.scrollit::-webkit-scrollbar-thumb {
    border-radius: 4px;
    background-color: rgba(0,0,0,.5);
    -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5);
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"
  <!-- Content Header (Page header) -->
  <section class="content-header" style="border-bottom:solid 1px silver;padding-top:10px;padding-bottom:10px;margin:10px;">
    <h1>
      See your conversations here!
    </h1>
  </section>
  <!-- Main content -->
  <section class="content"  style="overflow:scroll;">

      <div class="error-page">
      <div class='title' style="position:relative;">
        <div class='title_inner'>
          <h1>

          </h1>
          <h2>
          </h2>
        </div>
      </div>
      <div class='container' style="position:relative;">
        <div class='container_ui'>
          <div class='container_ui__heading'>
            <div class='header_icon'>
              <!--<img src='http://www.jamiecoulter.co.uk/dev/codepen/mail.pn'>-->
            </div>
            <h1>
              inbox
            </h1>
            <div class='menu_icon'>
              <div class='div'></div>
              <div class='div'></div>
              <div class='div'></div>
            </div>
          </div>


          <?php
          $allq="SELECT id FROM message";
          $allq_run=mysqli_query($con,$allq);
          $allq_count=mysqli_num_rows($allq_run);
          $sidq="SELECT sen_id FROM message WHERE rec_id='".mysqli_real_escape_string($con,$user_id)."' ";
          $sidqrun=mysqli_query($con,$sidq);
          $i=0;
          $a=array();
          while($sidqrows=mysqli_fetch_array($sidqrun))
          {
          $a[$i]=0;
          $sendlist[$i]=$sidqrows['sen_id'];
          $i++;
          }
          for($j=0;$j<$allq_count;$j++)
          {
          	$alone[$j]=0;
          }
          $sql2="SELECT sen_id,fname_sen,sname_sen,rec_id FROM message WHERE rec_id='".mysqli_real_escape_string($con,$user_id)."' OR sen_id='".mysqli_real_escape_string($con,$user_id)."' ORDER BY time DESC";
           $result2=mysqli_query($con,$sql2);
           $nomess=mysqli_num_rows($result2);
           //echo '<script>alert('.$nomess.');</script>';
          if($nomess==0)
          {
          ?>
          <!--<td width="77%" class="for" ><table style="margin-left:10px;border:1px solid silver;padding:5px;width:300px;position:relative;left:0px;top:4px;background:white;"><tr><td width="77%" class="for" style="position:relative;left:0px;"> <b style='font-family:arial narrow;font-size:30px;color:silver;' >No Users</b> &nbsp </tr></td></table></td>-->
          <input id='message-0' type='checkbox'>
          <label for='message-0' href='#move'>
          <div class='container_ui__item'>
            <div class='face'>
              <img src='https://s3.amazonaws.com/uifaces/faces/twitter/rem/128.jpg'>
              <div class='color_bar one'>
                <p>Now Reading</p>
                <span>Read</span>
              </div>
            </div>
            <h2>
              No User
            </h2>
            <div class='dot active'></div>
            <h3>subj: thanks, you are amazing</h3>
            <h4>Your generous donation saved 3 million puppies...</h4>
          </div>
          <div class='container_ui__expand' id='close'>
          </div>
        </label>
          <?php
          }
          $i=0;
           	  $messt="SELECT messtime FROM login WHERE id='$user_id'";
          	  $messtrun=mysqli_query($con,$messt);
          	  $messtrows=mysqli_fetch_assoc($messtrun);
          	  $messtime=$messtrows['messtime'];
          $z=1;
          while($rows=mysqli_fetch_array($result2))
          {
          $b=0;
          $c=0;
          $d=0;

          if($i==0 && $rows['sen_id']==$user_id)
          {
          	$b++;
          }

          $a[$i]=$rows['sen_id'];

          for($j=0;$j<$i;$j++)
          {
          	if($a[$j]==$rows['sen_id'])
          	{
          	$b++;
          	}
          }

          if($rows['rec_id']==$user_id)
          {
          	$c=1;
          }
          for($k=0;$k<count($sendlist);$k++)
          {
          	if(($sendlist[$k]==$rows['rec_id']))
          	{
          		$c++;
          	}
          }



          for($k=0;$k<count($alone);$k++)
          {
          	if($rows['rec_id']==$alone[$k])
          	{
          		$d=1;
          	}
          }


          if($c==0 && $d!=1)
          {
          	$alone[$i]=$rows['rec_id'];
          }

          if(($b==0) || ($c==0 && $d==0 ))
          {
           ?>
           <tr>
           <!--<td><table>
           <tr>-->
          <?php
           if($b==0){

          	$newm="SELECT date FROM message WHERE rec_id='".mysqli_real_escape_string($con,$user_id)."' AND sen_id='".mysqli_real_escape_string($con,$rows['sen_id'])."' AND date>'$messtime'";
          	$newm_run=mysqli_query($con,$newm);
          	$newm_count=mysqli_num_rows($newm_run);
          ?>
          <input id='message-<?php echo $z; ?>' type='checkbox'>
          <label for='message-<?php echo $z; ?>' href='#move'>
            <div class='container_ui__item'>
              <div class='face'>
                <img class="user-image" height="70" width="70" src='<?php
                $sen_id=$rows['sen_id'];
                if(file_exists('images/users/'.$sen_id.'.jpg'))
            	  {
                  echo 'images/users/'.$sen_id.'.jpg';
                }
                else
                {
                  echo 'images/users/default.jpg';
                }
                ?>'>
                <div class='color_bar one'>
                  <p>Now Reading</p>
                  <span>Read</span>
                </div>
              </div>
              <h2>
                <?php echo $rows['fname_sen'].' '.$rows['sname_sen']; ?>
                <?php if($newm_count!=0) { ?> <b style="background:red;border:1px solid black;border-radius:20px;color:white;"> <?php echo 'New';?> </b> <?php }?>
              </h2>
              <div class='dot active'></div>
              <h3>subj: thanks, you are amazing</h3>
              <h4>Your generous donation saved 3 million puppies...</h4>
            </div>
            <div class='container_ui__expand ' id='close' style="overflow:hidden!important;">
              <div class='heading'>
                <div class='heading_head'></div>
                <label for='message-<?php echo $z;?>'>
                  x
                </label>
              </div>
              <div class="body" style="overflow:hidden!important;z-index:1;">
                <div class='user'>
                  <div class='face'>
                    <img height="50" width="50" src='<?php
                    $sen_id=$rows['sen_id'];
                    if(file_exists('images/users/'.$sen_id.'.jpg'))
                	  {
                      echo 'images/users/'.$sen_id.'.jpg';
                    }
                    else
                    {
                      echo 'images/users/default.jpg';
                    }
                    ?>'>
                  </div>
                  <div class='details'>
                    <h2><?php echo $rows['fname_sen'].' '.$rows['sname_sen']; ?></h2>
                    <h3>Conversations</h3>
                  </div>
                </div>
                <iframe id="overi" src="iframemess.php?id=<?php echo $rows["sen_id"];?>" name="messframe" width="320px" height="380px" style="z-index:2;"></iframe>
              </div>
            </div>
          </label>
          <?php
          }else{
          $recq="SELECT firstname,surname FROM login WHERE id='".mysqli_real_escape_string($con,$rows['rec_id'])."'";
          $recq_run=mysqli_query($con,$recq);
          $recq_rows=mysqli_fetch_assoc($recq_run);
          ?>
          <input id='message-<?php echo $z; ?>' type='checkbox'>
          <label for='message-<?php echo $z; ?>' href='#move'>
            <div class='container_ui__item'>
              <div class='face'>
                <img class="user-image" height="70" width="70" src='<?php
                $rec_id=$rows['rec_id'];
                if(file_exists('images/users/'.$rec_id.'.jpg'))
                {
                  echo 'images/users/'.$rec_id.'.jpg';
                }
                else
                {
                  echo 'images/users/default.jpg';
                }
                ?>'>
                <div class='color_bar one'>
                  <p>Now Reading</p>
                  <span>Read</span>
                </div>
              </div>
              <h2>
                <?php echo $recq_rows['firstname'].' '.$recq_rows['surname']; ?>
                <?php if(@$newm_count!=0) { ?> <b style="background:red;border:1px solid black;border-radius:20px;color:white;"><?php echo 'New'; ?></b> <?php }?>
              </h2>
              <div class='dot active'></div>
              <h3>subj: thanks, you are amazing</h3>
              <h4>Your generous donation saved 3 million puppies...</h4>
            </div>
            <div class='container_ui__expand' id='close' style="overflow:hidden!important;">
              <div class='heading'>
                <div class='heading_head'></div>
                <label for='message-<?php echo $z;?>'>
                  x
                </label>
              </div>
              <div class="body" style="overflow:hidden!important;z-index:1;">
                <div class='user'>
                  <div class='face'>
                    <img height="50" width="50" src='<?php
                    $sen_id=$rows['rec_id'];
                    if(file_exists('images/users/'.$sen_id.'.jpg'))
                	  {
                      echo 'images/users/'.$sen_id.'.jpg';
                    }
                    else
                    {
                      echo 'images/users/default.jpg';
                    }
                    ?>'>
                  </div>
                  <div class='details'>
                    <h2><?php echo $recq_rows['firstname'].' '.$recq_rows['surname']; ?></h2>
                    <h3>Conversations</h3>
                  </div>
                </div>
                <iframe class="" id="overi" src="iframemess.php?id=<?php echo $rows["rec_id"];?>" name="messframe" width="320px" height="380px" style="z-index:2;"></iframe>
              </div>
            </div>
          </label>
          <?php }?>
           <!--</tr>
            <tr id="messages1">
            <td>
           <script type="text/javascript">
           var element = document.getElementById("over");
          element.scrollTop = element.scrollHeight;
           </script>
            <div  id="over" style="overflow-y:auto;height:200px;border:1px solid silver;width:470px;padding:0px;">
           <table class="update" width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#FFFFFF" style="position:relative;left:100px;width:350px;">
           <?php
           /*if($c==0 && $d==0)
           {
            $sql3="SELECT mess,date,sen_id FROM message WHERE (sen_id='".mysqli_real_escape_string($con,$rows['sen_id'])."' AND rec_id='".mysqli_real_escape_string($con,$user_id)."') OR (sen_id='".mysqli_real_escape_string($con,$user_id)."' AND rec_id='".mysqli_real_escape_string($con,$rows['rec_id'])."') ";
           }else{
           $sql3="SELECT mess,date,sen_id FROM message WHERE (sen_id='".mysqli_real_escape_string($con,$rows['sen_id'])."' AND rec_id='".mysqli_real_escape_string($con,$user_id)."') OR (sen_id='".mysqli_real_escape_string($con,$user_id)."' AND rec_id='".mysqli_real_escape_string($con,$rows['sen_id'])."') ";
           }$sql3_run=mysqli_query($con,$sql3);
           $m=0;
           $e=0;
           while($sql3_rows=mysqli_fetch_assoc($sql3_run))
           {
          	if($sql3_rows['sen_id']==$user_id)
          	{
           ?>
          <tr id="messages" >
           <td align="right">
           <div style="border:1px solid silver;padding:20px;border-radius:25px;width:200px;background:#B4E0F8;position:relative;" ><font color="black" ><?php echo $sql3_rows['mess']; ?></font>
           <br>
           <font color="grey"><?php echo $sql3_rows['date']; ?></font></div></td>
           </tr>
          <?php
          	 }
          	 else
          	 {
          ?>
          <tr id="messages">
           <td align="left" >
          <?php
          if($e==0)
          {
          if($sql3_rows['date']>$messtime){
          	echo '<b style="background:#E0E0E0;padding:10px;color:black;position:relative;left:10px;">New Message</b>';
          	$e=1;
          }
          }
          ?>
           <div style="<?php if($sql3_rows['date']>$messtime){ ?> border:1px solid red;<?php }else { ?>border:1px solid silver;<?php } ?>padding:20px;border-radius:25px;width:200px;background:#E0E0E0;position:relative;"  class="speech">
           <font color="black"><?php echo $sql3_rows['mess']; ?> </font>
            <br>
           <font color="grey"><?php echo $sql3_rows['date']; ?></font>
           </div>
           </td>
          </tr>
          <?php
          	 }
          	 $m++;
           }*/
          ?>
          </table>
          </div>
          </td>
          </tr>
           </table>
           </td>-->
           </tr>
           <!--<tr>
           <td>
           <?php
           //include 'reply_mess.php';
           ?>
           </td>
           </tr>-->
           <?php
          }
          $z++;
          $i++;
          }
          ?>
        </div>
        <br>
        <div class="col-md-6 col-xs-12 message-box1">
            <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Message Friends</h3>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                          <i class="fa fa-comments"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                     <!-- Conversations are loaded here -->
                      <div class="direct-chat-messages">
                        <form action="create_mess.php" method="post" class="sidebar-form">
                          <div class="input-group">
                           <input type="text" name="rec" list="namelist2" id="names2" class="form-control" placeholder="Type your friend's name" onkeyup="searchnames2();">
                            <datalist id="namelist2"></datalist>
                                <span class="input-group-btn">
                                  <button type="submit" name="search" id="search-btn" class="btn btn-flat" style="position:relative;padding:0 25px"><span style="position:absolute;top:10px;left:20px;" class="glyphicon glyphicon-search"></span>
                                  </button>
                                </span>
                          </div>
                      </div>
                      <!--/.direct-chat-messages-->


                      <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="input-group">
                          <input type="text" name="mess" placeholder="Type Message ..." class="form-control">
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-flat">Send</button>
                              </span>
                        </div>
                      </form>
                    </div>
                    <!-- /.box-footer-->
                  </div>
        </div>
      </div>
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->
</div>
<?php
 	date_default_timezone_set("Asia/Kolkata");
	$time=time();
	$datetime=date("y/m/d H:i:s");
	$messt="UPDATE login SET messtime='$datetime' WHERE id='$user_id'";
	mysqli_query($con,$messt);

 }
 else {
   echo '<script type="text/javascript">';
   echo 'window.location.href="login.php";';
   echo '</script>';
 }
 ?>
<!-- /.content-wrapper -->
<script type="text/javascript">
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
      option.value = udataarr[i];
      // Add the <option> element to the <datalist>.
      list.appendChild(option);
      }
    }

    function searchnames2(){
      var list = document.getElementById('namelist2');
      while (list.firstChild) {
          list.removeChild(list.firstChild);
      }
      var xmlhttp=new XMLHttpRequest();
      var sinput=document.getElementById('names2');
      var name= sinput.value;
      xmlhttp.open("GET","searchajax.php?name="+name,false);
      xmlhttp.send(null);
      var udata=xmlhttp.responseText;
      var udataarr = udata.split("~");
      for(i=0;i<udataarr.length;i++)
      {
      var option = document.createElement('option');
      // Set the value using the item in the JSON array.
      option.value = udataarr[i];
      // Add the <option> element to the <datalist>.
      list.appendChild(option);
      }
    }
</script>
<?php
   include'footer.php';
?>
