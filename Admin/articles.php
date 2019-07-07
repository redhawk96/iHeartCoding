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
            </div>
         </div>
         <!-- end row -->

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                  
                        <?php
                            if (isset($_GET['Author'])) {

                                $author_id = $_GET['Author'];

                                if ($author_id == '' || empty($author_id)) {

                                    // View All Articles By a Specific Author
                                    include "partials/articles/view-articles.php";
                                    // End View All Articles By a Specific Author
                                    
                                }else{

                                    // View All Articles By a Specific Author
                                    include "partials/articles/view-author-articles.php";
                                    // End View All Articles By a Specific Author
                                }

                            }else{
                                
                                // View All Articles By a Specific Author
                                include "partials/articles/view-articles.php";
                                // End View All Articles By a Specific Author

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

<script src="/iHeartCoding/asynchronous_scripts/articles-button-script.js"></script>
<script src="/iHeartCoding/public/admin/assets/js/selector.js"></script>