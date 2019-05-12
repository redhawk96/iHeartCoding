<?php 

// If ecat valiable is shown then content will be show to update existing category
// eg: article.php?e=1

if(isset($_GET['a'])){

    echo "<script src='https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js'></script>";

    // Getting the value of eart variable. ecat variable hold the values of the id of a specific article
    $a_id = $_GET['a'];

    // Calling displaySingleArticle method of Article class
    $displaySingleArticle = $article->displaySingleArticle($a_id);

    // Stating while loop to display specific article
    while($row = mysqli_fetch_assoc($displaySingleArticle)){
    
    $a_id = $row['article_id'];
    $a_cat_id = $row['article_category_id'];
    $a_title = $row['article_title'];
    $a_author = $row['article_author'];
    $a_image = $row['article_image'];
    $a_content = $row['article_content'];
    $a_tags = $row['article_tags'];
    $a_status = $row['article_status'];

?>

    <!-- Displaying specific article [HTML Content] -->
    <div class="block-content">

    <!-- single-post box -->
    <div class="single-post-box">

        <div class="title-post">
            <h1><?php echo $a_title; ?></h1>
            <ul class="post-tags">
                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                <li><i class="fa fa-user"></i>by <a href="#"><?php echo $a_author; ?></a></li>
                <li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li>
                <li><i class="fa fa-eye"></i>872</li>
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
        <?php include "./partials/add-comment.php"; ?>
        <!-- End contact form box -->


        <!-- comments -->
        <?php include "./partials/view-comments.php"; ?>
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