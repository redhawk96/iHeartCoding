<form action="../controllers/articleController.php" method="POST">

<div class="row">
<div class="col-10">
<?php
    // Calling displayAuthorArticles method of Article class
    $displayAuthorArticles = $article->displayAuthorArticles($author_id);

    // Stating while loop to display all categories
    while($row = mysqli_fetch_assoc($displayAuthorArticles)){
        $author = $row['article_author'];
    } 

    echo "<p>Articles relating to : ".$author."</p>";
?>
</div>

<div class="col pr-0 pb-5">
    <div class="input-group col-12">
    <select class="form-control" name="bulk_option">
        <option selected>Select Option</option>
        <option value="Publish">Publish</option>
        <option value="Draft">Draft</option>
        <option value="Reset">Reset Views</option>
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
            <th>Title</th>
            <th>Status</th>
            <th class="text-center">Image</th>
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

    // Calling displayAuthorArticles method of Article class
    $displayAuthorArticles = $article->displayAuthorArticles($author_id);

    // Stating while loop to display all categories
    while($row = mysqli_fetch_assoc($displayAuthorArticles)){
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
            <td><a href="/iHeartCoding/Article?a=<?php echo $a_author; ?>"><?php echo $a_title; ?></a></td>
            <td><?php echo $a_status; ?></td>
            <td class="text-center">
                <a class="image-popup-no-margins" href="../public/upload/articles/<?php echo $a_image; ?>">
                    <img class="img-fluid" alt="" src="../public/upload/articles/<?php echo $a_image; ?>" width="50">
                </a>
                <input class="checkBoxes" type="checkbox" name="articleImagCheckBoxArray[]" value="<?php echo $a_image; ?>" checked hidden>
            </td>
            <td><?php echo $a_tags; ?></td>
            <td><a href="article-comments?a=<?php echo $a_id; ?>"><?php echo $a_com_count; ?></a></td>
            <td><?php echo $a_view_count; ?></td>
            <td><?php echo date('M j Y | h:i A', strtotime($a_date)); ?></td>
            <td>
                <form action="../controllers/articleController.php" method="POST">

                    <?php 
                    $action = "publish_article";
                    $icon = "export";
                    $btn_name = "Publish";

                    if($a_status == 'Published') {
                        $action = "draft_article";
                        $icon = "import";
                        $btn_name = "Draft";
                    }

                    echo "<button type='submit' class='btn btn-outline-secondary btn-sm' name='$action' value='$a_id'><i class='ti-$icon pr-1'></i> $btn_name</button>";
                    ?>
                </form>
            </td>
            <td class="text-center">
                <a href="publish-article?eart=<?php echo $a_id; ?>" class="btn btn-outline-warning btn-sm"><i class="ti-pencil-alt pr-1"></i> Edit</a>
            </td>
            <td class="text-center">
                <form action="../controllers/articleController.php" method="POST">
                    <input type="text" name="a_image_name" value="<?php echo $a_image; ?>" hidden>
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to delete?');" class="btn btn-outline-danger btn-sm" name="delete_article" value="<?php echo $a_id; ?>"><i class="ti-trash pr-1"></i> Delete</button>
                </form>
            </td>
            <td class="text-center">
                <form action="../controllers/articleController.php" method="POST">
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to reset view count?');" class="btn btn-outline-dark btn-sm" name="reset_view_count" value="<?php echo $a_id; ?>"><i class="ti-eraser pr-1"></i> Rest</button>
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