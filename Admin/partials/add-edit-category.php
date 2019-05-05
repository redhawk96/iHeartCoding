<?php 

    if(isset($_GET['ecat'])){

        $ecat_id = $_GET['ecat'];

        $query = "SELECT * FROM categories WHERE cat_id = $ecat_id";
        $selectEditCategoryQuery = mysqli_query($serverConnection, $query);

        while($row = mysqli_fetch_assoc($selectEditCategoryQuery)){
            $cat_title = $row['cat_title'];
?>

    <form class="form-horizontal" action="../controllers/categoryController.php" method="POST">
    <div class="form-group">
        <label class="col-sm-3 control-label">Category Title</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" name="cat_title" value="<?php echo $cat_title; ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-success" value="<?php echo $ecat_id; ?>" name="update_category">Update Category</button>
        <a href="categories.php" class="btn btn-default">Reset</a>
        </div>
    </div>
    </form>

<?php  

        }
    }else{

?>
    <form class="form-horizontal" action="../controllers/categoryController.php" method="POST">
    <div class="form-group">
        <label class="col-sm-3 control-label">Category Title</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="JavaScript" name="cat_title">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-primary" name="add_category">Add Category</button>
        </div>
    </div>
    </form>

<?php
    }
?>