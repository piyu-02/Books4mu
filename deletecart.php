<?php
include("connection.php");
$id=$_GET['id'];
$query="DELETE FROM `cart` WHERE cart_id='$id'";
$result=mysqli_query($con,$query);
if($result){
    header("Location:./cart.php");
}else{
    header("Location=./index.php");
}
?>