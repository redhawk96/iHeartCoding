<?php
include "../models/db.php";

include '../models/article.php';
include '../models/user.php';

$article = new Article();
$user = new User();

$article_data = array();

$displayAllArticles = $article->displayAllArticles();

while($row = mysqli_fetch_assoc($displayAllArticles)){

    $a_id = $row['article_id'];
    $a_author = $row['article_author'];
    $author_id = $row['author_id'];
    $a_title = $row['article_title'];
    $a_status = $row['article_status'];
    $a_image = $row['article_image'];
    $a_tags = $row['article_tags'];
    $a_com_count = $row['article_comment_count'];
    $a_view_count = $row['article_view_count']; 
    $a_date = $row['article_date'];
    
    $icon = "export";
    $btn_name = "Publish";
    $ajax_req_btn_class_name = "publish";
    $btn_color = "info";

    if($a_status == 'Published') {
        $icon = "import";
        $btn_name = "Draft";
        $ajax_req_btn_class_name = "draft";
        $btn_color = "secondary";
    }

    $displaySingleUser = $user->displaySingleUser($author_id);
              
    $user_image = null;
    
    while($row = mysqli_fetch_assoc($displaySingleUser)){
        $user_image = $row['user_image'];
    }

    $article_data[] = array(
        'Id' =>  "<input class='checkBoxes' type='checkbox' name='articleIdCheckBoxArray[]' value='$a_id'>",
        'Author' => "<a class='image-popup-no-margins pr-3' href='/iHeartCoding/public/upload/users/$user_image'><img class='img-fluid rounded-circle' alt='$user_image' src='/iHeartCoding/public/upload/users/$user_image' width='35'></a><a href='/iHeartCoding/Admin/Articles/Author/$author_id'>$a_author</a>",
        'Title' => "<a href='/iHeartCoding/Article/$a_id/".preg_replace('/\s+/', '-', $a_title)."'>$a_title</a>",
        'Status' =>  "$a_status",
        'Image' => "<a class='image-popup-no-margins' href='/iHeartCoding/public/upload/articles/$a_image'><img class='img-fluid' src='/iHeartCoding/public/upload/articles/$a_image' width='50'></a><input class='checkBoxes' type='checkbox' name='articleImagCheckBoxArray[]' value='$a_image' checked hidden>",
        'Tags' => ".$a_tags.",
        'Comments' => "<a href='/iHeartCoding/Admin/Article-Comments.php?a=$a_id'>$a_com_count</a>",
        'Views' => "$a_view_count",
        'Date' => date('M j Y | h:i A', strtotime($a_date)),
        'Action' => "<button type='button' class='btn btn-outline-$btn_color btn-sm waves-effect waves-light sa-$ajax_req_btn_class_name-article' id_ref='$a_id'><i class='ti-$icon pr-1'></i> $btn_name</button>",
        'edit' => "<a href='/iHeartCoding/Admin/Article/Edit/$a_id' class='btn btn-outline-warning btn-sm'><i class='ti-pencil-alt pr-1'></i> Edit</a>",
        'delete' => "<button type='button' class='btn btn-outline-danger btn-sm waves-effect waves-light sa-delete-article' id_ref='$a_id' img_ref='$a_image'><i class='ti-trash pr-1'></i> Delete</button>",
        'reset' => " <button type='button' class='btn btn-outline-dark btn-sm waves-effect waves-light sa-reset-article-views' id_ref='$a_id'><i class='ti-eraser pr-1'></i> Rest</button>"
    );
}

$myJSON = json_encode(array('data' => $article_data));

echo $myJSON;

?>
