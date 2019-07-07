<div class="card border border-Muted border-top-0">
    <div class="card-body bg-dark">
    <h4 class="card-title font-16 mt-0 text-center text-white mb-0"><i class="fa fa-tags pr-1"></i> Tags</h4>
</div>
<div class="card-body">
<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Tag</th>
            <th>Added By</th>
            <th>Related Articles</th>
            <th>Added On</th>
            <th></th>
            <th></th>
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
        $added_by = $row['added_by'];  
        $added_on = $row['added_on'];  

        $username = $user->getUsername($added_by);

        $c_count = $article->getArticleCategoryCount($cat_title);
    ?>

    <!-- Starting display of categories [HTML Content] -->
    <tr>
        <td><?php echo $cat_title;?></td>
        <td><a href="/iHeartCoding/Admin/User/View/<?php echo $added_by ?>"><?php echo $username;?></a></td>
        <td><?php echo $c_count;?></td>
        <td><?php echo date('M j Y | h:i A', strtotime($added_on));?></td>
        <td class="text-center">
            <a href="/iHeartCoding/Admin/Tags?ecat=<?php echo $cat_id; ?>" class="btn btn-outline-warning btn-sm"><i class="ti-pencil-alt pr-1"></i> Edit</a>
        </td>
        <td class="text-center">
            <form action="../controllers/categoryController.php" method="POST">
                <button type="submit" class="btn btn-outline-danger btn-sm" name="delete_category" value="<?php echo $cat_id; ?>"><i class="ti-trash pr-1"></i> Delete</button>
            </form>
        </td>
    </tr>

    <!-- End of displaying categories [HTML Content] -->
    <?php
    }
    // End of while loop to display all categories
    ?>

    <tbody>
</table>
</div>