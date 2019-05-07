<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row" style="padding-top:40px">

            <?php
            // Including Article model
            include '../models/article.php';

            // Creating a object of Article class
                $article = new Article();
            ?>
            
            <div class="col-lg-4">

            <!-- Add / Edit Category -->
            <?php include "partials/add-edit-article.php"; ?>
            <!-- End Add / Edit Category -->

            </div>
            
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<!-- Footer -->
<?php include 'includes/footer.php'; ?>





