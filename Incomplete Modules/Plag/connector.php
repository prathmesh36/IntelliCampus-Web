<?php
  //$py = exec("/Library/Frameworks/Python.framework/Versions/2.7/bin/python2.7 /Plag/Rabin-Karp.py", $result);
  $command = shell_exec("/usr/bin/python Rabin-Karp.py");
  echo $command;
  $output = shell_exec($command);
  echo $output;
  echo '<script type="text/javascript">';
        echo 'window.location.href="../plagdet.php";';
        echo '</script>';
  /*if($result){
    echo $py;
    echo"<script>alert('successfull')</script>";
  }
  else{
    echo $py;
    echo"<script>alert('unsuccessfull')</script>";
  }*/
  // /Library/Frameworks/Python.framework/Versions/2.7/bin/python2.7 Rabin-Karp.py /Applications/XAMPP/xamppfiles/htdocs/Plag/Rabin-Karp.py
 ?>
