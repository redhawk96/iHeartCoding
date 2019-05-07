<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row" style="padding-top:40px">

            <div class="col-lg-12">

                <?php
                // Including Article model
                include '../models/article.php';

                // Creating a object of article class
                $article = new Article();
                ?>
            
                <!-- View All Articles -->
                <?php include "partials/view-all-articles.php"; ?>
                <!-- End View All Articles -->

            </div>
            
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

