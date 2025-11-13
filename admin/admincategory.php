<?php
include("./connection.php");
include("./header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <section class="mt-4">
        <div class="container d-flex justify-content-center">
            <h1 class="m-auto">Category</h1>
        </div>
    </section>
    <section class="py-4">
        <div class="container bg-light py-5">         
            <div class="d-flex justify-content-center align-item-center m-2">
                <form method="post" id="addcategory" action="insertcategory.php">
                    <h3 class="mb-2">Add New Category</h3>
                    <input type="text" name="newcategory" id="newcategory" class="form-control-lg w-75 mb-3"
                        placeholder="category......">
                        <br>
                    <label for="addcategorymsg" id="addcategorymsg" class=" d-none errmsg form-label mb-3">Add Category</label>
                    <input type="submit" class="btn btn-primary w-75" value="ADD">

                </form>
            </div>    
        </div>
    </section>
    <section class="py-3">
        <div class="container text-center">
            <div class="row ">
                <div class="col-3">
                    <h5> ID</h5>
                </div>
                <div class="col-3">
                    <h5>NAME</h5>
                </div>
                <div class="col-3">
                    <h5>UPDATE</h5>
                </div>
                <div class="col-3">
                    <h5>DELETE</h5>
                </div>
                <hr />
            </div>
        </div>
    </section>
    <?php
            include("../connection.php");
            $topquery = "SELECT * FROM category";
            $topresult = mysqli_query($con, $topquery);
            while ($toprow = mysqli_fetch_row($topresult)) { 
    ?>   
        <section>
            <div class="container text-center">
                <div class="row justify-content-center" id="editRowcategory<?php echo $toprow[0] ; ?>">
                    <div class="col-3">
                        <h5><?php echo $toprow[0] ; ?></h5>
                    </div>
                    <div class="col-3">
                        <h5><?php echo $toprow[1] ; ?></h5>
                    </div>
                    <div class="col-3">
                        <h5><a href="" onClick="showUpdate(<?php echo $toprow[0]; ?>)">Update</a></h5>
                    </div>
                    <div class="col-3">
                        <a href="deleteAdmincategory.php?id=<?php echo $toprow[0]; ?>"  onClick="deleteerror">
                            <i class="fa-solid fa-trash"></i></a>
                    </div>
                    <hr />
                </div>
                <form id="editcategoryForm<?php echo $toprow[0]; ?>" class="row" action="updateAdmincategory.php"
                    method="post">
                    <!-- onsubmit="return blankvalid(<?php //echo $toprow[0]; ?>);" -->
                    <div class="col-3">
                        <input type="text" disabled value="<?php echo $toprow[0]; ?>">
                        <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $toprow[0]; ?>">
                    </div>
                    <div class="col-3">
                        <input type="text" name="cat_name" id="cat_name<?php echo $toprow[0]; ?>"  value="<?php echo $toprow[1] ; ?>"><br>
                        <label for="editcatmsg" id="editcatmsg<?php echo $toprow[0]; ?>" class=" d-none errmsg form-label mb-3">Enter value</label>
                    </div>
                    <div class="col-3">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                    <div class="col-3">
                        <input type="button" value="Cancel" class="btn btn-dark"
                            onClick="cancelEdit(<?php echo $toprow[0]; ?>);">
                    </div>
                    <hr />
                </form>
            </div>
        </section>
    <?php  } ?>
    <script src="./javascript/category.js"></script>
</body>
</html>
<?php
 include("footer.php");
 ?>