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
			<?php include "includes/main-content.php"; ?>
			<!-- End main content -->
				
			</div>

			<div class="col-sm-4">

				<!-- sidebar -->
				<div class="sidebar">

					<div class="widget search-widget">
						<form class="search-form" action="" method="POST">
							<input type="text" id="search" name="search_keyword" placeholder="Search here">
							<button type="submit" name="search_btn" id="search-submit"><i class="fa fa-search"></i></button>
						</form>
					</div>

					<!-- tags widget -->
					<?php include "includes/tags-widget.php"; ?>
					<!-- End tags widget -->


					<div class="widget tab-posts-widget">

						<ul class="nav nav-tabs" id="myTab">
							<li class="active">
								<a href="#option1" data-toggle="tab">Popular</a>
							</li>
							<li>
								<a href="#option2" data-toggle="tab">Recent</a>
							</li>
							<li>
								<a href="#option3" data-toggle="tab">Top Reviews</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="option1">
								<ul class="list-posts">
									<li>
										<img src="public/upload/news-posts/listw1.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
													pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw2.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Sed arcu. Cras consequat. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw3.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Phasellus ultrices nulla quis nibh.
													Quisque a lectus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw4.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Donec consectetuer ligula vulputate
													sem tristique cursus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw5.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Nam nulla quam, gravida non,
													commodo
													a, sodales sit amet, nisi. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
							<div class="tab-pane" id="option2">
								<ul class="list-posts">

									<li>
										<img src="public/upload/news-posts/listw3.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Phasellus ultrices nulla quis nibh.
													Quisque a lectus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw4.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Donec consectetuer ligula vulputate
													sem tristique cursus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw5.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Nam nulla quam, gravida non,
													commodo
													a, sodales sit amet, nisi.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
									<li>
										<img src="public/upload/news-posts/listw1.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
													pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw2.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
							<div class="tab-pane" id="option3">
								<ul class="list-posts">

									<li>
										<img src="public/upload/news-posts/listw4.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Donec consectetuer ligula vulputate
													sem tristique cursus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw1.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
													pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw3.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Phasellus ultrices nulla quis nibh.
													Quisque a lectus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw2.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="public/upload/news-posts/listw5.jpg" alt="">
										<div class="post-content">
											<h2><a href="single-post.html">Nam nulla quam, gravida non,
													commodo
													a, sodales sit amet, nisi.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>



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