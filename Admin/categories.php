<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row" style="padding-top:40px">

            <?php
            // Including Category model
            include '../models/category.php';

            // Creating a object of Category class
            $category = new Category();
            ?>
            
            <div class="col-lg-6">
            
            <!-- Add / Edit Category -->
            <?php include "partials/add-edit-category.php"; ?>
            <!-- End Add / Edit Category -->

            </div>

            <div class="col-lg-6">
            
            <!-- View All Categories -->
            <?php include "partials/view-all-categories.php"; ?>
            <!-- End View All Categories -->

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<script>

    function validateAddCategory(){
        var cat_title = document.newCategoryForm.cat_title.value;
        if(cat_title == "" || cat_title == null){
        $("#catAddTitleinput").addClass("has-error");
        return false;
        }else{
            return true;
        }
    }

    function validateUpdateCategory(){
        var cat_title = document.updateCategoryForm.cat_title.value;
        if(cat_title == "" || cat_title == null){
        $("#catUpdateTitleinput").addClass("has-error");
        return false;
        }else{
            return true;
        }
    }

</script>


<!-- Footer -->
<?php include 'includes/footer.php'; ?>

