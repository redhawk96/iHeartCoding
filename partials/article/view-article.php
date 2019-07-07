<?php 

if(isset($_GET['a'])){

    $a_id = $_GET['a'];

    echo "<script src='https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js'></script>";

    $article->updateArticleViews($a_id);

    // Calling method to display single publish article
    $displayPublishedSingleArticle = $article->displayPublishedSingleArticle($a_id);

    // Binding db records to variables
    mysqli_stmt_bind_result($displayPublishedSingleArticle, $a_id, $a_cat_id, $a_title, $a_author, $author_id, $a_date, $a_image, $a_content, $a_tags, $a_com_count, $a_status, $a_view_count);

    // Printing out db fetched values in a while loop
    while(mysqli_stmt_fetch($displayPublishedSingleArticle)):
?>

    <!-- Displaying specific article [HTML Content] -->
    <div class="block-content">

    <!-- single-post box -->
    <div class="single-post-box">

        <div class="title-post">
            <h1><?php echo $a_title; ?></h1>
            <ul class="post-tags">
                <li><i class="fa fa-clock-o"></i><?php echo date('M j Y', strtotime($a_date)); ?></li>
                <li><i class="fa fa-user"></i>by <a href="/iHeartCoding/Author/<?php echo $a_author; ?>/Articles"><?php echo $a_author; ?></a></li>
                <li><a href="#"><i class="fa fa-comments-o"></i><span><?php echo $a_com_count; ?></span></a></li>
                <li><i class="fa fa-eye"></i><?php echo $a_view_count; ?></li>
            </ul>
        </div>

        <div class="share-post-box">
            <ul class="share-box">
                <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
                <li><a class="facebook" href="#"><i class="fa fa-facebook" style="color:inherit !important"></i><span>Share on Facebook</span></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin" style="color:inherit !important; "></i><span></span></a></li>
            </ul>
        </div>

        <div class="post-gallery">
            <img src="/iHeartCoding/public/upload/articles/<?php echo $a_image; ?>" alt="">
            <span class="image-caption">Cras eget sem nec dui volutpat ultrices.</span>
        </div>

        <div class="post-content">
            <?php echo $a_content; ?>
        </div>

        <div class="post-tags-box" style="padding:25px 0">
            <ul class="tags-box">
                <li><i class="fa fa-tags"></i><span>Tags:</span></li>
                <li><a href="#"><?php echo $a_tags; ?></a></li>
            </ul>
        </div>

        <div class="about-more-autor">

            <div class="tab-content">

                <div class="tab-pane active" id="about-autor">
                    <div class="autor-box">
                        <img src="/iHeartCoding/public/upload/users/avatar2.jpg" alt="">
                        <div class="autor-content">
                            <div class="autor-title">
                                <h1><span><?php echo $a_author; ?></span><a href="/iHeartCoding/Author/<?php echo $a_author; ?>/Articles">18 Posts</a></h1>
                                <ul class="autor-social">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                            <p>
                                Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam quis massa sit amet nibh viverra malesuada. 
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- contact form box -->
        <?php include "./partials/article/add-comment.php"; ?>
        <!-- End contact form box -->


        <!-- comments -->
        <?php include "./partials/article/view-comments.php"; ?>
        <!-- End of comments -->

    </div>
    <!-- End single-post box -->

</div>
    <!-- End Displaying specific article [HTML Content] -->
    
<?php  

    endwhile;
    // End of while loop

// Else if a is not shown and the url is as below, then will be redirected to homepage
// eg: Article?a=1

}else{

    header('Location: /iHeartCoding/');

}
// End of displaying add new article content
?>