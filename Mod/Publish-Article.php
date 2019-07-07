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
         <!-- end row -->

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">

                  <?php 

                  if(isset($_GET['eart'])){

                     $eart_id = $_GET['eart'];

                     include "partials/article/edit-article.php";

                  }else{

                     include "partials/article/add-article.php";

                  }
                  ?>

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
      height: 645
   });

   var uploadField = document.getElementById("a_image");
   var maxSize = 4 * 1000 * 1000 ; // 4MB
   uploadField.onchange = function() {
      if(this.files[0].size > maxSize){
      alert("File is too big!");
      this.value = "";
      };
   };
</script>