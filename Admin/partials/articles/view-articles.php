<form action="../controllers/articleController.php" method="POST">
<div class="row" style="padding-bottom:35px">
    <div id="bulkOptionsContainer">
        <div class="col-xs-2" style="padding-right:0">
            <select class="form-control" name="bulk_option">
                <option selected>Select Option</option>
                <option value="Publish">Publish</option>
                <option value="Draft">Draft</option>
                <option value="Reset">Reset Views</option>
                <option value="Delete">Delete</option>
            </select>
        </div>

        <div class="col-xs-3">
            <button type="submit" onclick="javascript: return confirm('Are you sure you want to apply changes?');" class="btn btn-success" name="bulk_apply"><i class="fa fa-check" style="margin-right:5px"></i> Apply</button>
            <a href="./publish-article" class="btn btn-primary"><i class="fa fa-file-text-o" style="margin-right:5px"></i> Add Article</a>
        </div>
    </div>
</div>
<table class="table table-striped table-bordered" id="datatable">
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Views</th>
            <th>Date</th>
            <tH>Action</th> 
            <th></th> 
            <th></th> 
            <th></th>
        </tr>
    </thead>
    <tbody>

    <?php

    // Calling displayAllArticles method of Article class
    $displayAllArticles = $article->displayAllArticles();

    // Stating while loop to display all categories
    while($row = mysqli_fetch_assoc($displayAllArticles)){
        $a_id = $row['article_id'];
        $a_cat_id = $row['article_category_id'];
        $a_title = $row['article_title'];
        $a_author = $row['article_author'];
        $author_id = $row['author_id'];
        $a_image = $row['article_image'];
        $a_com_count = $row['article_comment_count'];
        $a_content = $row['article_content'];
        $a_tags = $row['article_tags'];
        $a_status = $row['article_status'];
        $a_date = $row['article_date'];
        $a_view_count = $row['article_view_count']; 
    ?>

    <!-- Starting display of articles [HTML Content] -->

        <tr>
            <td><input class="checkBoxes" type="checkbox" name="articleIdCheckBoxArray[]" value="<?php echo $a_id; ?>"></td>
            <td><?php echo $a_id; ?></td>
            <td><a href="Articles?Author=<?php echo $author_id; ?>"><?php echo $a_author; ?></a></td>
            <td><a href="/iHeartCoding/Article?a=<?php echo $a_id; ?>"><?php echo $a_title; ?></a></td>
            <td><?php echo $a_cat_id; ?></td>
            <td><?php echo $a_status; ?></td>
            <td>
                <img src="../public/upload/articles/<?php echo $a_image; ?>" style="width:50px">
                <input class="checkBoxes" type="checkbox" name="articleImagCheckBoxArray[]" value="<?php echo $a_image; ?>" checked hidden>
            </td>
            <td><?php echo $a_tags; ?></td>
            <td><a href="article-comments?a=<?php echo $a_id; ?>"><?php echo $a_com_count; ?></a></td>
            <td><a href="article-comments?a=<?php echo $a_id; ?>"><?php echo $a_view_count; ?></a></td>
            <td><?php echo date('M j Y | h:i A', strtotime($a_date)); ?></td>
            <td>
                <form action="../controllers/articleController.php" method="POST">

                    <?php 
                    $action = "publish_article";
                    $icon = "thumbs-up";
                    $btn_name = "Publish";

                    if($a_status == 'Published') {
                        $action = "draft_article";
                        $icon = "thumbs-down";
                        $btn_name = "Draft";
                    }

                    echo "<button type='submit' class='btn btn-primary btn-sm' name='$action' value='$a_id'><i class='fa fa-$icon'></i> $btn_name</button>";
                    ?>
                </form>
            </td>
            <td>
                <a href="publish-article?eart=<?php echo $a_id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
            </td>
            <td>
                <form action="../controllers/articleController.php" method="POST">
                    <input type="text" name="a_image_name" value="<?php echo $a_image; ?>" hidden>
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-sm" name="delete_article" value="<?php echo $a_id; ?>"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </td>
            <td>
                <form action="../controllers/articleController.php" method="POST">
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to reset view count?');" class="btn btn-default btn-sm" name="reset_view_count" value="<?php echo $a_id; ?>"><i class="fa fa-eye-slash"></i> Rest</button>
                </form>
            </td>
        </tr>

    <!-- End of displaying articles [HTML Content] -->
    <?php
    }
    // End of while loop to display all articles
    ?>

    </tbody>
</table>