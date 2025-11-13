<?php
session_start();
include("./connection.php");
$rname=$_POST['rname'];
$rnumber=$_POST['rnumber'];
$remail=$_POST['remail'];
$gender=$_POST['gender'];
$rpassword=$_POST['rpassword'];
echo($rname);
echo($rnumber);
echo($remail);
echo($gender);
echo($rpassword);


$selectQuery ="SELECT * FROM user WHERE email='$remail'";
$selectResult=mysqli_query($con,$selectQuery);
if(mysqli_num_rows($selectResult) == 1)
{
     // echo("Email is already there");
   header("Location:./index.php?registererror=invalid");
 }
else
{
    $query="INSERT INTO user(name,number,email,gender,password) VALUES('$rname','$rnumber','$remail','$gender','$rpassword')";
    $result=mysqli_query($con,$query);
    if($result)
    {
        $selectResult1=mysqli_query($con,$selectQuery);
        $row=mysqli_fetch_row($selectResult1);
        $_SESSION['u_id']=$row[0];
        $_SESSION['u_name']=$row[1];
        header("Location:./index.php");
        echo "<script> alert('You are register successfuly now login'); window.location='./login.php';</script>";
    }  
}

echo ($query);
?>