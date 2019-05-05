<div class="widget tags-widget">

<div class="title-section">
    <h1><span>Popular Tags</span></h1>
</div>

<ul class="tag-list">

<?php 

$dbConnection = new DBConnect();
    $serverConnection = $dbConnection->serverInstance();

$query = "SELECT cat_title FROM categories";
$selectQuery = mysqli_query($serverConnection, $query);

    while($row = mysqli_fetch_assoc($selectQuery)){
        $cat_title = $row['cat_title'];
    ?>

    <li><a href="#"><?php echo $cat_title; ?></a></li>

    <?php
    }
    ?>
</ul>

</div>