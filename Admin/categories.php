<?php 
   include 'includes/header.php';
   include 'includes/top-nav.php'; 
   include 'includes/left-nav.php';
?>


<!-- Start right Content here -->
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid">
         <div class="page-title-box">
            <div class="row align-items-center">
               <div class="col-sm-6">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Categories</a></li>
                     <li class="breadcrumb-item active">Manage Categories</li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- end row -->

         <div class="row">
            <div class="col-6">
               <div class="card">
                  <div class="card-body">
                  
                    <!-- Add / Edit Category -->
                    <?php include "partials/categories/add-edit-category.php"; ?>
                    <!-- End Add / Edit Category -->

                  </div>
               </div>
            </div>
            <!-- end col -->
            <div class="col-6">
               <div class="card">
                  <div class="card-body">
                  
                    <!-- View All Categories -->
                    <?php include "partials/categories/view-all-categories.php"; ?>
                    <!-- End View All Categories -->

                  </div>
               </div>
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->

      </div>
      <!-- container-fluid -->
   </div>
   <!-- content -->
</div>
<!-- End Right content here -->


<?php
   include 'includes/footer.php';
?>

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