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
                  <h4 class="page-title">Dashboard</h4>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Atricles</a></li>
                     <li class="breadcrumb-item active">Add New Article</li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- end row -->

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                  
                       <!-- Add / Edit Category -->
                        <?php include "partials/articles/add-edit-article.php"; ?>
                        <!-- End Add / Edit Category -->

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
   $('#summernote').summernote({
      placeholder: 'Place your article content here !',
      tabsize: 2,
      height: 700
   });
</script>