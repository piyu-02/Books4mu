<?php include("header.php"); 
include("connection.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
 <section id="page-name">

        <div class="container h-200">
            <div class="row">
                <div class="col mt-5 text-center">
                    <h1>View Order</h1>
                    <span class="line"></span>
                </div>
                
            </div>
        </div>
    </section>
    <section class="mx-5 px-5">
    <div class="row m-5 ">
                <!-- <div class="col"> -->
                <div class="card p-3">
                 <?php
              
              $user=$_SESSION['uid'];
                 $query="SELECT * FROM ordertbl INNER JOIN product ON ordertbl.pro_id=product.pro_id INNER JOIN bill ON ordertbl.bill_id=bill.bill_id INNER JOIN user ON bill.uid=user.uid where bill.uid='$user'";
                $result=mysqli_query($con,$query);
                 if($row=mysqli_fetch_row($result))
          {
        	//   int orderid=rsuser.getInt("order_id");
        ?>
                        <div class="card-header mt-3">
                            <h3><?php echo $row[6] ; ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-6 col-md-12  mt-3">
                                    <h4 class="text-center py-2 bg-light">Product Details</h4>
                                    <div class="row p-1">
                                        <div class="col-12">
                                           
                                            <div class="row">
                                               <h5>Author:  <?php echo $row[9]  ?></h5>
                                            </div>
                                            <div class="row">
                                                <h5>Publisher: <?php echo $row[10] ?></h5>
                                            </div>
                                            <div class="row">
                                                <h5>Price: <?php echo $row[12]  ?></h5>
                                            </div>
                                             <?php if ($row[14] == "0") { }else{ ?>
                                             <div class="row">
                                                <h5>Sale: <?php echo $row[14] ?></h5>
                                            </div>
                                            <?php } ?>
                                                <?php $file=$row[11];  ?>
                                             <div class="row">
                                                <h5>Picture:  <img src="./images/<?php echo $file  ?>"
                                                        class="img-fluid" width="100" height="100" /></h5>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <!-- <div width="50px" height="50px">  </div>-->
                                
                                <div class="col-lg-6 col-md-12 mt-3">
                                    <h4 class="text-center py-2 bg-light">User Details</h4>
                                    <div class="row p-1">

                                            <div class="col-12">
                                               <div class="row">
                                                    <h5> Bill Id:<?php echo $row[17]  ?> </h5>
                                                </div>
                                                <div class="row">
                                                    <h5> User Name:<?php echo $row[32] ?> </h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Address 1: <?php echo $row[19]  ?></h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Address 2: <?php echo $row[20] ?> </h5>
                                                </div>
                                                <div class="row">
                                                    <h5>City: <?php echo $row[22] ?></h5>
                                                </div>
                                                <div class="row">
                                                    <h5>State:  <?php $row[23] ?> </h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Quantity:  <?php echo $row[2] ?></h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Payment Type: <?php echo$row[24] ?></h5>
					                             </div>
					                             <?php if($row[24] =="card") { ?>
														<div>
															<h5>Card Holder Name : <?php echo $row[25] ?></h5>
														</div>
														<div>
															<h5>Card Number : <?php echo $row[26]  ?></h5>
														</div>
														<div>
															<h5>CVV : <?php echo $row[27]  ?></h5>
														</div>
														<div>
															<h5>Card Expiry : <?php echo $row[28] ?></h5>
														</div>
														<?php } ?>
					                                <div class="row">
                                                    <h5>Total Amount:  <?php  echo $row[29]  ?></h5>
                                                </div>


                                            </div>

                                        
                                        
                                    </div>

                                </div>
                                <!-- payment  end -->

                                <div class="card-footer">
                                <?php if($row[4] == "Cancel") { ?>
                                    <p class="errmsg">Sorry  Your order canceled...... </p>
                                	<button class="btn allbtn text-white btn-75"><?php echo $row[4]  ?></button>
                                		
                               <?php }else{ ?>
                                
                                <button class="btn allbtn text-white btn-75"><?php echo $row[4]  ?></button>
                                 <a href="./ordercancel.jsp?orderid=<?php echo $row[10]  ?>" class="btn allbtn  text-white btn-75"
                                                onclick="return confirm('Are you sure you want to delete this booking?');">Cancel</a>
                                                
                                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    <?php } ?>
                </div>
            </div>
     
    
   </section> 
     
</body>

<?php include("footer.php") ?>