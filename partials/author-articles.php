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

                    <?php

                    $displaySingleUser = $user->displaySingleUser($author_id);

                    // Stating while loop to display all authod details
                    while($row = mysqli_fetch_assoc($displaySingleUser)){
                        $username = $row['username'];
                        $u_first_name = $row['user_firstName'];
                        $u_last_name = $row['user_lastName'];
                        $u_email = $row['user_email'];
                        $u_image = $row['user_image'];
                        $u_role = $row['user_role'];
                        $u_status = $row['user_status'];
                        $u_reg_date = $row['user_reg_date'];
                        $about_user = $row['user_description'];
                        $u_fb = $row['user_facebook_link'];
                        $u_youtube = $row['user_youtube_link'];
                        $u_linkedin = $row['user_linkedin_link'];
                        $u_website = $row['user_website'];

                    ?>

                    <ul class="autor-list">
                        <li>
                            <div class="autor-box" onclick="location.href = 'Author?A=<?php echo $author_id ?>';" style="cursor:pointer !important">

                            <img src="public/upload/users/<?php echo $u_image ?>">

                            <div class="autor-content">

                                <div class="autor-title">
                                    <h1><span><?php echo $u_first_name." ".$u_last_name; ?></span>18 Posts</h1>
                                    <ul class="autor-social">
                                        <li><a href="<?php echo $u_fb; ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo $u_youtube; ?>" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="<?php echo $u_linkedin; ?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <p><?php echo $about_user ?></p>

                            </div>

                            </div>


                            <div class="autor-last-line">
                                <ul class="autor-tags">
                                    <li><span><i class="fa fa-bars"></i>Category</span></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Politics</a></li>
                                    <li><a href="#">Sport</a></li>
                                </ul>
                                <a href="<?php echo $u_website; ?>" class="autor-site"><?php echo $u_website; ?></a>
                            </div>
                        </li>
                    </ul>
                        
                    
                    <?php
                    }
                    ?>

                    <div class="title-section">
                        <h1><span>Articles</span></h1>
                    </div>

                    <?php 

                        // Calling displayAuthorArticles method of Article class
                        $displayAuthorArticles = $article->displayAuthorArticles($author_id);

                        
                        // Stating while loop to display all categories
                        while($row = mysqli_fetch_assoc($displayAuthorArticles)){
                            $a_id = $row['article_id'];
                            $a_author = $row['article_author'];
                            $a_title = $row['article_title'];
                            $a_category_id = $row['article_category_id'];
                            $a_status = $row['article_status'];
                            $a_image = $row['article_image'];
                            // $a_tags = $row['article_tags'];
                            $a_com_count = $row['article_comment_count'];
                            $a_content = $row['article_content'];
                            $a_date = $row['article_date'];
                        
                        ?>

                            <div class="news-post article-post">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <a href="single-post.php">
                                        <div class="post-gallery">
                                            <img alt="" src="<?php echo "public/upload/articles/".$a_image; ?>">
                                        </div>
                                    </a>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="post-content">
                                            <h2><a href="Article?a=<?php echo $a_id; ?>"><?php echo $a_title; ?></a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i><?php echo date('M j Y', strtotime($a_date)); ?></li>
                                                <li><i class="fa fa-user"></i>by <a href="#"><?php echo $a_author; ?></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span><?php echo $a_com_count; ?></span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
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
