<?php 

// If ecat valiable is shown then content will be show to update existing category
// eg: categories.php?ecat=1

if(isset($_GET['ecat'])){

    // Getting the value of ecat variable. ecat variable hold the values of the id of a specific category
    $ecat_id = $_GET['ecat'];

    // Calling displayOneCategory method of Category class
    $displayOneCategory = $category->displayOneCategory($ecat_id);

    // Stating while loop to display specific category
    while($row = mysqli_fetch_assoc($displayOneCategory)){
    
    $cat_title = $row['cat_title'];
?>

    <!-- Displaying specific category [HTML Content] -->
    <form class="form-horizontal" name="updateCategoryForm" action="../controllers/categoryController.php" method="POST" onsubmit="return validateUpdateCategory()">
    <div class="form-group" id="catUpdateTitleinput">
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
    <!-- End Displaying specific category [HTML Content] -->

<?php  

    }
    // End of while loop to display specific category

// Else if the ecat is not shown and the url is as below, then content will be show to add new category
// eg: categories.php

}else{

?>

    <form class="form-horizontal" name="newCategoryForm" action="../controllers/categoryController.php" method="POST" onsubmit="return validateAddCategory()" >
    <div class="form-group" id="catAddTitleinput">
        <label class="col-sm-3 control-label">Category Title</label>
        <div class="col-sm-9">
        <input type="text" class="form-control has-error" placeholder="JavaScript" name="cat_title">
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
// End of displaying add new category content
?>