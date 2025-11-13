<?php
include("./connection.php");
$f_name=$_POST['feedname'];
$f_email=$_POST['femail'];
$feedbackmsg=$_POST['feedback'];
 $query="INSERT INTO feedback(fname,femail,feedback) VALUES('$f_name','$f_email','$feedbackmsg')";
 $result=mysqli_query($con,$query);
if($result)
{
        echo("<script> alert('thank you for feedback'); window.location='./index.php'; </script>");
}

?>