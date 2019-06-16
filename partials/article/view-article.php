<?php 

$decoded_url = urldecode("$_SERVER[REQUEST_URI]");

$a_id = null;

foreach (explode('&', $decoded_url) as $chunk) {
    $param = explode("=", $chunk);

    if ($param) {
        $a_id = urldecode($param[1]);
    }
}

if(isset($a_id)){

    echo "<script src='https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js'></script>";

    // Updating article view count
    $article->updateArticleViews($a_id);

    // Calling displaySingleArticle method of Article class
    $displaySingleArticle = $article->displaySingleArticle($a_id);

    // Stating while loop to display specific article
    while($row = mysqli_fetch_assoc($displaySingleArticle)){
    
    $a_id = $row['article_id'];
    $a_cat_id = $row['article_category_id'];
    $a_title = $row['article_title'];
    $a_author = $row['article_author'];
    $author_id = $row['author_id'];
    $a_image = $row['article_image'];
    $a_com_count = $row['article_comment_count'];
    $a_content = $row['article_content'];
    $a_tags = $row['article_tags'];
    $a_status = $row['article_status'];
    $a_date = $row['article_date'];
    $a_view_count = $row['article_view_count'];  

?>

    <!-- Displaying specific article [HTML Content] -->
    <div class="block-content">

    <!-- single-post box -->
    <div class="single-post-box">

        <div class="title-post">
            <h1><?php echo $a_title; ?></h1>
            <ul class="post-tags">
                <li><i class="fa fa-clock-o"></i><?php echo date('M j Y', strtotime($a_date)); ?></li>
                <li><i class="fa fa-user"></i>by <a href="Articles?Author=<?php echo $author_id; ?>"><?php echo $a_author; ?></a></li>
                <li><a href="#"><i class="fa fa-comments-o"></i><span><?php echo $a_com_count; ?></span></a></li>
                <li><i class="fa fa-eye"></i><?php echo $a_view_count; ?></li>
            </ul>
        </div>

        <div class="share-post-box">
            <ul class="share-box">
                <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a></li>
                <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i><span></span></a></li>
            </ul>
        </div>

        <div class="post-gallery">
            <img src="public/upload/articles/<?php echo $a_image; ?>" alt="">
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
                        <img src="public/upload/users/avatar1.jpg" alt="">
                        <div class="autor-content">
                            <div class="autor-title">
                                <h1><span><?php echo $a_author; ?></span><a href="autor-details.html">18 Posts</a></h1>
                                <ul class="autor-social">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
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

    }
    // End of displaying specific article

// Else if a is not shown and the url is as below, then will be redirected to homepage
// eg: Article?a=1

}else{

    header('Location: /iHeartCoding/');

}
// End of displaying add new article content
?>