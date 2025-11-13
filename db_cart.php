<?php
session_start();
include("connection.php");
$id=$_GET['pid'];
$user = $_SESSION["uid"];
$i=1;
    	$query="INSERT INTO cart (uid,pro_id,quantity) VALUES('$user','$id','$i')";
    	$result=mysqli_query($con,$query);
        if($result){
            header("Location:./cart.php");
        }
    	
?>
