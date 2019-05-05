<?php ob_start(); ?>

<?php

include "../models/db.php";
$dbConnection = new DBConnect();
$serverConnection = $dbConnection->connectToServer();

// Adding Category
if(isset($_POST['add_category'])){

    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)){
    
        echo "Required firlds are missing";
    
    }else{
        $query = "INSERT INTO categories (cat_title) VALUES ('{$cat_title}')";

        $createCategoryQuery = mysqli_query($serverConnection, $query);

        if(!$createCategoryQuery){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/categories.php');
        }
    }
}

// Deleting Category
if(isset($_POST['delete_category'])){

    $cat_id = $_POST['delete_category'];

    $query = "DELETE FROM categories WHERE categories.cat_id = {$cat_id}";

    $deleteCategoryQuery = mysqli_query($serverConnection, $query);

    if(!$deleteCategoryQuery){
        die('QUERY FAILED '. mysqli_error($serverConnection));
    }else{
        header('Location: ../Admin/categories.php');
    }

}


// Updating Category
if(isset($_POST['update_category'])){

    $cat_id = $_POST['update_category'];
    $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
        
            echo "Required firlds are missing";
        
        }else{

        $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE categories.cat_id = {$cat_id}";

        $updateCategoryQuery = mysqli_query($serverConnection, $query);

        if(!$updateCategoryQuery){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/categories.php');
        }
    }

}

?>