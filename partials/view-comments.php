<div class="forum-box" style="padding-top:50px">
    <div class="title-section">
        <h1><span>Comments</span></h1>
    </div>

    <div class="forum-table single-topic">

        <?php 
        // Calling displayApprovedArticleCommentCount to get count of comments related to this article
        $displayApprovedArticleCommentCount = $comment->displayApprovedArticleCommentCount($a_id);
        
        // Checking if the comment count is less than 0, if not comments will be displayed
        if($displayApprovedArticleCommentCount != 0){

            // Calling displayApprovedArticleComments to all comments related to this article
            $displayApprovedArticleComments = $comment->displayApprovedArticleComments($a_id);

            while($row = mysqli_fetch_assoc($displayApprovedArticleComments)){
                
                $c_id = $row['comment_id'];
                $c_avatar = $row['comment_avatar'];
                $c_author = $row['comment_author'];
                $c_content = $row['comment_content'];
                $c_date = $row['comment_date'];
            ?>

            <!-- Comment -->
            <div class="table-row" style="margin-bottom:15px">
                <div class="forum-post comment-post">
                    <img class="img-avatar" src="public/upload/users/<?php echo $c_avatar; ?>">
                    <div class="post-autor-date">
                        <p>by: <a href="#"><?php echo $c_author; ?></a></p>
                        <p><span class="date">ON <?php echo date('M j Y', strtotime($c_author));; ?></span></p>
                        <div class="content-post-area">
                        <?php echo $c_content; ?>
                        </div>
                    </div>
                </div>

                <!-- Reply comments -->
                <?php include "./partials/view-reply-comments.php"; ?>
                <!-- End of reply comments -->

            </div>
            <!-- End of comment -->

            <?php
            }
            // End of displaying comments for this article
            ?>

        <?php
        //End of if there are any comments
        }else{
        ?>
            <p class="line-for-loggin">No comments posted.</p>
        <?php
        }
        //End of else, if there aren'y any comments
        ?>

    </div>

</div>