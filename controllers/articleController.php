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
    $a_com_count = 1;
    
    if($a_title == "" || empty($a_title) || $a_tags == "" || empty($a_tags) || $a_cat_id == "" || empty($a_cat_id) || $a_author == "" || empty($a_author) || $a_status == "" || empty($a_status) || $a_content == "" || empty($a_content)){
    
        header('Location: ../Admin/publish-article.php?a=false');
    
    }else{
        $addArticle = $article->addArticle($a_cat_id, $a_title, $a_author, $a_image_final, $a_content, $a_tags, $a_com_count, $a_status);
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
    $a_com_count = 1;

    if($a_title == "" || empty($a_title) || $a_tags == "" || empty($a_tags) || $a_cat_id == "" || empty($a_cat_id) || $a_author == "" || empty($a_author) || $a_status == "" || empty($a_status) || $a_content == "" || empty($a_content)){
    
        header('Location: ../Admin/publish-article.php?a=false');
    
    }else{
        $updateArticle = $article->updateArticle($a_id, $a_cat_id, $a_title, $a_author, $a_image_final, $a_content, $a_tags, $a_com_count, $a_status);
        if(!$updateArticle){
            die('QUERY FAILED '. mysqli_error($serverConnection));
            
        }else{
            // If update query was successful then image will be moved into the server
            move_uploaded_file($a_image_temp, "../public/upload/articles/$a_image_final");
            
            header('Location: ../Admin/articles.php');
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
        unlink("../public/upload/articles/".$a_image_name);
        header('Location: ../Admin/articles.php');
    }
}
?>