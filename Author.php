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
			<?php 
			
			if (isset($_GET['author'])) {
				
				$author_id = $user->getUserId($_GET['author']);

				include "partials/author/author-articles.php";  
			
			}else{
				header('Location: /iHeartCoding/');
			}
			?>
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

<!-- footer -->
<?php include "includes/footer.php"; ?>
<!-- End footer -->

