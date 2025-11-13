<?php include("./header.php") ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Details</title>
</head>
<body>
<section class="py-5">
    <div class="container">
        <?php
            $pro_id=$_GET['pro_id'];
            $query="SELECT * FROM product INNER JOIN category ON product.cat_id=category.cat_id WHERE pro_id=$pro_id ";
            $result=mysqli_query($con,$query);
            while($row=mysqli_fetch_row($result))
            {
            	$file=$row[5];
           ?>
        <div class="row">
            <div class="col-lg-6 p-5"><img src="./images/<?php echo $file ?>" class="card-img-top" height="500px" width="150px"></div>
            <div class="col-lg-6  p-5">
                <h3><?php echo $row[1] ?></h3>
                <p><?php echo $row[12] ?></p>
                <p><b>Author:</b> <?php echo $row[3] ?></p>
                <p><b>Publisher:</b> <?php echo $row[4] ?></p>
                <p><b>Details:</b> <?php echo $row[2] ?></p>
                 <p><b>Price:</b><?php echo $row[6] ?></p>
                  <?php if (isset($_SESSION['uid'])) {  ?>
                  <a href="db_wishlist.php?pid=<?php echo $row[0] ?>"class="btn btn-dark m-3  w-75">Wishlist</a>
                 <a href="db_cart.php?pid=<?php echo $row[0] ?>" class="btn btn-dark m-3 w-75">Move To Cart</a>
                  <?php }else
                                	{ ?>
                                	   <a class="btn btn-dark m-3 w-75" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Wishlist </a>
                                	   <a class="btn btn-dark m-3 w-75" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Move To Cart </a>
                                   <?php	} ?>
            </div>
        </div>
    </div>
        <?php }
        ?>                  
</section>
</body>
<?php include("footer.php") ?>