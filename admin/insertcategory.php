<?php
include("connection.php");
$catename=$_POST['newcategory'];
$query= "INSERT INTO category(cat_name) VALUES('".$catename."')";
$result=mysqli_query($con,$query);
if($result){
    echo("<script> alert('Category added Successfully'); window.location='./admincategory.php'; </script>");
}else{
    echo("<script> alert('Category not added'); window.location='./admincategory.php'; </script>");
}

?>