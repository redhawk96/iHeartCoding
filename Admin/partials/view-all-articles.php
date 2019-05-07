<table class="table table-hover">
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
            <td><?php echo $a_comment_count; ?></td>
            <td><?php echo $a_date; ?></td>
            <td>
                <form action="../controllers/articleController.php" method="POST">
                    <input type="text" name="a_image_name" value="<?php echo $a_image; ?>" hidden>
                    <button type="submit" class="btn btn-primary" name="delete_article" value="<?php echo $a_id; ?>">Delete</button>
                </form>
            </td>
            <td>
                <a href="publish-article?eart=<?php echo $a_id; ?>" class="btn btn-warning">Edit</a>
            </td>
        </tr>

    <!-- End of displaying articles [HTML Content] -->
    <?php
    }
    // End of while loop to display all articles
    ?>

    </tbody>
</table>