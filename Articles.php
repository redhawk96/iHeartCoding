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

			if(isset($_GET['Author'])){

				$author_id = $_GET['Author'];

				if($author_id != '' || !empty($author_id)){

					// All Articles
					include "partials/author/author-articles.php";
					// End All Articles -->

				}else{
					header('location: Articles');		
				}		

			}else if(isset($_GET['Page'])){
				
				// If url has the page number then page variable is equal to url page number
				$page = $_GET['Page']; 

				// All Articles
				include "partials/articles/view-articles.php";
				// End All Articles -->

			}else{

				// Incase if url is just Articles/ then page number will be set to 1
				$page = 1;

				// All Articles
				include "partials/articles/view-articles.php";
				// End All Articles -->

			}
				
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
