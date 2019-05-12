<table class="table table-striped table-bordered" id="datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <tH>Action</th> 
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
        $a_author = $row['article_author'];
        $a_title = $row['article_title'];
        $a_category_id = $row['article_category_id'];
        $a_status = $row['article_status'];
        $a_image = $row['article_image'];
        $a_tags = $row['article_tags'];
        $a_comment_count = $row['article_comment_count'];
        $a_date = $row['article_date'];
    ?>

    <!-- Starting display of articles [HTML Content] -->

        <tr>
            <td><?php echo $a_id; ?></td>
            <td><?php echo $a_author; ?></td>
            <td><?php echo $a_title; ?></td>
            <td><?php echo $a_category_id; ?></td>
            <td><?php echo $a_status; ?></td>
            <td><img src="../public/upload/articles/<?php echo $a_image; ?>" style="width:50px"></td>
            <td><?php echo $a_tags; ?></td>
            <td><a href="article-comments?a=<?php echo $a_id; ?>"><?php echo $a_comment_count; ?></a></td>
            <td><?php echo $a_date; ?></td>
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

                    echo "<button type='submit' class='btn btn-primary' name='$action' value='$a_id'><i class='fa fa-$icon'></i> $btn_name</button>";
                    ?>
                </form>
            </td>
            <td>
                <a href="publish-article?eart=<?php echo $a_id; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
            </td>
            <td>
                <form action="../controllers/articleController.php" method="POST">
                    <input type="text" name="a_image_name" value="<?php echo $a_image; ?>" hidden>
                    <button type="submit" class="btn btn-danger" name="delete_article" value="<?php echo $a_id; ?>"><i class="fa fa-trash"></i> Delete</button>
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