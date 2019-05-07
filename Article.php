<?php include "includes/header.php"; ?>

<!-- Header -->
<?php include "includes/navigation.php"; ?>
<!-- End Header -->

<!-- block-wrapper-section -->
<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">

			<?php
			// Including Article model
			include 'models/article.php';

			// Creating a object of Category class
			$article = new Article();
			?>
		
			<!-- View All Articles -->
			<?php include "partials/view-article.php"; ?>
			<!-- End View All Articles -->

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
</section>
<!-- End block-wrapper-section -->

<!-- footer -->
<?php include "includes/footer.php"; ?>
<!-- End footer -->