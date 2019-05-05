<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Title</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM categories";
        $selectQuery = mysqli_query($serverConnection, $query);

        while($row = mysqli_fetch_assoc($selectQuery)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        ?>

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

        <?php
        }
        ?>
    <tbody>
</table>
