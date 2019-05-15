<?php 

// If ecat valiable is shown then content will be show to update existing category
// eg: article.php?eart=1

if(isset($_GET['eart'])){

    // Getting the value of eart variable. ecat variable hold the values of the id of a specific article
    $eart_id = $_GET['eart'];

    // Calling displaySingleArticle method of Article class
    $displaySingleArticle = $article->displaySingleArticle($eart_id);

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
    <form action="../controllers/articleController.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Article Title</label>
            <input type="text" class="form-control" name="a_title" value="<?php echo $a_title ;?>">
        </div>
        <div class="form-group">
            <label>Article Tags</label>
            <input type="text" class="form-control" name="a_tags" value="<?php echo $a_tags ;?>">
        </div>
        <div class="form-group">
            <label>Article Category ID</label>
            <input type="text" class="form-control" name="a_cat_id" value="<?php echo $a_cat_id ;?>">
        </div>
        <div class="form-group">
            <label>Article Author</label>
            <input type="text" class="form-control" name="a_author" value="<?php echo $a_author ;?>">
        </div>
        <div class="form-group">
            <label>Article Status</label>
            <select class="form-control" name="a_status">

                <?php 
                switch($a_status){

                    case 'Published': echo "<option value='Drafted' selected>Draft</option>
                                            <option>Publish</option>"; 
                                            break; 

                    case 'Drafted'  : echo "<option selected>Publish</option>
                                            <option value='Drafted'>Draft</option>"; 
                                            break; 

                }
                ?>

            </select>
        </div>
        <div class="form-group">
            <img src="../public/upload/articles/<?php echo $a_image; ?>" style="width:200px" class="image-responsove">
        </div>
        <div class="form-group">
            <label>Article Image</label>
            <input type="file" name="a_image" class="form-control">
            <input type="text" name="a_image_name" value="<?php echo $a_image; ?>" hidden>
            <p class="help-block">This image will be displayed with title </p>
        </div>
        <div class="form-group">
            <label>Article Content</label>
            <textarea class="form-control" rows="3" name="a_content"><?php echo $a_content ;?></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="update_article" value="<?php echo $a_id ;?>">Update</button>
    </form>
    <!-- End Displaying specific article [HTML Content] -->

<?php  

    }
    // End of while loop to display specific article

// Else if the eart is not shown and the url is as below, then content will be show to add new category
// eg: articles.php

}else{

?>

    <form action="../controllers/articleController.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Article Title</label>
            <input type="text" class="form-control" placeholder="Basics into Java" name="a_title">
        </div>
        <div class="form-group">
            <label>Article Tags</label>
            <select class="form-control" name="a_tags">
            <?php 
            
            // Calling displayAllCategories method of Category class
            $displayAllCategories = $category->displayAllCategories();

            // Stating while loop to display specific article
            while($row = mysqli_fetch_assoc($displayAllCategories)){
            
            $c_title = $row['cat_title'];
            ?>
                <option><?php echo $c_title; ?></option>
            <?php 
            } 
            ?>
            </select>
        </div>
        <div class="form-group">
            <label>Article Category ID</label>
            <input type="text" class="form-control" placeholder="1" name="a_cat_id">
        </div>
        <div class="form-group">
            <label>Article Author</label>
            <input type="text" class="form-control" placeholder="John Doe" name="a_author">
        </div>
        <div class="form-group">
            <label>Article Status</label>
            <select class="form-control" name="a_status">
                <option value="Drafted" selected>Draft</option>
                <option>Publish</option>
            </select>
        </div>
        <div class="form-group">
            <label>Article Image</label>
            <input type="file" name="a_image" class="form-control">
            <p class="help-block">This image will be displayed with title </p>
        </div>
        <div class="form-group">
            <label>Article Content</label>
            <textarea class="form-control" rows="3" name="a_content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="add_new_article">Submit</button>
    </form>

<?php
}
// End of displaying add new article content
?>