<div class="widget tags-widget">

<div class="title-section">
    <h1><span>Popular Tags</span></h1>
</div>

<ul class="tag-list">

<?php 
    
$query = "SELECT cat_sub_title FROM categories GROUP BY cat_sub_title";
$selectQuery = mysqli_query($serverConnection, $query);

    while($row = mysqli_fetch_assoc($selectQuery)){
        $cat_sub_title = $row['cat_sub_title'];
    ?>

    <li><a href="#"><?php echo $cat_sub_title; ?></a></li>

    <?php
    }
    ?>
</ul>

</div>