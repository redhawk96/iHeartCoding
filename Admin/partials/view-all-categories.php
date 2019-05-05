<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Title</th>
        </tr>
    </thead>
    <tbody>
    
    <?php

    // Calling displayAllCategories method of Category class
    $displayAllCategories = $category->displayAllCategories();

    // Stating while loop to display all categories
    while($row = mysqli_fetch_assoc($displayAllCategories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
    ?>

    <!-- Starting display of categories [HTML Content] -->
    <tr>
        <td><?php echo $cat_id;?></td>
        <td><?php echo $cat_title;?></td>
        <td>
            <form action="../controllers/categoryController.php" method="POST">
                <button type="submit" class="btn btn-primary" name="delete_category" value="<?php echo $cat_id; ?>">Delete</button>
            </form>
        </td>
        <td>
            <a href="categories.php?ecat=<?php echo $cat_id; ?>" class="btn btn-warning">Edit</a>
        </td>
    </tr>

    <!-- End of displaying categories [HTML Content] -->
    <?php
    }
    // End of while loop to display all categories
    ?>

    <tbody>
</table>
