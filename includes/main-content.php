<?php

if(isset($_POST['search_btn'])){

    $search_keyword = $_POST['search_keyword'];
    
?>

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
                            <h1><span>Search Results</span></h1>
                        </div>

                        <?php 

                        $dbConnection = new DBConnect();
                        $serverConnection = $dbConnection->serverInstance();
            
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search_keyword%' OR post_title LIKE '%$search_keyword%' ORDER BY posts.post_date DESC LIMIT 3";
                        $selectQuery = mysqli_query($serverConnection, $query);

                        $rowCount = mysqli_num_rows($selectQuery);

                        if($rowCount == 0){
                        ?>

                            <h5>No results found</h5>

                        <?php

                        }else{
                        
                            while($row = mysqli_fetch_assoc($selectQuery)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
                                $post_comment_count = $row['post_comment_count'];
                            ?>

                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="post-gallery">
                                                <img alt="" src="<?php echo $post_image; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="post-content">
                                                <h2><a href="single-post.html"><?php echo $post_title; ?></a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i><?php echo date('M j Y', strtotime($post_date)); ?></li>
                                                    <li><i class="fa fa-user"></i>by <a href="#"><?php echo $post_author; ?></a></li>
                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span><?php echo $post_comment_count; ?></span></a></li>
                                                    <li><i class="fa fa-eye"></i>872</li>
                                                </ul>
                                                <p><?php echo substr($post_content, 0, 250)."..."; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php 
                            } 
                        }
                        ?>

                    </div>
                    <!-- End masonry box -->

                    <!-- pagination box -->
                    <div class="pagination-box">
                        <ul class="pagination-list">
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><span>...</span></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                        <p>Page 1 of 9</p>
                    </div>
                    <!-- End pagination box -->



                </div>
                <!-- End block content -->

            </div>

        </div>
    </div>
    <!-- End grid box -->

    </div>
    <!-- End block content -->


<?php
}

else{
?>

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

                        $dbConnection = new DBConnect();
                        $serverConnection = $dbConnection->serverInstance();
            
                        $query = "SELECT * FROM posts ORDER BY posts.post_date DESC LIMIT 3";
                        $selectQuery = mysqli_query($serverConnection, $query);
                        
                        while($row = mysqli_fetch_assoc($selectQuery)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_tags = $row['post_tags'];
                            $post_comment_count = $row['post_comment_count'];
                        ?>

                            <div class="news-post article-post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="post-gallery">
                                            <img alt="" src="<?php echo $post_image; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="post-content">
                                            <h2><a href="single-post.html"><?php echo $post_title; ?></a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i><?php echo date('M j Y', strtotime($post_date)); ?></li>
                                                <li><i class="fa fa-user"></i>by <a href="#"><?php echo $post_author; ?></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span><?php echo $post_comment_count; ?></span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                            <p><?php echo substr($post_content, 0, 250)."..."; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php 
                        } 
                        ?>

                    </div>
                    <!-- End masonry box -->

                    <!-- pagination box -->
                    <div class="pagination-box">
                        <ul class="pagination-list">
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><span>...</span></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                        <p>Page 1 of 9</p>
                    </div>
                    <!-- End pagination box -->



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

<?php
}
?>