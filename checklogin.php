<?php
session_start();

include("./connection.php");
$loginemail = $_POST['lemail'];
$loginpassword = $_POST['lpassword'];
$loginquery = "SELECT * FROM user WHERE email='" . $loginemail . "' and password='" . $loginpassword . "'";
// echo($loginquery);
// echo ($loginquery);
$loginres = mysqli_query($con, $loginquery);
// echo($loginres);
if (mysqli_num_rows($loginres) == 1) {
   $loginrow = mysqli_fetch_row($loginres);
   $_SESSION['uid'] = $loginrow[0];
   $_SESSION['name'] = $loginrow[1];
   // echo($_SESSION['uid']);
   // echo($_SESSION['name']);
   echo "<script> alert('Login successfully'); window.location='./index.php';</script>";
} else {
   header("Location:./index.php?loginerr=invalid");
}
?>