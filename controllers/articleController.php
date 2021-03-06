<?php ob_start(); ?>

<?php
// Including Database model
include '../models/db.php';

// Including Article model
include '../models/article.php';

// Creating a object of Article class
$article = new Article();

// To add new article
if(isset($_POST['add_new_article'])){
    
    $a_title = $_POST['a_title'];
    $a_tags = $_POST['a_tags'];
    $a_cat_id = $_POST['a_cat_id'];
    $a_author = $_POST['a_author'];
    $a_status = $_POST['a_status'];

    // Getting image name 
    $a_image = $_FILES["a_image"]["name"];

    // Getting temporay image name
    $a_image_temp = $_FILES['a_image']['tmp_name'];

    // Getting image extention
    $a_image_extension = end(explode(".", $a_image));

    // Renaming the image with unique number and changing the imge extention to png
    $a_image_final = round(microtime(true)) ."."."png";

    $a_content = $_POST['a_content'];
    
    if($a_title == "" || empty($a_title) || $a_tags == "" || empty($a_tags) || $a_cat_id == "" || empty($a_cat_id) || $a_author == "" || empty($a_author) || $a_status == "" || empty($a_status) || $a_content == "" || empty($a_content)){
    
        header('Location: /iHeartCoding/Admin/Article/Add?false');
    
    }else{
        $addArticle = $article->addArticle($a_cat_id, $a_title, $a_author, $a_image_final, $a_content, $a_tags, $a_status);
        if(!$addArticle){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            // If update query was successful then image will be moved into the server
            move_uploaded_file($a_image_temp, "../public/upload/articles/$a_image_final");
            header('Location: ../Admin/articles.php');
        }
    }
}

// To update existing article
if(isset($_POST['update_article'])){

    $a_id = $_POST['update_article'];
    $a_title = $_POST['a_title'];
    $a_tags = $_POST['a_tags'];
    $a_cat_id = $_POST['a_cat_id'];
    $a_author = $_POST['a_author'];
    $a_status = $_POST['a_status'];
    $a_image_name = $_POST['a_image_name'];

    // Getting image name 
    $a_image = $_FILES["a_image"]["name"];

    // Getting temporay image name
    $a_image_temp = $_FILES['a_image']['tmp_name'];

    // Getting image extention
    $a_image_extension = end(explode(".", $a_image));
    
    // Renaming the image with previous name
    $a_image_final = $a_image_name;

    $a_content = $_POST['a_content'];

    if($a_title == "" || empty($a_title) || $a_tags == "" || empty($a_tags) || $a_cat_id == "" || empty($a_cat_id) || $a_author == "" || empty($a_author) || $a_status == "" || empty($a_status) || $a_content == "" || empty($a_content)){
    
        header('Location: ../Admin/publish-article?a=false');
    
    }else{
        $updateArticle = $article->updateArticle($a_id, $a_cat_id, $a_title, $a_author, $a_image_final, $a_content, $a_tags, $a_status);
        if(!$updateArticle){
            die('QUERY FAILED '. mysqli_error($serverConnection));
            
        }else{
            // If update query was successful then image will be moved into the server
            move_uploaded_file($a_image_temp, "../public/upload/articles/$a_image_final");
            
            header('Location: ../Admin/articles');
        }
    }
}

// To publish article
if(isset($_POST['publish_article'])){

    $a_id = $_POST['publish_article'];

        if($a_id == "" || empty($a_id)){
        
            header('Location: ../Admin/articles?p=false');
        
        }else{

        $publishArticle = $article->publishArticle($a_id);

        if(!$publishArticle){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/articles');
        }
    }
}

// To draft article
if(isset($_POST['draft_article'])){

    $a_id = $_POST['draft_article'];

        if($a_id == "" || empty($a_id)){
        
            header('Location: /iHeartCoding/Admin/Articles/View?Draft-false');
        
        }else{

        $draftArticle = $article->draftArticle($a_id);

        if(!$draftArticle){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }
    }
}

// To delete existing article
if(isset($_POST['delete_article'])){
    
    $a_id = $_POST['delete_article'];
    $a_image_name = $_POST['a_image_name'];
    
    $deleteArticle = $article->deleteArticle($a_id);

    if(!$deleteArticle){ 
        die('QUERY FAILED '. mysqli_error($serverConnection));
    }else{
        // Deleting image from the server for the specific artice
        unlink("/iHeartCoding/public/upload/articles/".$a_image_name);
    }
}

// To apply bulk selection [approve / dismiss / delete]
if(isset($_POST['bulk_apply'])){

    $bulk_option = $_POST['bulk_option'];

    $articleIds = $_POST['articleIdCheckBoxArray'];
    $articleImages = $_POST['articleImagCheckBoxArray'];

    switch ($bulk_option) {
        case 'Publish':
            foreach($articleIds as  $articleId) {
                $article->publishArticle($articleId);
            }
            break;
        
        case 'Draft':
            foreach($articleIds as  $articleId) {
                $article->draftArticle($articleId);
            }
            break;

        case 'Reset':
            foreach($articleIds as  $articleId) {
                $article->resetArticleViews($articleId);
            }
            break;

        case 'Delete':
            foreach($articleIds as $index => $articleId ) {
                    $article->deleteArticle($articleId);
                    unlink("../public/upload/articles/".$articleImages[$index]);
            }
            break;
            
    }

    header('Location: ../Admin/articles');
}

// To reset existing article views
if(isset($_POST['reset_view_count'])){
    
    $a_id = $_POST['reset_view_count'];
    
    $resetArticleViews = $article->resetArticleViews($a_id);

    if(!$resetArticleViews){
        
        die('QUERY FAILED '. mysqli_error($serverConnection));
    }
}
?>