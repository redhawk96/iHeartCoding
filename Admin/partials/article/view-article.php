<?php 

if(isset($_GET['a'])){

    $a_id = $_GET['a'];

    $displaySingleArticle = $article->displaySingleArticle($a_id);

    mysqli_stmt_bind_result($displaySingleArticle, $a_id, $a_cat_id, $a_title, $a_author, $author_id, $a_date, $a_image, $a_content, $a_tags, $a_com_count, $a_status, $a_view_count);

    while(mysqli_stmt_fetch($displaySingleArticle)):
?>

   <div class="row">
        <div class="col-lg-8">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active px-5" data-toggle="tab" href="#article" role="tab" aria-selected="true"><span class="d-block d-sm-none"><i class="fas fa-home"></i></span> <span class="d-none d-sm-block">Article</span></a></li>
                <li class="nav-item"><a class="nav-link px-5" data-toggle="tab" href="#comments" role="tab" aria-selected="false"><span class="d-block d-sm-none"><i class="far fa-user"></i></span> <span class="d-none d-sm-block">Comments</span></a></li>
            </ul>
            <!-- End Nav tabs -->
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="article" role="tabpanel">
                    <div class="card border">
                    <div class="card-body bg-dark text-white">
                        <h3 class="card-title mt-0 py-3 text-center">
                            <?php echo $a_title ?><br>
                            <span class="font-14 font-weight-normal text-monospace">
                            <i class="ti-user"></i> by <?php echo $a_author ?>
                            <i class="ti-time pl-2"></i> <?php echo date('M j Y', strtotime($a_date)); ?>
                            </span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text pt-2"><?php echo $a_content ?></p>
                    </div>
                    </div>
                </div>
                <div class="tab-pane" id="comments" role="tabpanel">
                    
                </div>
            </div>
             <!-- End Tab panes -->
        </div>

            
        </div>
        <div class="col-lg-4 pt-5">
            <div class="card-body border border-muted bg-dark text-white mt-2">
                <h3 class="card-title font-20 text-center">Article Description</h3>
            </div>
            <div class="card border border-muted">
                <img class="card-img-top img-fluid" src="/iHeartCoding/public/upload/articles/<?php echo $a_image ?>" alt="<?php echo $a_image ?>">
                <ul class="list-group list-group-flush border border-muted border-top-0">
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-key pr-3"></i> Identification</div><div class="col-lg-6 pl-lg-5"><?php echo $a_id ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-user pr-3"></i> Status</div><div class="col-lg-6 pl-lg-5"><?php echo $a_status ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-image pr-3"></i> Title</div><div class="col-lg-6 pl-lg-5"><?php echo $a_title ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-tag pr-3"></i> Tags</div><div class="col-lg-6 pl-lg-5"><?php echo $a_tags ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-id-badge pr-3"></i> Author Identification</div><div class="col-lg-6 pl-lg-5"><?php echo $author_id ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-user pr-3"></i> Author</div><div class="col-lg-6 pl-lg-5"><?php echo $a_author ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-time pr-3"></i> Posted Date</div><div class="col-lg-6 pl-lg-5"><?php echo date('M j Y | h:i A', strtotime($a_date)); ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-eye pr-3"></i> Views</div><div class="col-lg-6 pl-lg-5"><?php echo $a_view_count ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 pl-lg-5 text-truncate"><i class="ti-comment-alt pr-3"></i> Comments</div><div class="col-lg-6 pl-lg-5"><?php echo $a_com_count ?></div></div></li>
                </ul>
            </div>
        </div>
   </div>
    
<?php  

    endwhile;

}else{

    header('Location: /iHeartCoding/Admin/Articles/View-All');

}
?>