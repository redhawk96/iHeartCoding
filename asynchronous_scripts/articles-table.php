<?php
include "../models/db.php";

include '../models/article.php';

$article = new Article();

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
    
    $action = 'publish_article';
    $icon = 'export';
    $btn_name = 'Publish';

    if($a_status == 'Published') {
        $action = 'draft_article';
        $icon = 'import';
        $btn_name = 'Draft';
    }

    $article_data[] = array(
        'Id' =>  "<input class='checkBoxes' type='checkbox' name='articleIdCheckBoxArray[]' value='$a_id'>",
        'Author' => "<a href='Articles?Author=$author_id'>$a_author</a>",
        'Title' => "<a href='/iHeartCoding/Article?a=$a_id'>$a_title</a>",
        'Status' =>  "$a_status",
        'Image' => "<a class='image-popup-no-margins' href='../public/upload/articles/$a_image'><img class='img-fluid' src='../public/upload/articles/$a_image' width='50'></a><input class='checkBoxes' type='checkbox' name='articleImagCheckBoxArray[]' value='$a_image' checked hidden>",
        'Tags' => ".$a_tags.",
        'Comments' => "<a href='Article-Comments?a=$a_id'>$a_com_count</a>",
        'Views' => "$a_view_count",
        'Date' => date('M j Y | h:i A', strtotime($a_date)),
        'Action' => "<form action='../controllers/articleController.php' method='POST'><button type='submit' class='btn btn-outline-secondary btn-sm' name='$action' value='$a_id'><i class='ti-$icon pr-1'></i> $btn_name</button></form>",
        'edit' => "<a href='Publish-Article?eart=$a_id' class='btn btn-outline-warning btn-sm'><i class='ti-pencil-alt pr-1'></i> Edit</a>",
        'delete' => "<button type='button' class='btn btn-outline-danger btn-sm waves-effect waves-light sa-delete-article' id_ref='$a_id' img_ref='$a_image'><i class='ti-trash pr-1'></i> Delete</button>",
        'reset' => "<form action='../controllers/articleController.php' method='POST'><button type='submit' onclick='javascript: return confirm('Are you sure you want to reset view count?');' class='btn btn-outline-dark btn-sm' name='reset_view_count' value='$a_id'><i class='ti-eraser pr-1'></i> Rest</button></form>"
    );
}

$myJSON = json_encode(array('data' => $article_data));

echo $myJSON;

?>
