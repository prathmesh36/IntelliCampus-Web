<?php
include '../assets/backend/connect.php';
include '../assets/backend/core.php';
require('../assets/backend/data.php');
?>

<?php
// get data that sent from form
if(isset($_POST['proname']) && isset($_POST['detail'])&& isset($_POST['price'])&& isset($_POST['phone']) && isset($_POST['sub']) && isset($_POST['dept']))
    {
    $page_id=1;
    for($i=1;$i<=1;$i++){
        /*$doubt="SELECT page_id FROM store WHERE page_id='$i'";
        $doubt_run=mysqli_query($con,$doubt);
        $numx=mysqli_num_rows($doubt_run);
        if($numx>=10)
        {
        $page_id++;
        }*/
    }
    $proname=$_POST['proname'];
    $detail=htmlentities($_POST['detail']);
    $price=$_POST['price'];
    $phone=$_POST['phone'];
    $sub=$_POST['sub'];
    $dept=$_POST['dept'];
    $name=$firstname.' '.$surname;
    $id = $user_id;
    $email2=$email;
    if(!empty($proname) && !empty($detail) && !empty($price) && !empty($phone) && !empty($sub) && !empty($dept))
    {
        if((is_numeric($price)) && (is_numeric($phone)))
        {
            date_default_timezone_set("Asia/Kolkata");
            $datetime=date("d/m/y h:i:s"); //create date time
            $sql="INSERT INTO store(pro_name, detail, name, email, datetime, id, price, phone, sub, dept, page_id) VALUES('".mysqli_real_escape_string($con,$proname)."', '".mysqli_real_escape_string($con,$detail)."', '".mysqli_real_escape_string($con,$name)."', '".mysqli_real_escape_string($con,$email2)."', '".mysqli_real_escape_string($con,$datetime)."','".mysqli_real_escape_string($con,$id)."','".mysqli_real_escape_string($con,$price)."','".mysqli_real_escape_string($con,$phone)."','".mysqli_real_escape_string($con,$sub)."','".mysqli_real_escape_string($con,$dept)."','$page_id')";
            $result=mysqli_query($con,$sql);
            if($result){
                $sql2="SELECT pro_id FROM store";
                $sql_run=mysqli_query($con,$sql2);
                while($row2=mysqli_fetch_assoc($sql_run))
                {

                }

                $url='../file_upload_pro.php';  //testin
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$url.'";';
                echo '</script>';

                echo "<font color='black' >Successful<BR></font>";
            }
            else {
                echo "ERROR";
                //header('Location:../create_pro.php');
            }
            mysqli_close($con);
        }
        else
        {
            //echo 'Please Enter the Price and Phone No in Numeric ';
            echo '<script type="text/javascript">';
            echo 'window.location.href="../create_pro.php#error1";';
            echo '</script>';
        }
    }
    else
    {
        //echo 'Please Fill the Form';
        echo '<script type="text/javascript">';
        echo 'window.location.href="../create_pro.php#error2";';
        echo '</script>';
    }
}


?>
