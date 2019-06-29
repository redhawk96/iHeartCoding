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
                        <h1><span>Articles</span></h1>
                    </div>

                    <?php 

                    // Variable page is initialized in Articles.php according to user request

                    $per_page = 5;

                    if($page == "" || $page == 1){
                        // If page has either an empty or page equals 1, then the page no is 1
                        // The records will display from 0th row
                        $start_from = 0;
                    }else{
                        // If page is not 1, then following calculation will execute
                        // When using LIMIT functionality in mysql, is has a option to receive two paramaters
                        // One parameter mentions where to display from
                        // Other parameter specifies how many rows from fist parameter
                        // Eg: LIMIT 2,5
                        // This means five rows starting from 2nd row
                        // Below calculates, if page is 2, then 2*5=10, 10-5=5.
                        // Meaning 5 more rows starting from 5th row
                        // Eg: if page is 3, then 3*5=15, 15-5=10. Then 3rd page will have five more rows displaying from 10th row 
                        $start_from = ($page * $per_page)-$per_page;
                    }

                    // Getting total published article count
                    $publishedArticleCount = $article->displayAllPublishedArticleCount();
                    // Rounding up to the highest after dividing it from the number of rows that needs to be displayed in a single page
                    $publishedArticleCount = ceil($publishedArticleCount/$per_page);

                    // Calling displayAllPublishedArticlesWithPagination method of Article class
                    $displayAllPublishedArticlesWithPagination = $article->displayAllPublishedArticlesWithPagination($start_from, $per_page);

                    // Stating while loop to display all categories
                    while($row = mysqli_fetch_assoc($displayAllPublishedArticlesWithPagination)){
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
                                <a href="/iHeartCoding/Article/<?php echo $a_id; ?>/<?php echo preg_replace('/\s+/', '-', $a_title) ?>">
                                    <div class="post-gallery">
                                        <img alt="" src="<?php echo "/iHeartCoding/public/upload/articles/".$a_image; ?>">
                                    </div>
                                </a>
                                </div>
                                <div class="col-sm-8">
                                    <div class="post-content">
                                        <h2><a href="/iHeartCoding/Article/<?php echo $a_id; ?>/<?php echo preg_replace('/\s+/', '-', $a_title) ?>"><?php echo $a_title; ?></a>
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i><?php echo date('M j Y', strtotime($a_date)); ?></li>
                                            <li><i class="fa fa-user"></i>by <a href="/iHeartCoding/Author/<?php echo $a_author; ?>"><?php echo $a_author; ?></a></li>
                                            <li><i class="fa fa-comments-o"></i><span><?php echo $a_com_count; ?></span></li>
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
            </div>
            <!-- End block content -->

            <!-- pagination box -->
            <div class="pagination-box">
                <ul class="pagination-list">
                    <?php

                        for ($i=1; $i<=$publishedArticleCount; $i++) {
                        
                            if($page == $i){
                                $class="active";
                            }else{
                                $class="";
                            }
                           echo "<li><a class='{$class}' href='/iHeartCoding/Articles/Page/{$i}'>{$i}</a></li>";
                        }
                    ?>
                    <!-- <li><a href="#">Next</a></li> -->
                </ul>
                <p>Page <?php echo $page." of ".$publishedArticleCount ?></p>
            </div>
            <!-- End pagination box -->

        </div>

    </div>
</div>
<!-- End grid box -->

</div>
<!-- End block content -->
