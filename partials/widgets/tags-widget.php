<div class="widget tags-widget">

<div class="title-section">
    <h1><span>Popular Tags</span></h1>
</div>

<ul class="tag-list">

<?php 

    // Calling displayAllCategories method of Category class
    $displayAllCategories = $category->displayAllCategories();

    // Stating while loop to display all categories
    while($row = mysqli_fetch_assoc($displayAllCategories)){
        $cat_title = $row['cat_title'];
    ?>

    <li><a href="Search?t=<?php echo $cat_title; ?>"><?php echo $cat_title; ?></a></li>

    <?php
    }
    ?>
</ul>

</div>