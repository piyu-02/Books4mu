<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
</head>
<body>
<nav class="navbar navbar-dark bg-dark py-4">
    <div class="container-fluid">
      <h1 class="navbar-brand mb-0 h1 ">Welcome <?php echo ($_SESSION['admin']); ?></h1>
      <a class="btn btn-light" href="./adminlogout.php" type="button">Logout</a>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg secondnavbar">
    <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
     
        <li class="nav-item active">
          <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admincategory.php">category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminproduct.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminOrder.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminregisteruser.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminfeedback.php">FeedBack</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admincontact.php">Conatct</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="./adminProfile.php">Profile</a>
        </li>

      </ul>
    </div>
    </div>
  </nav>
    <script src="./javascript/bootstrap.bundle.min.js"></script>
    <script src="./javascript/all.min.js"></script>
</body>

</html>