<?php 
ob_start(); 
session_start();
?>

<?php
// Including Database model
include '../models/db.php';

// Including Category model
include '../models/category.php';

// Creating a object of Category class
$category = new Category();

// To add new category
if(isset($_POST['add_category'])){

    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)){
    
        header('Location: /iHeartCoding/Admin/Tags?a=false');
    
    }else{

        $added_by = $_SESSION['u_id'];
        
        $addCategory = $category->addCategory($cat_title, $added_by);

        if(!$addCategory){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: /iHeartCoding/Admin/Tags');
        }
    }
}

// To update existing category
if(isset($_POST['update_category'])){

    $cat_id = $_POST['update_category'];
    $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
        
            header('Location: /iHeartCoding/Admin/Tags?u=false');
        
        }else{

        $updateCategory = $category->updateCategory($cat_id, $cat_title);

        if(!$updateCategory){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: /iHeartCoding/Admin/Tags');
        }
    }

}

// To delete existing category
if(isset($_POST['delete_category'])){

    $cat_id = $_POST['delete_category'];

    $deleteCategory = $category->deleteCategory($cat_id);

    if(!$deleteCategory){
        die('QUERY FAILED '. mysqli_error($serverConnection));
    }else{
        header('Location: /iHeartCoding/Admin/Tags');
    }

}


?>