<?php include "includes/header.php"; ?>

<!-- Header -->
<?php include "includes/navigation.php"; ?>
<!-- End Header -->


<!-- <div style="position:fixed; left:80%; bottom:0%">
	<div class="alert alert-success">
		<strong>Success!</strong> Indicates a successful or positive action.
	</div>
</div> -->

<!-- block-wrapper-section -->
<section class="block-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
			
			
				<!-- View All Articles -->
				<?php include "partials/article/view-article.php"; ?>
				<!-- End View All Articles -->

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
</section>
<!-- End block-wrapper-section -->

<!-- footer -->
<?php include "includes/footer.php"; ?>
<!-- End footer -->