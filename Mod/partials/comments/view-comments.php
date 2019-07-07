<form action="/iHeartCoding/controllers/commentController.php" method="POST">

<div class="row">
<div class="offset-10 col pr-0 pb-5">
<div class="input-group col-12">
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
</div>

<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>In Response To</th>
            <th>Commentator</th>
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

    $author_id = $_SESSION['u_id'];

    $displayAuthorArticles = $article->displayAuthorArticles($author_id);

    while($article_row = mysqli_fetch_assoc($displayAuthorArticles)){

        $a_id = $article_row['article_id'];
        $a_title = $article_row['article_title'];

        $displaySingleAuthorArticleComment = $comment->displaySingleAuthorArticleComment($a_id);

        mysqli_stmt_bind_result($displaySingleAuthorArticleComment, $c_id, $c_post_id, $c_avatar, $c_author, $c_email, $c_content, $c_status, $c_date);

        while(mysqli_stmt_fetch($displaySingleAuthorArticleComment)):

    ?>
 
        <tr>
            <td>
                <input class="checkBoxes" type="checkbox" name="commentIdCheckBoxArray[]" value="<?php echo $c_id; ?>">
                <input type="checkbox" name="articleIdCheckBoxArray[]" value="<?php echo $c_post_id; ?>" checked hidden>
            </td>
            <td><a href="/iHeartCoding/Article/<?php echo $a_id.'/'.preg_replace('/\s+/', '-', $a_title) ?>"><?php echo $a_title; ?></a></td>
            <td><?php echo $c_author; ?></td>
            <td><?php echo $c_email; ?></td>
            <td><?php echo (strlen($c_content)>100) ? substr($c_content, 0, 100)."..." : strip_tags($c_content); ?></td>
            <td><?php echo $c_status; ?></td>
            <td><?php echo date('M j Y | h:i A', strtotime($c_date)); ?></td>
            <td>
                <form action="/iHeartCoding/controllers/commentController.php" method="POST">

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
                <a href="/iHeartCoding/Mod/Article/<?php echo $a_id; ?>" class="btn btn-outline-info btn-sm"><i class="ti-eye pr-1"></i> View</a>
            </td>
            <td class="text-center">
                <form action="./iHeartCoding/controllers/commentController.php" method="POST">
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to delete?');" class="btn btn-outline-danger btn-sm" name="delete_comment" value="<?php echo $c_id; ?>"><i class="ti-trash pr-1"></i> Delete</button>
                </form>
            </td>
        </tr>

    <?php
    endwhile;
    }
    ?>

    </tbody>
</table>

