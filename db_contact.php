<?php
include("connection.php");
 $cname=$_POST["cname"];
 $cnumber=$_POST["cnumber"];
 $cemail=$_POST["cemail"];
 $cmsg=$_POST["cusermsg"];
// echo $cname ;
// echo $cnumber;
// echo $cemail;
// echo $cmsg ;
  $query="INSERT INTO contact(cname,cnumber,cemail,cmessage) VALUES('$cname','$cnumber','$cemail','$cmsg')";
 $result=mysqli_query($con,$query);
 if($result){
    echo("<script>alert('thank you for contact us');window.location='./index.php';</script>");
 }
?>