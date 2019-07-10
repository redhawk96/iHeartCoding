<?php 

if(isset($_GET['a'])){

    $a_id = $_GET['a'];

    $displaySingleArticle = $article->displaySingleArticle($a_id);

    mysqli_stmt_bind_result($displaySingleArticle, $a_id, $a_cat_id, $a_title, $a_author, $author_id, $a_date, $a_image, $a_content, $a_tags, $a_com_count, $a_status, $a_view_count);

    while(mysqli_stmt_fetch($displaySingleArticle)):
?>

   <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-body bg-white border border-muted border-bottom-0">
                    <h3 class="card-title mt-0 py-0 text-center">
                        <?php echo $a_title ?><br>
                        <span class="font-14 font-weight-normal text-monospace">
                        <i class="ti-user"></i> by <?php echo $a_author ?>
                        <i class="ti-time pl-2"></i> <?php echo date('M d Y', strtotime($a_date)); ?>
                        </span>
                    </h3>
                </div>
                <div class="card-body border border-muted bg-white">
                    <p class="card-text pt-2"><?php echo $a_content ?></p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="card border border-muted">
                <div class="card-body py-3 bg-dark text-white">
                    <h3 class="header-title py-0 my-0 text-center font-weight-normal">Article Summary</h3>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-key pr-4 text-primary pl-2"></i> Identification</div><div class="col-lg-6 pl-lg-5"><?php echo $a_id ?></div></div></li>
                    <li class="list-group-item bg-white"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-user pr-4 text-primary pl-2"></i> Status</div><div class="col-lg-6 pl-lg-5"><?php echo $a_status ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-image pr-4 text-primary pl-2"></i> Title</div><div class="col-lg-6 pl-lg-5 text-truncate"><?php echo $a_title ?></div></div></li>
                    <li class="list-group-item bg-white"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-tag pr-4 text-primary pl-2"></i> Tags</div><div class="col-lg-6 pl-lg-5 text-truncate"><?php echo $a_tags ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-id-badge pr-4 text-primary pl-2"></i> Author Identification</div><div class="col-lg-6 pl-lg-5 text-truncate"><?php echo $author_id ?></div></div></li>
                    <li class="list-group-item bg-white"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-user pr-4 text-primary pl-2"></i> Author</div><div class="col-lg-6 pl-lg-5 text-truncate"><?php echo $a_author ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-time pr-4 text-primary pl-2"></i> Posted Date</div><div class="col-lg-6 pl-lg-5 text-truncate"><?php echo date('M d Y | h:i A', strtotime($a_date)); ?></div></div></li>
                    <li class="list-group-item bg-white"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-eye pr-4 text-primary pl-2"></i> Views</div><div class="col-lg-6 pl-lg-5"><?php echo $a_view_count ?></div></div></li>
                    <li class="list-group-item bg-light"><div class="row"><div class="col-lg-6 text-truncate"><i class="ti-comment-alt pr-4 pl-2 text-primary"></i> Comments</div><div class="col-lg-6 pl-lg-5"><?php echo $a_com_count ?></div></div></li>
                </ul>
            </div>


            <div class="card border border-muted">
                <div class="card-body py-3 bg-dark text-white">
                    <h3 class="header-title py-0 my-0 text-center font-weight-normal">Comment Summary</h3>
                </div>
                <div class="card-body">
                    <?php 
                        $displaySingleAuthorArticleComment = $comment->displaySingleAuthorArticleComment($a_id);

                        mysqli_stmt_bind_result($displaySingleAuthorArticleComment, $c_id, $c_post_id, $c_avatar, $c_author, $c_email, $c_content, $c_status, $c_date);
                
                        while(mysqli_stmt_fetch($displaySingleAuthorArticleComment)):
                    ?>

                    <div class="media m-b-30"><img class="d-flex mr-3 rounded-circle" src="/iHeartCoding/public/Admin/assets/images/users/<?php echo $c_avatar ?>" alt="<?php echo $c_avatar ?>" height="64">
                        <div class="media-body text-truncate">
                            <h5 class="mt-0 font-16 text-truncate"><?php echo $c_author ?><span class="font-12 font-weight-normal text-monospace"> on <?php echo date("F d - 'y | h:i A", strtotime($c_date)); ?></span></h5><?php echo $c_content ?></div>
                    </div>
                    <?php 
                        endwhile;
                    ?>
                </div>
            </div>

        </div>

   </div>
    
<?php  

    endwhile;

}else{

    header('Location: /iHeartCoding/Mod/Articles');

}
?>