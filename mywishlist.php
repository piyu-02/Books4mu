<?php
include("connection.php");
include("header.php")
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>

<body>
    <section id="page-name">
        <div class="container">
            <div class="row g-3">
                <div class="col mt-5 text-center">
                    <h1>My Wishlist </h1>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $user = $_SESSION['uid'];
    $query = "SELECT * FROM wishlist INNER JOIN product ON wishlist.pro_id=product.pro_id WHERE uid=" . $user . "";
    $result = mysqli_query($con, $query);
    ?>
    <section>
        <div class="container p-5">
            <div class="row g-3 ">
                <?php
                while ($row = mysqli_fetch_row($result)) {
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                        <div class="card w-100 h-100">
                            <a href="productdetail.jsp?proid=<%= pid %>" class="text-decoration-none text-dark">
                                <?php
                                $file = $row[8];
                                ?>
                                <img src="./images/<?php echo $file ?>" class="card-img-top" height="150px">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row[4] ?></h5>
                                    <p class="card-text overtext"><?php echo $row[5] ?></p>
                                    <div> <a href="wishlist_to_cart.php?pid=<?php echo $row[1] ?>&wid=<?php echo $row[0] ?>"
                                            class="btn allbtn ">Move to Cart</a> </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
</body>
<?php
include("footer.php")
    ?>