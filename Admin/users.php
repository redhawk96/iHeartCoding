<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row" style="padding-top:40px">

            <div class="col-lg-12">

                <?php 
                if(isset($_GET['add_user'])){
                ?>
                    
                    <!-- Add User -->
                    <?php include "partials/users/add-user.php"; ?>
                    <!-- End Add User -->

                <?php
                }else if(isset($_GET['edit_user'])) {
                ?>
                    
                    <!-- Edit User -->
                    <?php include "partials/users/edit-user.php"; ?>
                    <!-- End Edit User -->
                
                
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
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

