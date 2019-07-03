<?php 
   include 'includes/header.php';
   include 'includes/top-nav.php'; 
   include 'includes/left-nav.php'
?>


<!-- Start right Content here -->
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid">
         <div class="page-title-box">
            <div class="row align-items-center">
               <div class="col-sm-6">
                  <!-- <h4 class="page-title">Members</h4> -->
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Members</a></li>
                     <li class="breadcrumb-item active">Manage All Memebers</li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- end row -->
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                  
                    <?php 
                     if(isset($_GET['add_user'])){
                     ?>
                        
                        <!-- Add User -->
                        <?php include "partials/users/add-user.php"; ?>
                        <!-- End Add User -->

                     <?php
                     }else if(isset($_GET['user'])) {
                     ?>
                        
                        <!-- Edit User -->
                        <?php include "partials/users/view-user.php"; ?>
                        <!-- End Edit User -->
                     
                     
                     <?php
                     } else {
                     ?>               

                        <!-- View All Users -->
                        <?php include "partials/users/view-users.php"; ?>
                        <!-- End View All Users -->

                     <?php
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
var uploadField = document.getElementById("u_image");
var maxSize = 4 * 1000 * 1000 ; // 4MB
uploadField.onchange = function() {
    if(this.files[0].size > maxSize){
    alert("File is too big!");
    this.value = "";
    };
};


</script>

<script src="/iHeartCoding/asynchronous_scripts/users-button-script.js"></script>
<script src="/iHeartCoding/asynchronous_scripts/user-button-script.js"></script>
<script src="/iHeartCoding/asynchronous_scripts/single-user-articles-button-script.js"></script>
<script src="/iHeartCoding/public/admin/assets/js/selector.js"></script>