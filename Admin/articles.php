<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row" style="padding-top:40px">

            <div class="col-lg-12">

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
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

