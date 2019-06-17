<form action="../controllers/commentController.php" method="POST">

<div class="offset-10 col pr-0 pb-5">
    <div class="input-group col-2">
        <select class="form-control" name="bulk_option">
            <option selected>Select Option</option>
            <option value="Approve">Approve</option>
            <option value="Dismiss">Dismiss</option>
            <option value="Delete">Delete</option>
        </select>
    <div class="input-group-append">
        <button type="submit" onclick="javascript: return confirm('Are you sure you want to apply changes?');" class="btn btn-outline-success float-right" name="bulk_apply"><i class="ti-save"></i></button>
    </div>
    </div>
</div>


<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Commenter</th>
            <th>Email</th>
            <th>In Response To</th>
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

    // Calling displayAllComments method of Comment class
    $displayAllComments = $comment->displayAllComments();

    // Stating while loop to display all comments
    while($row = mysqli_fetch_assoc($displayAllComments)){
        $c_id = $row['comment_id'];
        $c_author = $row['comment_author'];
        $c_email = $row['comment_email'];
        $c_post_id = $row['article_id'];
        $c_content = $row['comment_content'];
        $c_status = $row['comment_status'];
        $c_date = $row['comment_date'];

        $in_Response_Title = $article->displaySingleArticleTitle($c_post_id);
    ?>

    <!-- Starting display of commnets [HTML Content] -->

        <tr>
            <td>
                <input class="checkBoxes" type="checkbox" name="commentIdCheckBoxArray[]" value="<?php echo $c_id; ?>">
                <input type="checkbox" name="articleIdCheckBoxArray[]" value="<?php echo $c_post_id; ?>" checked hidden>
            </td>
            <td><?php echo $c_author; ?></td>
            <td><?php echo $c_email; ?></td>
            <td><?php echo "<a href='../Article?a=".$c_post_id."'>".$in_Response_Title."</a>"; ?></td>
            <td><?php echo (strlen($c_content)>100) ? substr($c_content, 0, 100)."..." : strip_tags($c_content); ?></td>
            <td><?php echo $c_status; ?></td>
            <td><?php echo date('M j Y | h:i A', strtotime($c_date)); ?></td>
            <td>
                <form action="../controllers/commentController.php" method="POST">

                    <input type="text" name="a_id" value="<?php echo $c_post_id; ?>" hidden>
                    <?php 
                    $action = "approve_comment";
                    $icon = "check";
                    $btn_name = "Approve";
                    
                    if($c_status == 'Approved') {
                        $action = "dismiss_comment";
                        $icon = "na";
                        $btn_name = "Dismiss";
                    }
                    
                    echo "<button type='submit' class='btn btn-outline-secondary btn-sm' name='$action' value='$c_id'><i class='ti-$icon pr-1'></i> $btn_name</button>";
                    ?>
                </form>
            </td>
            <td class="text-center">
                <a href="edit-comment?ec=<?php echo $c_id; ?>" class="btn btn-outline-warning btn-sm"><i class="ti-pencil-alt pr-1"></i> Edit</a>
            </td>
            <td class="text-center">
                <form action="../controllers/commentController.php" method="POST">
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to delete?');" class="btn btn-outline-danger btn-sm" name="delete_comment" value="<?php echo $c_id; ?>"><i class="ti-trash pr-1"></i> Delete</button>
                </form>
            </td>
        </tr>

    <!-- End of displaying comments [HTML Content] -->
    <?php
    }
    // End of while loop to display all comments
    ?>

    </tbody>
</table>
</form>