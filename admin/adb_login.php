<?php
session_start();
include("./connection.php");
$name=$_POST['adminname'];
$password=$_POST['adminpass'];
$query="SELECT * FROM admin WHERE name='".$name."' and password='".$password."'";
$result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) == 1)
     {
      $row = mysqli_fetch_row($result);
      $_SESSION['admin'] = $name;
      echo("<script>alert('login successfully'); window.location='./index.php';</script>");
   } 
     else{
		echo("<script>alert('login unsuccessfully'); window.location='./adminlogin.php';</script>");
        }
?>
