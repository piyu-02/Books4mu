<?php include("header.php");
include("connection.php");
$subtotal = 0;
//int pid;
$user = $_SESSION["uid"];
// $finaltotal=0;
$query = "SELECT * FROM cart INNER JOIN product ON cart.pro_id=product.pro_id WHERE uid='$user'";
$result = mysqli_query($con, $query);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>

</head>

<body>
  <section class="h-100 gradient-custom">
    <div class="container py-5">
      <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
          <div class="card mb-4">


            <?php
            if (mysqli_num_rows($result) == 0) {
              ?>
              <h1 class="text-center">No Records Found</h1>
              <?php
            } else {
              while ($row = mysqli_fetch_row($result)) {
                $pro_id = $row[2];

                ?>

                <div class="card-header py-3">
                  <h5 class="mb-0">Cart </h5>
                </div>
                <div class="card-body">
                  <!-- Single item -->
                  <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                      <!-- Image -->
                      <?php
                      $file = $row[9];
                      ?>
                      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                        <img src="./images/<?php echo $file ?>" class="w-100" alt="<?php echo $file ?>" />
                      </div>
                      <!-- Image -->
                    </div>

                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">

                      <p><strong><?php echo $row[5] ?></strong></p>
                      <p>Author : <?php echo $row[7] ?></p>
                      <p>Publisher : <?php echo $row[8] ?></p>
                      <a href="deletecart.php?id=<?php echo $row[0] ?>" type="button"
                        class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item"> <i
                          class="fas fa-trash"></i> </a>
                      <a href="db_wishlist.jsp?pid=<?php echo $row[2] ?>" type="button" class="btn btn-danger btn-sm mb-2"
                        data-mdb-toggle="tooltip" title="Move to the wish list"><i class="fas fa-heart"></i> </a>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                      <script src="./javascript/cart.js"></script>
                      <p class="text-start text-md-center">
                        <script src="./javascript/cart.js"></script>
                        <strong>Quantity:
                          <select id="qty<?php echo $row[0] ?>" name="qty" onchange="changeQty(<?php echo $row[0] ?>);">
                            <?php for ($i = 1; $i <= $row[11]; $i++) {
                              if ($i == $row[3]) {
                                ?>

                                <option value="<?php echo ($i); ?>" selected><?php echo ($i); ?></option>
                              <?php } else {
                                ?>
                                <option value="<?php echo ($i); ?>"><?php echo ($i); ?></option>
                              <?php }
                            }
                            ?>

                          </select>
                        </strong>

                      </p>
                      <!-- Quantity -->
                      <!-- Price -->
                      <p class="text-start text-md-center">
                        <strong>Price: <?php echo ($row[10]); ?></strong>
                      </p>
                      <!-- Price -->
                    </div>
                  </div>
                  <!-- Single item -->
                  <hr class="my-4" />

                  <?php $subtotal = $subtotal + ($row[3] * $row[10]);
                  ?>

                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center my-4">
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Summary</h5>

              </div>
              <div class="card-body ">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    SubTotal:
                    <span><?php echo ($subtotal); ?></span>

                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    GST(5.5%):
                    <span><?php echo ($subtotal * 5.5 / 100); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>Total amount </strong>

                    </div>
                    <?php $finaltotal = $subtotal + ($subtotal * 5.5 / 100); ?>
                    <span><strong><?php echo ($finaltotal); ?></strong></span>
                  </li>
                </ul>
                <a href="order.php?tot=<?php echo ($subtotal + ($subtotal * 5.5 / 100)); ?>" type="button"
                  class="btn btn-primary btn-lg  w-100 ">
                  Place Order
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </section>
</body>

</html>
<?php include("footer.php") ?>