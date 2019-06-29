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

                    // Calling displaySearchedeArticles method of Article class
                    $displaySearchedArticleCount = $article->displaySearchedeArticleCount($search_keyword);

                    if($displaySearchedArticleCount == 0){

                        echo "No results found";

                    }else{
                        // Calling displayAllArticles method of Article class
                        $displaySearchedArticles = $article->displaySearchedeArticles($search_keyword);

                        
                        // Stating while loop to display all categories
                        while($row = mysqli_fetch_assoc($displaySearchedArticles)){
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
                                    <a href="/iHeartCoding/Article/<?php echo $a_id; ?>/<?php echo preg_replace('/\s+/', '-', $a_title) ?>">
                                        <div class="post-gallery">
                                            <img alt="<?php echo $a_image ?>" src="<?php echo "/iHeartCoding/public/upload/articles/".$a_image; ?>">
                                        </div>
                                    </a>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="post-content">
                                            <h2> <a href="/iHeartCoding/Article/<?php echo $a_id; ?>/<?php echo preg_replace('/\s+/', '-', $a_title) ?>"><?php echo $a_title; ?></a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i><?php echo date('M j Y', strtotime($a_date)); ?></li>
                                                <li><i class="fa fa-user"></i>by <a href="/iHeartCoding/Author/<?php echo $a_author; ?>/Articles"><?php echo $a_author; ?></a></li>
                                                <li><i class="fa fa-comments-o"></i><span><?php echo $a_com_count; ?></span></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                            <p><?php echo substr($a_content, 0, 250)."..."; ?></p>
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
