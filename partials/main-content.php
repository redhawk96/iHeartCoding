
<!-- block content -->
<div class="block-content">

<!-- grid box -->
<div class="grid-box">
    <div class="row">
    
        <div class="col-md-12">

            <!-- block content -->
            <div class="block-content">

                <!-- masonry box -->
                <div class="article-box">
                    <div class="title-section">
                        <h1><span>Latest Articles</span></h1>
                    </div>

                    <?php 

                    // Calling displayAllLatestPublishedArticles method of Article class
                    $displayAllLatestPublishedArticles = $article->displayAllLatestPublishedArticles();

                    // Stating while loop to display all categories
                    while($row = mysqli_fetch_assoc($displayAllLatestPublishedArticles)){
                        $a_id = $row['article_id'];
                        $a_author = $row['article_author'];
                        $a_title = $row['article_title'];
                        $a_category_id = $row['article_category_id'];
                        $a_status = $row['article_status'];
                        $a_image = $row['article_image'];
                        $author_id = $row['author_id'];
                        $a_com_count = $row['article_comment_count'];
                        $a_content = $row['article_content'];
                        $a_date = $row['article_date'];
                        $a_view_count = $row['article_view_count'];  
                    
                    ?>

                        <div class="news-post article-post">
                            <div class="row">
                                <div class="col-sm-4">
                                <a href="Article?<?php echo urlencode('a='.$a_id); ?>">
                                    <div class="post-gallery">
                                        <img alt="" src="<?php echo "public/upload/articles/".$a_image; ?>">
                                    </div>
                                </a>
                                </div>
                                <div class="col-sm-8">
                                    <div class="post-content">
                                        <h2><a href="Article?<?php echo urlencode('a='.$a_id);?>"><?php echo $a_title; ?></a>
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i><?php echo date('M j Y', strtotime($a_date)); ?></li>
                                            <li><i class="fa fa-user"></i>by <a href="Articles?Author=<?php echo $author_id; ?>"><?php echo $a_author; ?></a></li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span><?php echo $a_com_count; ?></span></a></li>
                                            <li><i class="fa fa-eye"></i><?php echo $a_view_count; ?></li>
                                        </ul>
                                        <p><?php echo substr($a_content, 0, 250)."..."; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php 
                    } 
                    ?>

                </div>
                <!-- End masonry box -->
                <div class="text-right">
                    <a href="Articles" class="read-more-button text-right"><i class="fa fa-arrow-circle-right"></i>All Articles</a>
                </div>
            </div>
            <!-- End block content -->

        </div>

    </div>
</div>
<!-- End grid box -->

<div class="grid-box">

    <div class="row">
        <div class="col-md-6">

            <div class="title-section">
                <h1><span>Technology</span></h1>
            </div>

            <ul class="list-posts">
                <li>
                    <img src="public/upload/news-posts/list1.jpg" alt="">
                    <div class="post-content">
                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                pharetra a, ultricies in, diam. </a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div>
                </li>

                <li>
                    <img src="public/upload/news-posts/list2.jpg" alt="">
                    <div class="post-content">
                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                pharetra a, ultricies in, diam. </a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div>
                </li>

                <li>
                    <img src="public/upload/news-posts/list3.jpg" alt="">
                    <div class="post-content">
                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                pharetra a, ultricies in, diam. </a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <img src="public/upload/news-posts/list1.jpg" alt="">
                    <div class="post-content">
                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                pharetra a, ultricies in, diam. </a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="col-md-6">

            <div class="title-section">
                <h1><span>Business</span></h1>
            </div>

            <ul class="list-posts">
                <li>
                    <img src="public/upload/news-posts/list4.jpg" alt="">
                    <div class="post-content">
                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                pharetra a, ultricies in, diam. </a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div>
                </li>

                <li>
                    <img src="public/upload/news-posts/list5.jpg" alt="">
                    <div class="post-content">
                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                pharetra a, ultricies in, diam. </a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div>
                </li>

                <li>
                    <img src="public/upload/news-posts/list6.jpg" alt="">
                    <div class="post-content">
                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                pharetra a, ultricies in, diam. </a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <img src="public/upload/news-posts/list4.jpg" alt="">
                    <div class="post-content">
                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                pharetra a, ultricies in, diam. </a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </div>

</div>

<!-- carousel box -->
<div class="carousel-box owl-wrapper">
    <div class="title-section">
        <h1><span>Gallery</span></h1>
    </div>
    <div class="owl-carousel" data-num="3">

        <div class="item news-post image-post3">
            <img src="public/upload/news-posts/gal1.jpg" alt="">
            <div class="hover-box">
                <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis
                        eros.</a>
                </h2>
                <ul class="post-tags">
                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                </ul>
            </div>
        </div>

        <div class="item news-post image-post3">
            <img src="public/upload/news-posts/gal2.jpg" alt="">
            <div class="hover-box">
                <h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
                <ul class="post-tags">
                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                </ul>
            </div>
        </div>

        <div class="item news-post image-post3">
            <img src="public/upload/news-posts/gal3.jpg" alt="">
            <div class="hover-box">
                <h2><a href="single-post.html">Suspendisse urna nibh.</a></h2>
                <ul class="post-tags">
                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                </ul>
            </div>
        </div>

        <div class="item news-post image-post3">
            <img src="public/upload/news-posts/gal4.jpg" alt="">
            <div class="hover-box">
                <h2><a href="single-post.html">Donec nec justo eget felis facilisis
                        fermentum. Aliquam </a></h2>
                <ul class="post-tags">
                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                </ul>
            </div>
        </div>

        <div class="item news-post image-post3">
            <img src="public/upload/news-posts/gal1.jpg" alt="">
            <div class="hover-box">
                <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis
                        eros.</a>
                </h2>
                <ul class="post-tags">
                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End carousel box -->

</div>
<!-- End block content -->
