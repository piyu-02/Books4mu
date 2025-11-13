<?php include("connection.php");
session_start();
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$state=$_POST['state'];
$paymentType=$_POST['paymentType'];
$totAmount=$_POST['totAmount'];
$user=$_SESSION['uid'];
$cname=$_POST['cname'];
$Cnumber=$_POST['Cnumber'];
$cvv=$_POST['cvv'];
$cexpiry=$_POST['cexpiry'];   
$ordered="Ordered";


	if($paymentType == "COD")
	{
    $query="INSERT INTO bill(uid,address1,address2,phone,city,state,payment_type,total_amount,bill_date)
     VALUES('$user','$address1','$address2','$phone','$city','$state','$paymentType','$totAmount','".date('Y-m-d')."')";
		$result=mysqli_query($con,$query);
	}
	else
	{

		  $query="INSERT INTO bill(uid,address1,address2,phone,city,state,payment_type,cardname,cardnumber,cvv,card_expiry,total_amount,bill_date) 
          VALUES('$user','$address1','$address2','$phone','$city','$state','$paymentType','$cname','$Cnumber','$cvv','$cexpiry','$totAmount','".date('Y-m-d')."')";
		$result=mysqli_query($con,$query);
	}
	$query="SELECT * FROM bill WHERE uid='$user' ORDER BY bill_date DESC,bill_id DESC LIMIT 1";
    $result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
	$bill_id=$row[0];
	if($result)
		  { 
			 
			  
			  $query="SELECT * FROM cart INNER JOIN product ON cart.pro_id=product.pro_id  WHERE uid='$user'";
              $result=mysqli_query($con,$query);
				$row=mysqli_fetch_row($result);
				$pro_id=$row[2];
				$Oquantity=$row[3];
				$Pquantity=$row[11];
				$cart_id=$row[0];
			  if($result)
			  {  
				$query="INSERT INTO ordertbl(pro_id,price,orderQty,status,bill_id) VALUES('$pro_id','$totAmount','$Oquantity','$ordered','$bill_id')";
				 $result=mysqli_query($con,$query);
				 $updateqty=$Pquantity-$Oquantity;
				 $query="UPDATE product SET pro_quantity ='$updateqty' WHERE pro_id = '$pro_id'";
			       $result=mysqli_query($con,$query);	

				 $query="DELETE FROM cart WHERE cart_id = '$cart_id'";
                 $result=mysqli_query($con,$query);
			  }
			  echo "<script> alert('order conform'); window.location='./orderprofile.php';</script>";
		  }else{
			header("Location=./index.php?Error");
		  }
		  
  

 
?>