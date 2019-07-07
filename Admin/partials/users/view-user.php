<?php 
    $u_id = $_GET['user'];

    $displaySingleUser = $user->displaySingleUser($u_id);

    while($row = mysqli_fetch_assoc($displaySingleUser)){
        $u_id = $row['user_id'];
        $username = $row['username'];
        $u_first_name = $row['user_firstName'];
        $u_last_name = $row['user_lastName'];
        $u_email = $row['user_email'];
        $u_image = $row['user_image'];
        $u_role = $row['user_role'];
        $u_status = $row['user_status'];
        $u_reg_date = $row['user_reg_date'];
        $u_intro = $row['user_intro'];
        $u_description = $row['user_description'];
        $u_facebook = $row['user_facebook_link'];
        $u_youtube = $row['user_youtube_link'];
        $u_linkedin = $row['user_linkedin_link'];
        $u_website = $row['user_website'];

        $action = "activate-user";
        $icon = "unlock";
        $btn_name = "Activate";

        if($u_status == 'Active') {
            $action = "disable-user";
            $icon = "lock";
            $btn_name = "Disable";
        }

        $u_first_logged = null;
        $u_last_logged = null;
        $u_no_of_time_logged = null;

        $displayLoggedActivitySummary = $activity->displayLoggedActivitySummary($u_id);

        mysqli_stmt_bind_result($displayLoggedActivitySummary, $u_f_logged, $u_l_logged, $n_t_logged);

        while(mysqli_stmt_fetch($displayLoggedActivitySummary)):

            $u_first_logged = $u_f_logged; 
            $u_last_logged = $u_l_logged;
            $u_no_of_time_logged = $n_t_logged;

        endwhile;
?>

    <div class="row">

        <div class="col-lg-3">
            <div class="card border border-light border-top-0"><img class="card-img-top img-fluid" src="/iHeartCoding/public/upload/users/<?php echo $u_image ?>" alt="<?php echo $u_image ?>">
                <div class="card-body border border-Muted border-top-0 border-bottom-0">
                <h4 class="card-title font-16 mt-0"><?php echo $username ?></h4>
                <p class="card-text"><?php echo $u_intro ?></p>
                </div>
                <ul class="list-group list-group-flush border border-Muted border-top-0 border-bottom-0">
                <li class="list-group-item text-truncate"><div class="row"><div class="col-lg-6">Identification</div><div class="col-lg-6"><?php echo $u_id ?></div></div></li>
                <li class="list-group-item text-truncate"><div class="row"><div class="col-lg-6">Type</div><div class="col-lg-6"><?php echo $u_role ?></div></div></li>
                <li class="list-group-item text-truncate"><div class="row"><div class="col-lg-6">Status</div><div class="col-lg-6"><?php echo $u_status ?></div></div></li>
                <li class="list-group-item text-truncate"><div class="row"><div class="col-lg-6">Name</div><div class="col-lg-6"><?php echo $u_first_name." ".$u_last_name ?></div></div></li>
                <li class="list-group-item text-truncate"><div class="row"><div class="col-lg-6">DOR</div><div class="col-lg-6"><?php echo date('M j Y | h:i A', strtotime($u_reg_date)); ?></div></div></li>
                <li class="list-group-item text-truncate"><div class="row"><div class="col-lg-6">Facebook</div><div class="col-lg-6"><a href="<?php echo $u_facebook ?>"><i class="ti-facebook pr-1"></i> Facebook profile</a></div></div></li>
                <li class="list-group-item text-truncate"><div class="row"><div class="col-lg-6">Linkedin</div><div class="col-lg-6"><a href="<?php echo $u_linkedin ?>"><i class="ti-linkedin pr-1"></i> Linkedin profile </a></div></div></li>
                <li class="list-group-item text-truncate"><div class="row"><div class="col-lg-6">Youtube</div><div class="col-lg-6"><a href="<?php echo $u_youtube ?>"><i class="ti-youtube pr-1"></i> YouTube profile</a></div></div></li>
                <li class="list-group-item text-truncate pb-4"><div class="row"><div class="col-lg-6">Portfolio</div><div class="col-lg-6"><a href="<?php echo $u_website ?>"><i class="ti-html5 pr-1"></i> Portfolio</a></div></div></li>
                </ul>
                <div class="card-body py-0 mx-0 px-0">
                    <div class="row mx-0">
                        <div class="col-lg-4 px-0 update-user-status-div"><button type="button" class="btn btn-primary btn-block rounded-0 py-3 update-user-status text-truncate" u_action="<?php echo $action ?>" id_ref="<?php echo $u_id ?>"><i class="ti-<?php echo $icon ?> pr-1"></i> <?php echo $btn_name ?></button></div>
                        <div class="col-lg-4 px-0"><button type="button" class="btn btn-dark btn-block rounded-0 py-3 border-left-0 border-right-0 reset-user-password text-truncate" id_ref="<?php echo $u_id ?>" u_ref="<?php echo $username ?>"><i class="ti-alert pr-1"></i> Reset</button></div>
                        <div class="col-lg-4 px-0"><button type="button" class="btn btn-danger btn-block rounded-0 py-3 delete-user text-truncate" id_ref="<?php echo $u_id ?>" img_ref="<?php echo $u_image ?>"><i class="ti-trash pr-1"></i> Remove</button></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border border-Muted">
                        <div class="card-body bg-dark text-white">
                            <div class="row">
                                <div class="col-lg-5"><p class="card-subtitle font-14"><i class="ti-time pr-1"></i> First Logged : <?php echo date('M j Y | h:i A', strtotime($u_first_logged)); ?></p></div>
                                <div class="col-lg-5"><p class="card-subtitle font-14"><i class="ti-time pr-1"></i> Last Logged : <?php echo date('M j Y | h:i A', strtotime($u_l_logged)); ?></p></div>
                                <div class="col"><p class="card-subtitle font-14 float-right"><i class="ti-signal pr-1"></i> <?php echo $u_no_of_time_logged ?></p></div>
                            </div>
                        </div>
                        <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Ttile</th>
                                <th></th>
                                <th>Tags</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Comments</th>
                                <th class="text-center">Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $displayAuthorArticles = $article->displayAuthorArticles($u_id);

                        while($row = mysqli_fetch_assoc($displayAuthorArticles)){
                            $a_id = $row['article_id'];
                            $a_title = $row['article_title'];
                            $author_id = $row['author_id'];
                            $a_image = $row['article_image'];
                            $a_tags = $row['article_tags'];
                            $a_com_count = $row['article_comment_count'];
                            $a_status = $row['article_status'];
                            $a_date = $row['article_date'];
                            $a_view_count = $row['article_view_count']; 
                        ?>
                        <tr>
                            <td class="text-truncate"><a href="/iHeartCoding/Article/<?php echo $a_id; ?>/<?php echo preg_replace('/\s+/', '-', $a_title) ?>"><?php echo $a_title; ?></a></td>
                            <td class="text-center">
                                <a class="image-popup-no-margins" href="/iHeartCoding/public/upload/articles/<?php echo $a_image; ?>">
                                    <img class="img-fluid" alt="" src="/iHeartCoding/public/upload/articles/<?php echo $a_image; ?>" width="35">
                                </a>
                            </td>
                            <td><?php echo $a_tags; ?></td>
                            <td><?php echo $a_status; ?></td>
                            <td><?php echo $a_view_count; ?></td>
                            <td><?php echo $a_com_count; ?></td>
                            <td><?php echo date('M j Y | h:i A', strtotime($a_date)); ?></td>
                            <td>
                            <?php 
                                $icon = "export";
                                $btn_name = "Publish";
                                $ajax_req_btn_class_name = "publish-single-user";
                                $btn_color = "info";

                                if($a_status == 'Published') {
                                    $icon = "import";
                                    $btn_name = "Draft";
                                    $ajax_req_btn_class_name = "draft-single-user";
                                    $btn_color = "secondary";
                                }

                                echo "<button type='button' class='btn btn-outline-$btn_color btn-sm waves-effect waves-light sa-$ajax_req_btn_class_name-article' id_ref='$a_id' auth_ref='$author_id'><i class='ti-$icon pr-1'></i> $btn_name</button>";
                                ?>
                            </td>
                            <td>
                                <a href="/iHeartCoding/Admin/Article/Edit/<?php echo $a_id; ?>" class="btn btn-outline-warning btn-sm"><i class="ti-pencil-alt pr-1"></i> Edit</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm waves-effect waves-light sa-delete-single-user-article" id_ref="<?php echo $a_id; ?>" img_ref="<?php echo $a_image; ?>" auth_ref="<?php echo $author_id ?>"><i class="ti-trash pr-1"></i> Delete</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-dark btn-sm waves-effect waves-light sa-reset-single-user-article-views" id_ref="<?php echo $a_id; ?>" auth_ref="<?php echo $author_id ?>"><i class="ti-eraser pr-1"></i> Rest</button>
                            </td>
                        </tr>

                        <?php 
                        } 
                        ?>
                            
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>

<?php  
    }
?>