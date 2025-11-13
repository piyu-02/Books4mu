<?php
include("./connection.php");
session_start();
$pid=$_GET['pid'];
$user=$_SESSION['uid'];
$query="INSERT INTO wishlist(pro_id,uid) VALUES('$pid','$user')";
$result=mysqli_query($con,$query);
if($result)
    {
        header("Location:./mywishlist.php");
    }
?>