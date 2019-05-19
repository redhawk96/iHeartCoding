<?php 

// Calling displayArticleCommentRepyCount to get count of reply comments related to this comment
$displayArticleCommentRepyCount = $comment->displayArticleCommentRepyCount($a_id, $c_id);

// Checking if the reply comment count is less than 0, if not reply comments will be displayed
if($displayArticleCommentRepyCount != 0){

    // Calling displayArticleCommentReplies to display all reply comments related to this comment
    $displayArticleCommentReplies = $comment->displayArticleCommentReplies($a_id, $c_id);

    while($row = mysqli_fetch_assoc($displayArticleCommentReplies)){

        $r_comment_author = $row['comment_author'];
        $r_comment_content = $row['comment_content'];
        $r_comment_date = $row['comment_date'];
    
    ?>

        <!-- Reply Comment -->
        <div class="table-row" style="margin-left:30px">
            <div class="forum-post comment-post" style="padding-right:2px">
                <img class="img-avatar" src="public/upload/users/<?php echo $c_avatar; ?>">
                <div class="post-autor-date">
                    <p>by: <a href="#"><?php echo $r_comment_author; ?></a></p>
                    <p><span class="date">ON  <?php echo date('M j Y', strtotime($r_comment_date));; ?></span></p>
                    <div class="content-post-area">
                    <?php echo $r_comment_content; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of reply comment -->


    <?php
    }
    //End of displaying reply comments for this comment
    
}
//End of reply comment count
?>