<?php
require("connect.php");

$sql="Select *from leavedb";
$result = mysqli_query($con,$sql);
while($test = mysqli_fetch_array($result)){
    $id=$test['ID'];
    $type=$test['LeaveType'];
    $from=$test['FromDate'];
    $to=$test['ToDate'];
    $status=$test['Status'];
    $reason=$test['Reason'];

    echo "<table border=1>";
    echo "<tr>";
    echo "<td>" .$type."</td>";
    echo "<td>" .$from."</td>";
    echo "<td>" .$to."</td>";
    echo "<td>" .$reason."</td>";
    if($test['Status']!=""){
        echo "<td>" .$status."</td>";
    }
    else{
        echo "<td> <a href='approve.php?id=".$id."'>Approve </a>"."/"."<a href='decline.php?id=".$id."'>Decline </a>"."</td>" ;
    }
    echo "</tr>";
    echo "</table>";

}
?>
