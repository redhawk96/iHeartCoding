<?php
    if(isset($_GET['a'])){

        $a_id = $_GET['a'];
?>
<form action="../controllers/commentController.php" method="POST">
<div class="row" style="padding-bottom:35px">
    <div id="bulkOptionsContainer">
        <div class="col-xs-2" style="padding-right:0">
            <select class="form-control" name="bulk_option">
                <option selected>Select Option</option>
                <option>Approve</option>
                <option>Dismiss</option>
                <option>Delete</option>
            </select>
        </div>

        <div class="col-xs-3">
            <button type="submit" onclick="javascript: return confirm('Are you sure you want to apply changes?');" class="btn btn-success" name="bulk_apply"><i class="fa fa-check" style="margin-right:5px"></i> Apply</button>
            <a href="../Article?a=<?php echo $a_id; ?>" class="btn btn-primary"><i class="fa fa-file-text-o" style="margin-right:5px"></i> Read Article</a>
        </div>
    </div>
</div>
<table class="table table-striped table-bordered" id="datatable">
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
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
    $displayAllArticleComments = $comment->displayAllArticleComments();

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
            <td>
                <input class="checkBoxes" type="checkbox" name="commentIdCheckBoxArray[]" value="<?php echo $c_id; ?>">
                <input type="checkbox" name="articleIdCheckBoxArray[]" value="<?php echo $c_post_id; ?>" checked hidden>
            </td>
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
                    
                    echo "<button type='submit' class='btn btn-primary btn-sm' name='$action' value='$c_id'><i class='fa fa-$icon'></i> $btn_name</button>";
                    ?>
                </form>
            </td>
            <td>
                <a href="edit-comment?ec=<?php echo $c_id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
            </td>
            <td>
                <form action="../controllers/commentController.php" method="POST">
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-sm" name="delete_comment" value="<?php echo $c_id; ?>"><i class="fa fa-trash"></i> Delete</button>
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

