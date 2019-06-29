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
				// If url has a page number then that page number will be set as the page
				if(isset($_GET['Page'])){

					$page = $_GET['Page']; 

				// If not page number is set to 1
				}else{

					$page = 1;

				}
				
				// All page articles
				include "partials/articles/view-articles.php";
				// End all page articles
			?>
		
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

<!-- footer -->
<?php include "includes/footer.php"; ?>
<!-- End footer -->
