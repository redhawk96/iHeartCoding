<?php ob_start(); ?>

<?php
// Including Category model
include '../models/category.php';

// Creating a object of Category class
$category = new Category();

// To add new category
if(isset($_POST['add_category'])){

    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)){
    
        echo "Required firlds are missing";
    
    }else{
        
        $addCategory = $category->addCategory($cat_title);

        if(!$addCategory){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/categories.php');
        }
    }
}

// To update existing category
if(isset($_POST['update_category'])){

    $cat_id = $_POST['update_category'];
    $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
        
            echo "Required firlds are missing";
        
        }else{

        $updateCategory = $category->updateCategory($cat_id, $cat_title);

        if(!$updateCategory){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/categories.php');
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
        header('Location: ../Admin/categories.php');
    }

}


?>