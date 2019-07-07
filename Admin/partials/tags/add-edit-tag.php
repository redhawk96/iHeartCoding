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
    <div class="card border border-Muted border-top-0">
        <div class="card-body bg-dark">
        <h4 class="card-title font-16 mt-0 text-center text-white mb-0"><i class="fa fa-tags pr-1"></i> Update Tag</h4>
    </div>
    <div class="card-body">
        <form class="pt-3" name="updateCategoryForm" action="../controllers/categoryController.php" method="POST" onsubmit="return validateUpdateCategory()">
            <div class="form-group row" id="catUpdateTitleinput">
                <label class="col-sm-2 form-control border border-left-0 border-right-0 border-top-0 border-bottom-0 pl-3">Tag Title</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="cat_title" value="<?php echo $cat_title; ?>">
                </div>
                <div class="col px-0">
                    <button type="submit" class="btn btn-outline-success" value="<?php echo $ecat_id; ?>" name="update_category">Update</button>
                    <a href="/iHeartCoding/Admin/Tags" class="btn btn-outline-secondary ml-1">Reset</a>
                </div>
            </div>
        </form>
    </div>
    <!-- End Displaying specific category [HTML Content] -->

<?php  

    }
    // End of while loop to display specific category

// Else if the ecat is not shown and the url is as below, then content will be show to add new category
// eg: categories.php

}else{

?>

    <div class="card border border-Muted border-top-0">
        <div class="card-body bg-dark">
        <h4 class="card-title font-16 mt-0 text-center text-white mb-0"><i class="fa fa-tags pr-1"></i> New Tag</h4>
    </div>
    <div class="card-body">
    <form class="pt-3" name="newCategoryForm" action="../controllers/categoryController.php" method="POST" onsubmit="return validateAddCategory()" >
        <div class="form-group row" id="catAddTitleinput">
            <label class="col-lg-2 form-control border border-left-0 border-right-0 border-top-0 border-bottom-0 pl-3">Tag Title</label>
            <div class="col-lg-8">
                <input type="text" class="form-control has-error" placeholder="JavaScript" name="cat_title">
            </div>
            <div class="col px-0">
                <button type="submit" class="btn btn-outline-primary" name="add_category">Add Tag</button>
            </div>
        </div>
    </form>
    </div>
<?php
}
// End of displaying add new category content
?>