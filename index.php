<?php include "includes/header.php"; ?>

<?php 

// Calling displayAllPublishedArticleCount method of Article class
$displayAllPublishedArticleCount = $article->displayAllPublishedArticleCount();

// Getting the published article count, if not zero articles will be displayed
if($displayAllPublishedArticleCount != 0 ){
?>


<!-- Header -->
<?php include "includes/navigation.php"; ?>
<!-- End Header -->

<!-- block-wrapper-section -->
<section class="block-wrapper">
	<div class="container">
		<div class="row">

			<div class="col-sm-8">
	
				<!-- main content -->
				<?php include "partials/main-content.php"; ?>
				<!-- End main content -->

			</div>

			<div class="col-sm-4">

				<!-- sidebar -->
				<div class="sidebar">

				<!-- search widget -->
				<?php include "partials/widgets/search-widget.php"; ?>
				<!-- End search widget -->

				<!-- tags widget -->
				<?php include "partials/widgets/tags-widget.php"; ?>
				<!-- End tags widget -->

				<!-- articles widget -->
				<?php include "partials/widgets/articles-widget.php"; ?>
				<!-- End articles widget -->


				</div>
				<!-- End sidebar -->

			</div>

		</div>

	</div>
</section>
<!-- End block-wrapper-section -->

<?php

// If published article count is zero, below will be displayed
}else{
	include "underconstruction.php";
}
?>

<!-- footer -->
<?php include "includes/footer.php"; ?>
<!-- End footer -->