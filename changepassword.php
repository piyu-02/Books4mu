<?php
include("./connection.php");
session_start();
$checkquery="SELECT * FROM user WHERE name='".$_SESSION['name']."' and password ='".$_POST['uoldpassword']."'";
$checkres=mysqli_query($con,$checkquery);
if(mysqli_num_rows($checkres)===1)
{
        $query="UPDATE user SET password='".$_POST['unewpassword']."' WHERE name='".$_SESSION['name']."'";
        $result=mysqli_query($con,$query);
        if($result)
        {
                echo("<script> alert('Password Updated Succeddfully'); window.location='./userprofile.php';</script>");
        }
}
else{
        echo("<script> alert('Old Password Wrong...'); window.location='./userprofile.php';</script>");
}

?>