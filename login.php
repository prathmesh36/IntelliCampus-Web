<?php
  include 'all.php';
?>

  <script type="text/javascript">
    var     head = document.getElementsByTagName('head')[0],
            link1 = document.createElement('link'),
            link2 = document.createElement('link');
    link1.href='assets/bootstrap/css/form-elements.css';
    link1.rel='stylesheet';
    link2.href='assets/bootstrap/css/style.css';
    link2.rel='stylesheet';
    head.appendChild(link1);
    head.appendChild(link2);
  </script>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-image:url('images/backgrounds/1.jpg');padding-bottom:2%;" >
      <div class="row" style="margin:0 3%;">
        <div class="modal fade bd-example-modal-lg error" id="error" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg1">
            <div class="modal-content" style="width:100%:">
              <div class="modal-header">
                <h3 class="modal-title" >Login Error</h3>
              </div>
              <div class="modal-body xsfonts" style="" id="folist2">
                Invalid Email ID or Password
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade bd-example-modal-lg error1" id="error1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg1">
            <div class="modal-content" style="width:100%:">
              <div class="modal-header">
                <h3 class="modal-title" >Login Error</h3>
              </div>
              <div class="modal-body xsfonts" style="" id="folist2">
                Invalid Details
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade bd-example-modal-lg error2" id="error2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg1">
            <div class="modal-content" style="width:100%:">
              <div class="modal-header">
                <h3 class="modal-title" >Login Error</h3>
              </div>
              <div class="modal-body xsfonts" style="" id="folist2">
               Enter Details
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <?php
          if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
          {
        ?>

        <div class="col-sm-5">
          <div class="form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Login</h3>
                <p>Enter username and password to log on:</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-lock"></i>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" action="login_reg_scripts/logincode.php" method="post" class="login-form">
                <div class="form-group">
                  <label class="sr-only" for="form-username">Username</label>
                    <input type="text" name="email" placeholder="Email..." class="form-username form-control" id="form-username">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="form-password">Password</label>
                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                  </div>
                  <button type="submit" class="btn">Login</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-1 middle-border hidden-xs"></div>
        <div class="col-sm-1"></div>

        <div class="col-sm-5">
          <div class="form-box" >
            <div class="form-top">
              <div class="form-top-left">
                <?php 
                  if(isset($_GET['redirect']))
                  {
                    if($_GET['redirect']=='reg')
                    {
                      echo '<h3>You have Signed up</h3>
                      <p>Login to get instant access:</p>';
                    }
                  }
                  else
                  {
                    echo '<h3>Sign up now</h3>
                    <p>Register below to get instant access:</p>';
                  }
                ?>
              </div>
              <div class="form-top-right">
                <i class="fa fa-pencil"></i>
              </div>
            </div>
            <div class="form-bottom" style="display:<?php if(($_GET['redirect'])=='reg'){echo'none';}?>;">
                <form role="form" action="login_reg_scripts/proreg.php" method="post" class="registration-form">
                  <div class="form-group">
                    <label class="sr-only" for="form-first-name">First name</label>
                      <input type="text" name="firstname1" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                  </div> 
                  <div class="form-group">
                    <label class="sr-only" for="form-last-name">Last name</label>
                      <input type="text" name="surname1" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="form-email">Email</label>
                    <input type="text" name="email1" placeholder="Email..." class="form-email form-control" id="form-email">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="form-email">Password</label>
                    <input type="password" name="password1" placeholder="Password..." class="form-email form-control" id="form-email">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="form-email">Confirm Password</label>
                    <input type="text" name="password2" placeholder="Confirm Password..." class="form-email form-control" id="form-email">
                  </div>
                  <div class="form-group">
                    <select name="dept" placeholder="Dept" style="font-family: 'Roboto', sans-serif;color: #888;font-size: 16px;height: 50px;font-weight: 300;line-height: 50px;" class="form-control select2"  style="width: 100%;" >
                      <option selected="selected"value="">&nbsp&nbsp&nbsp Select Dept....</option>
                      <option title="dept" value="ME">&nbsp&nbsp&nbsp&nbsp ME</option>
                  		<option title="dept" value="IT">&nbsp&nbsp&nbsp&nbsp IT</option>
                  		<option title="dept" value="IS">&nbsp&nbsp&nbsp&nbsp IS</option>
                  		<option title="dept" value="EE">&nbsp&nbsp&nbsp&nbsp EE</option>
                  		<option title="dept" value="EC">&nbsp&nbsp&nbsp&nbsp EC</option>
                  		<option title="dept" value="CE">&nbsp&nbsp&nbsp&nbsp CE</option>
                  		<option title="dept" value="CO">&nbsp&nbsp&nbsp&nbsp CO</option>
                  		<option title="dept" value="Out">&nbsp&nbsp&nbsp&nbsp Out</option>
                    </select>
                  </div>
                  <div class="form-group" >
                    <select name="year2" style="font-family: 'Roboto', sans-serif;color: #888;font-size: 16px;height: 50px;font-weight: 300;line-height: 50px;" class="form-control select2" style="width: 100%;">
                    	<option value="" selected="selected">&nbsp&nbsp&nbsp&nbsp Select your Year...</option><option value="1st Year">&nbsp&nbsp&nbsp&nbsp 1st Year</option><option value="2nd Year">&nbsp&nbsp&nbsp&nbsp 2nd Year</option><option value="3rd Year">&nbsp&nbsp&nbsp&nbsp 3rd Year</option>
                  	</select>
                  </div>
                  <div style="color:white;" class="form-group">
                    <h4>Gender</h4>
                  </div>
                  <div style="color:white;font-weight:normal;" class="form-group">
                    <div class="radio">
                      <label style="font-size:16px;"><input type="radio" name="gender1" value="male">Male</label>
                    </div>
                    <div style="color:white;" class="radio">
                      <label style="font-size:16px;font-weight:normal;"><input type="radio" name="gender1" value="female">Female</label>
                    </div>
                  </div>
                  <div style="color:white;" class="form-group">
                    <h4>Date of Birth:</h4>
                  </div>
                  <div class="form-group" >
                    <select name="dob1" style="width:15%;font-family: 'Roboto', sans-serif;color: #888;font-size: 16px;height: 50px;font-weight: 300;line-height: 50px;">
                      <option value="1">01</option><option value="2">02</option><option value="3">03</option>
                      <option value="4">04</option><option value="5">05</option><option value="6">06</option>
                      <option value="7">07</option><option value="8">08</option><option value="9">09</option>
                      <option value="10">10</option><option value="11">11</option><option value="12">12</option>
                      <option value="13">13</option><option value="14">14</option><option value="15">15</option>
                      <option value="16">16</option><option value="17">17</option><option value="18">18</option>
                      <option value="19">19</option><option value="20">20</option><option value="21">21</option>
                      <option value="22">22</option><option value="23">23</option><option value="24">24</option>
                      <option value="25">25</option><option value="26">26</option><option value="27">27</option>
                      <option value="28">28</option><option value="29">29</option><option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                    <select name="month1" style="width:15%;font-family: 'Roboto', sans-serif;color: #888;font-size: 16px;height: 50px;font-weight: 300;line-height: 50px;">
                      <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option>
                      <option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option>
                      <option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                    </select>
                    <select name="year1" style="width:25%;font-family: 'Roboto', sans-serif;color: #888;font-size: 16px;height: 50px;font-weight: 300;line-height: 50px;">
                      <option value="1985">1985</option><option value="1985">1985</option><option value="1986">1986</option>
                      <option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option>
                      <option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option>
                      <option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option>
                      <option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option>
                      <option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option>
                    </select>
                  </div>
                  <button type="submit" class="btn">Sign me up!</button>
                </form>
            </div>
          </div>

        </div>
        <?php
          }
          else
          {
            echo '<script type="text/javascript">';
            echo 'window.location.href="profile.php";';
            echo '</script>';
          }
        ?>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <?php
    include 'footer.php';
  ?>
  <script>
    //shortcut for $(document).ready
    var hash = window.location.hash;
    if (hash.substring(1) == 'error')
    {
        $(hash).modal('toggle');
    }
    if(hash.substring(1) == 'error1')
    {
        $(hash).modal('toggle');
    }
    if(hash.substring(1) == 'error2')
    {
        $(hash).modal('toggle');
    }
  </script>
