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
                  
                       <!-- View All Comments -->
                        <?php include "partials/comments/view-comments.php"; ?>
                        <!-- End View All Comments -->

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
<script src="/iHeartCoding/public/admin/assets/js/selector.js"></script>