
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment Submission</title>
    <link rel="stylesheet" href="plag/stylesheet2.css">
  </head>
  <body>
    <div class="container">
  <form id="assignment" action="assign.php" method="post" enctype="multipart/form-data">
    <h3>Submit the Assignment in the text area below</h3>
    <h4></h4>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" name="name" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" name="email" required>
    </fieldset>
    <fieldset>
      <input placeholder="Roll No" type="text" tabindex="3" maxlength="11" minlength="11" name= "rollno" required>
    </fieldset>
    <fieldset>
      Subject :
      <select name="subject">
        <option value="MES">MES</option>
        <option value="OS">O.S</option>
        <option value="CGVR">C.G.V.R</option>
        <option value="OST">OST</option>
      </select>
    </fieldset>
    <fieldset>
      Upload a text file for submission :
      <input type="file" name="upload" value="Upload a text file here">
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="assignment-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
  </body>
</html>

<?php
  $bol = False;
  $con = mysqli_connect("localhost", "root", "", "assignment");
  if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  if(!empty($_POST)){
    if(isset($_FILES['upload'])){
      $file = $_FILES['upload'];
      $file_name = $file['name'];
      $file_tmp = $file['tmp_name'];
      $file_error = $file['error'];
      $file_ext = explode('.',$file_name);
      $file_ext = strtolower(end($file_ext));
      if($file_ext === 'txt'){
        if($file_error === 0){
          $file_name_new = $_POST['rollno'].$_POST['subject'].'.'.$file_ext;
          $file_destination = 'plag/Assignments_uploads/'.$file_name_new;
          if(move_uploaded_file($file_tmp, $file_destination)){
            $bol = True;
          }
        }
      }
    }
    if($bol){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $rollno = $_POST['rollno'];
      $subject = $_POST['subject'];
      $assignment = 'submitted';
      $insert = "INSERT INTO `Assignments` (`name`, `email`, `rollno`, `subject`, `assignment`) VALUES ('$name', '$email', '$rollno', '$subject', '$assignment')";
      $check_submission = 'select * from Assignments where rollno='.$rollno.' and subject='.$subject;
      $check_result = mysqli_query($con, $check_submission);
      if($check_result){
        echo '<script>alert("Assignment already submited");</script>';
      }
      else{
        $insert_result = mysqli_query($con, $insert);
        if($insert_result){
          echo '<script>alert("Assignment submited");</script>';
          echo '<script type="text/javascript">';
                echo 'window.location.href="Plag/connector.php";';
                echo '</script>';
        }
        else{
          echo '<script>alert("Assignment not submited please try sometime later");</script>';
        }
      }
    }
    else{
      echo '<script>alert("Assignment not uploaded please try sometime later");</script>';
    }
  }
 ?>
