<?php ob_start(); ?>

<?php
// Including Database model
include '../models/db.php';

// Including Comment model
include '../models/comment.php';

// Creating a object of Comment class
$comment = new Comment();

// To add comment
if(isset($_POST['add_comment'])){

    $a_id = $_POST['add_comment'];
    $parent_c_id = $_POST['p_id'];
    $c_author = $_POST['c_author'];
    $c_mail = $_POST['c_mail'];
    $c_content = $_POST['c_content'];

    // echo $a_id;
    

    if($a_id == "" || empty($a_id) || $c_author == "" || empty($c_author) || $c_mail == "" || empty($c_mail) || $c_content == "" || empty($c_content)){
    
        header('Location: ../Article?a='.$a_id.'&c=false');
    
    }else{

        $addComment = $comment->addComment($a_id, 0, $c_author, $c_mail, $c_content);

        if(!$addComment){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Article?a='.$a_id.'&c=true');
        }
    }
}

// To update existing article
if(isset($_POST['update_comment'])){

    $c_id = $_POST['update_comment'];
    $p_com_id = $_POST['p_com_id'];
    $a_id = $_POST['a_id'];
    $c_author = $_POST['c_author'];
    $c_mail = $_POST['c_mail'];
    $c_content = $_POST['c_content'];


    if($c_id == "" || empty($c_id) || $a_id == "" || empty($a_id) || $c_author == "" || empty($c_author) || $c_mail == "" || empty($c_mail) || $c_content == "" || empty($c_content)){
    
        header('Location: ../Admin/edit-comment?ec='.$c_id.'&u=false');
    
    }else{
        $updateComment = $comment->updateComment($c_id, $p_com_id, $a_id, $c_author, $c_mail, $c_content);
        
        if(!$updateComment){
            die('QUERY FAILED '. mysqli_error($serverConnection));
            
        }else{
            
            header('Location: ../Admin/comments');
        }
    }
}

// To dismiss comment
if(isset($_POST['approve_comment'])){

    $c_id = $_POST['approve_comment'];
    $a_id = $_POST['a_id'];

        if($c_id == "" || empty($c_id)){
        
            header('Location: ../Admin/comments?a=false');
        
        }else{

        $approveComment = $comment->approveComment($c_id, $a_id);

        if(!$approveComment){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/comments');
        }
    }
}

// To approve comment
if(isset($_POST['dismiss_comment'])){

    $c_id = $_POST['dismiss_comment'];
    $a_id = $_POST['a_id'];

        if($c_id == "" || empty($c_id)){
        
            header('Location: ../Admin/comments?a=false');
        
        }else{

        $dismissComment = $comment->dismissComment($c_id, $a_id);

        if(!$dismissComment){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/comments');
        }
    }
}

// To delete existing comment
if(isset($_POST['delete_comment'])){
    
    $c_id = $_POST['delete_comment'];
    
    $deleteComment = $comment->deleteComment($c_id);

    if(!$deleteComment){
        
        die('QUERY FAILED '. mysqli_error($serverConnection));
    }else{
        header('Location: ../Admin/comments');
    }
}
?>
