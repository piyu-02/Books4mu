<?php
include("./connection.php");
include("header.php");
if(!isset($_SESSION['admin']))
{
 header("Location:./adminlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <div class="">
      <img src="../images/adminindex.png"  class="img-fluid h-80 w-100"/>
    </div>
</body>
</html>
<?php
include("./footer.php");
?>