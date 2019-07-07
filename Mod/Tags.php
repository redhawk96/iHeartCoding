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
         </div>

         <div class="row">
            <div class="col-5">

               <!-- View All Categories -->
               <?php include "partials/tags/add-tag.php"; ?>
               <!-- End View All Categories -->

            </div>
            </div>
            <!-- end col -->
            <div class="col-7">

               <!-- View All Categories -->
               <?php include "partials/tags/view-tags.php"; ?>
               <!-- End View All Categories -->

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