<?php include ("./header.php");
include ("./connection.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <section id="page-name">
        <div class="container">
            <div class="row g-3">
                <div class="col mt-5 text-center">
                    <h1>
                        <?php
                        if (isset($_GET["id"])) {
                            $id = $_GET["id"];
                            $query = "SELECT * FROM category WHERE cat_id=$id";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_row($result)) {
                                echo ($row[1]);
                            }
                        } else if ($_GET["value"] == "lateset") {
                            echo ("New Arrival");
                        } else if ($_GET["value"] == "trend") {
                            echo ("Trending Book");
                        } else if ($_GET["value"] == "sale") {
                            echo ("Sale");
                        } else if ($_GET["value"] == "search") {
                            echo ($_GET['val']);
                        }else{
                            echo("Record not found");
                        }

                        ?>
                    </h1>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </section>
    <?php 
   if (isset($_GET["id"])) {
    $id = $_GET["id"];       
        $proquery = "SELECT * FROM product WHERE cat_id=$id";
    } else if ($_GET["value"] == "lateset") {
        $proquery = "SELECT * FROM product ORDER BY pro_id DESC LIMIT 10";
    } else if ($_GET["value"] == "sale") {
        $proquery = "SELECT * FROM product WHERE sale>0";
    } else if ($_GET["value"] == "trend") {
        $proquery = "SELECT * FROM product ORDER BY pro_quantity DESC LIMIT 10";
    } else if ($_GET["value"] == "search") {
        $val = $_GET["val"];
        $proquery = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id 
          WHERE pro_name LIKE '%" . $val . "%' OR pro_details LIKE '%" . $val . "%' 
          OR author LIKE '%" . $val . "%' OR publisher LIKE '%" . $val . "%' 
          OR cat_name LIKE '%" . $val . "%'";
    } else {
        $proquery = "SELECT * FROM product ORDER BY pro_id ASC";
    }
    $proresult = mysqli_query($con, $proquery);
    ?>
    <section>
        <div class="container py-4">
            <div class="row g-3 ">
                <?php              
                while ($prorow = mysqli_fetch_row($proresult)) {
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                        <a href="productDetails.php?pro_id=<?php echo $prorow[0] ?>" class="text-decoration-none text-dark">
                            <div class="card w-100 h-100">
                                <?php
                                $file = ($prorow[5]);
                                ?>
                                <div> <img src="./images/<?php echo ($file); ?>" class="card-img-top" height="150px"> </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $prorow[1] ?>
                                    </h5>
                                    <h6 class="card-text">Price:
                                        <?php echo $prorow[6] ?>
                                    </h6>
                                    <h6 class="card-text" style="color:red;">
                                        <?php if ($prorow[8] > 0) {
                                            echo "Sale: " . $prorow[8] . "% off";
                                        } ?>
                                    </h6>
                                    <p class="card-text overtext">
                                        <?php echo $prorow[2] ?>
                                    </p>
                                </div>
                                <div class="card-footer w-100 h-100">
                                    <?php if (isset($_SESSION['uid'])) { ?>
                                        <a href="db_wishlist.php?pid= <?php echo $prorow[0] ?>"
                                            class="btn  allbtn ">Wishlist</a>
                                    <?php } else { ?>
                                        <a class="btn allbtn" type="button" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">Wishlist </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
    </section>
</body>
<?php
include ("./footer.php")
    ?>