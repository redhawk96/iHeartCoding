<?php 

if(isset($_POST['search_btn']) || isset($_GET['t'])){

    if(isset($_POST['search_keyword'])){
        $search_keyword = $_POST['search_keyword'];

        // If user has not type anything, all articles will be displayed
        if($search_keyword == null){
            $search_keyword = "";
        }
    }
    else if(isset($_GET['t'])){
        $search_keyword = $_GET['t'];
    }
    
?>

<?php include "includes/header.php"; ?>

<!-- Header -->
<?php include "includes/navigation.php"; ?>
<!-- End Header -->

<!-- block-wrapper-section -->
<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
	
			<!-- main content -->
			<?php include "partials/search-content.php"; ?>
			<!-- End main content -->
				
			</div>

			<div class="col-sm-4">

				<!-- sidebar -->
				<div class="sidebar">

				<!-- search widget -->
				<?php include "partials/search-widget.php"; ?>
				<!-- End search widget -->

				<!-- tags widget -->
				<?php include "partials/tags-widget.php"; ?>
				<!-- End tags widget -->

				<!-- articles widget -->
				<?php include "partials/articles-widget.php"; ?>
				<!-- End articles widget -->


				</div>
				<!-- End sidebar -->

			</div>

		</div>

	</div>
</section>
<!-- End block-wrapper-section -->

<!-- footer -->
<?php include "includes/footer.php"; ?>
<!-- End footer -->



<?php
}else{

    // If no search keyword is entered, user will be redirected to the home page
    header('Location: /iHeartCoding/');
}
?>