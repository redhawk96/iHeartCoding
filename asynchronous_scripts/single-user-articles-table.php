<?php
include "../models/db.php";

include '../models/article.php';
include '../models/user.php';

$article = new Article();
$user = new User();

$article_data = array();

$u_id = $_GET['user_id'];

$displayAuthorArticles = $article->displayAuthorArticles($u_id);

while($row = mysqli_fetch_assoc($displayAuthorArticles)){
    $a_id = $row['article_id'];
    $a_title = $row['article_title'];
    $author_id = $row['author_id'];
    $a_image = $row['article_image'];
    $a_tags = $row['article_tags'];
    $a_com_count = $row['article_comment_count'];
    $a_status = $row['article_status'];
    $a_date = $row['article_date'];
    $a_view_count = $row['article_view_count']; 
    
    $icon = "export";
    $btn_name = "Publish";
    $ajax_req_btn_class_name = "publish-single-user";
    $btn_color = "info";

    if($a_status == 'Published') {
        $icon = "import";
        $btn_name = "Draft";
        $ajax_req_btn_class_name = "draft-single-user";
        $btn_color = "secondary";
    }

    $article_data[] = array(
        'Title' => "<a href='/iHeartCoding/Article/$a_id/".preg_replace('/\s+/', '-', $a_title)."'>$a_title</a>",
        'Image' => "<a class='image-popup-no-margins' href='/iHeartCoding/public/upload/articles/$a_image'><img class='img-fluid' src='/iHeartCoding/public/upload/articles/$a_image' width='35'></a>",
        'Tags' => "$a_tags",
        'Status' => "$a_status",
        'Views' => "$a_view_count",
        'Comments' => "<a href='/iHeartCoding/Admin/Article-Comments.php?a=$a_id'>$a_com_count</a>",
        'Date' => date('M j Y | h:i A', strtotime($a_date)),
        'Action' => "<button type='button' class='btn btn-outline-$btn_color btn-sm waves-effect waves-light sa-$ajax_req_btn_class_name-article' id_ref='$a_id' auth_ref='$author_id'><i class='ti-$icon pr-1'></i> $btn_name</button>",
        'edit' => "<a href='/iHeartCoding/Admin/Article/Edit/$a_id' class='btn btn-outline-warning btn-sm'><i class='ti-pencil-alt pr-1'></i> Edit</a>",
        'delete' => "<button type='button' class='btn btn-outline-danger btn-sm waves-effect waves-light sa-delete-single-user-article' id_ref='$a_id' img_ref='$a_image' auth_ref='$author_id'><i class='ti-trash pr-1'></i> Delete</button>",
        'reset' => " <button type='button' class='btn btn-outline-dark btn-sm waves-effect waves-light sa-reset-single-user-article-views' id_ref='$a_id' auth_ref='$author_id'><i class='ti-eraser pr-1'></i> Rest</button>"
    );
}

$myJSON = json_encode(array('data' => $article_data));

echo $myJSON;

?>
