<?php 
ob_start(); 
session_start();
?>

<?php
// Including Database model
include '../models/db.php';

// Including Comment model
include '../models/comment.php';

// Creating a object of Comment class
$comment = new Comment();

$user_type = $_SESSION['u_type'];

// To add comment
if(isset($_POST['add_comment'])){

    $a_id = $_POST['add_comment'];
    $parent_c_id = $_POST['p_id'];
    $c_author = $_POST['c_author'];
    $c_mail = $_POST['c_mail'];
    $c_content = $_POST['c_content'];
    $a_title = $_POST['article_title'];

    // echo $a_id;
    

    if($a_id == "" || empty($a_id) || $c_author == "" || empty($c_author) || $c_mail == "" || empty($c_mail) || $c_content == "" || empty($c_content)){
    
        header('Location: /iHeartCoding/Article/'.$a_id.'/'.preg_replace('/\s+/', '-', $a_title));
    
    }else{

        $addComment = $comment->addComment($a_id, 0, $c_author, $c_mail, $c_content);

        if(!$addComment){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: /iHeartCoding/Article/'.$a_id.'/'.preg_replace('/\s+/', '-', $a_title));
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
            
            switch($user_type){
                case 'Administrator' : header('Location: /iHeartCoding/Admin/Comments'); break;
                case 'Moderator' : header('Location: /iHeartCoding/Mod/Comments'); break;
            }
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
            switch($user_type){
                case 'Administrator' : header('Location: /iHeartCoding/Admin/Comments'); break;
                case 'Moderator' : header('Location: /iHeartCoding/Mod/Comments'); break;
            }
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
            switch($user_type){
                case 'Administrator' : header('Location: /iHeartCoding/Admin/Comments'); break;
                case 'Moderator' : header('Location: /iHeartCoding/Mod/Comments'); break;
            }
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
        switch($user_type){
            case 'Administrator' : header('Location: /iHeartCoding/Admin/Comments'); break;
            case 'Moderator' : header('Location: /iHeartCoding/Mod/Comments'); break;
        }
    }
}

// To apply bulk selection [approve / dismiss / delete]
if(isset($_POST['bulk_apply'])){

    $bulk_option = $_POST['bulk_option'];

    $commentIds = $_POST['commentIdCheckBoxArray'];
    $articleIds = $_POST['articleIdCheckBoxArray'];
    
    switch ($bulk_option) {
        case 'Approve':
            foreach($articleIds as $index => $articleId) {
                $comment->approveComment($commentIds[$index], $articleId);
            }
            break;
        
        case 'Dismiss':
            foreach($articleIds as $index => $articleId ) {
                $comment->dismissComment($commentIds[$index], $articleId);
            }
            break;

        case 'Delete':
            foreach($commentIds as  $commentId) {
                $comment->deleteComment($commentId);
            }
            break;
    }

    switch($user_type){
        case 'Administrator' : header('Location: /iHeartCoding/Admin/Comments'); break;
        case 'Moderator' : header('Location: /iHeartCoding/Mod/Comments'); break;
    }
}
?>
