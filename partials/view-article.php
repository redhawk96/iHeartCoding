<?php 

// If ecat valiable is shown then content will be show to update existing category
// eg: article.php?e=1

if(isset($_GET['a'])){

    // Getting the value of eart variable. ecat variable hold the values of the id of a specific article
    $a_id = $_GET['a'];

    // Calling displayOneArticle method of Article class
    $displayOneArticle = $article->displayOneArticle($a_id);

    // Stating while loop to display specific article
    while($row = mysqli_fetch_assoc($displayOneArticle)){
    
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

        <div class="post-tags-box">
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
        <div class="contact-form-box">
            <div class="title-section">
                <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
            </div>
            <form id="comment-form">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Name*</label>
                        <input id="name" name="name" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="mail">E-mail*</label>
                        <input id="mail" name="mail" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="website">Website</label>
                        <input id="website" name="website" type="text">
                    </div>
                </div>
                <label for="comment">Comment*</label>
                <textarea id="comment" name="comment"></textarea>
                <button type="submit" id="submit-contact">
                    <i class="fa fa-comment"></i> Post Comment
                </button>
            </form>
        </div>
        <!-- End contact form box -->

    </div>
    <!-- End single-post box -->

</div>
    <!-- End Displaying specific article [HTML Content] -->

<?php  

    }
    // End of while loop to display specific article

// Else if the eart is not shown and the url is as below, then content will be show to add new category
// eg: articles.php

}else{

?>



<?php
}
// End of displaying add new article content
?>