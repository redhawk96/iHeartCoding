<?php

    if(isset($_GET['a'])){

        $a_id = $_GET['a'];
?>

<<table class="table table-hover display" id="datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Date</th> 
            <th>Action</th> 
            <th></th>
            <th></th> 
        </tr>
    </thead>
    <tbody>

    <?php

    // Calling displayAllArticleComments method of Comment class
    $displayAllArticleComments = $comment->displayAllArticleComments($a_id);

    // Stating while loop to display all comments related to this article
    while($row = mysqli_fetch_assoc($displayAllArticleComments)){
        $c_id = $row['comment_id'];
        $c_author = $row['comment_author'];
        $c_email = $row['comment_email'];
        $c_post_id = $row['article_id'];
        $c_content = $row['comment_content'];
        $c_status = $row['comment_status'];
        $c_date = $row['comment_date'];
    ?>

    <!-- Starting display of commnets [HTML Content] -->

        <tr>
            <td><?php echo $c_id; ?></td>
            <td><?php echo $c_author; ?></td>
            <td><?php echo $c_email; ?></td>
            <td><?php echo (strlen($c_content)>100) ? substr($c_content, 0, 100)."..." : $c_content; ?></td>
            <td><?php echo $c_status; ?></td>
            <td><?php echo $c_date; ?></td>
            <td>
                <form action="../controllers/commentController.php" method="POST">

                    <input type="text" name="a_id" value="<?php echo $c_post_id; ?>" hidden>
                    <?php 
                    $action = "approve_comment";
                    $icon = "thumbs-up";
                    $btn_name = "Approve";
                    
                    if($c_status == 'Approved') {
                        $action = "dismiss_comment";
                        $icon = "thumbs-down";
                        $btn_name = "Dismiss";
                    }
                    
                    echo "<button type='submit' class='btn btn-primary' name='$action' value='$c_id'><i class='fa fa-$icon'></i> $btn_name</button>";
                    ?>
                </form>
            </td>
            <td>
                <a href="edit-comment?ec=<?php echo $c_id; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
            </td>
            <td>
                <form action="../controllers/commentController.php" method="POST">
                    <button type="submit" class="btn btn-danger" name="delete_comment" value="<?php echo $c_id; ?>"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>

    <!-- End of displaying comments [HTML Content] -->
    <?php
    }
    // End of while loop to display all comments  related to this article
    ?>

    </tbody>
</table>

<?php
    }else{
        header('Location: comments');
    }
?>

