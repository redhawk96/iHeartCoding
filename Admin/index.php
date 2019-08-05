<?php 
   include 'includes/header.php';
   include 'includes/top-nav.php'; 
   include 'includes/left-nav.php'
?>


<!-- Start right Content here -->
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid">
         <div class="page-title-box">
            <div class="row align-items-center">
               <div class="col-sm-6">
                  <h4 class="page-title">Dashboard</h4>
               </div>
               <div class="col-sm-6">
                  <div class="float-right d-none d-md-block">
                     <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-settings mr-2"></i> Settings</button>
                        <div class="dropdown-menu dropdown-menu-right">
                           <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end row -->
         <div class="row">
            <div class="col-xl-3 col-md-6">
               <div class="card mini-stat bg-primary text-white">
                  <div class="card-body">
                     <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="../public/admin/assets/images/services-icon/01.png" alt=""></div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Articles</h5>
                        <h4 class="font-500"><?php echo $article->displayAllArticleCount(); ?> <i class="<?php echo $stat->setComparisonStatus($stat->getArticleCountComparison()); ?>  ml-2"></i></h4>
                        <div class="mini-stat-label bg-success">
                           <p class="mb-0"><?php echo $stat->getArticleCountComparison(); ?>%</p>
                        </div>
                     </div>
                     <div class="pt-2">
                        <div class="float-right"><a href="/iHeartCoding/Admin/Articles/View-All" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a></div>
                        <p class="text-white-50 mb-0">See all articles</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card mini-stat bg-primary text-white">
                  <div class="card-body">
                     <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="../public/admin/assets/images/services-icon/02.png" alt=""></div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Published articles</h5>
                        <h4 class="font-500"><?php echo $article->displayAllPublishedArticleCount(); ?> <i class="<?php echo $stat->setComparisonStatus($stat->getPublishedArticleCountComparison()); ?> ml-2"></i></h4>
                        <div class="mini-stat-label bg-danger">
                           <p class="mb-0"><?php echo $stat->getPublishedArticleCountComparison(); ?>%</p>
                        </div>
                     </div>
                     <div class="pt-2">
                        <div class="float-right"><a href="/iHeartCoding/Admin/Articles/Published" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a></div>
                        <p class="text-white-50 mb-0">See all published articles</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card mini-stat bg-primary text-white">
                  <div class="card-body">
                     <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="../public/admin/assets/images/services-icon/04.png" alt=""></div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Comments</h5>
                        <h4 class="font-500"><?php echo $comment->displayAllCommentCount(); ?> <i class="<?php echo $stat->setComparisonStatus($stat->getCommentCountComparison()); ?> ml-2"></i></h4>
                        <div class="mini-stat-label bg-warning">
                           <p class="mb-0"><?php echo $stat->getCommentCountComparison(); ?>%</p>
                        </div>
                     </div>
                     <div class="pt-2">
                        <div class="float-right"><a href="/iHeartCoding/Admin/Comments" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a></div>
                        <p class="text-white-50 mb-0">See all comments</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card mini-stat bg-primary text-white">
                  <div class="card-body">
                     <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4"><img src="../public/admin/assets/images/services-icon/03.png" alt=""></div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Members</h5>
                        <h4 class="font-500"><?php echo $user->displayUserCount(); ?>  <i class="<?php echo $stat->setComparisonStatus($stat->getMemberCountComparison()); ?> ml-2"></i></h4>
                        <div class="mini-stat-label bg-info">
                           <p class="mb-0"><?php echo $stat->getMemberCountComparison(); ?>%</p>
                        </div>
                     </div>
                     <div class="pt-2">
                        <div class="float-right"><a href="/iHeartCoding/Admin/Users/View-All" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a></div>
                        <p class="text-white-50 mb-0">See All members</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end row -->
         <div class="row">
            <div class="col-xl-3">
               <div class="card">
                  <div class="card-body">
                     <h4 class="mt-0 header-title mb-4">Logged Platforms</h4>
                     <div class="cleafix">
                        <p class="float-left"><i class="mdi mdi-calendar mr-1 text-primary"></i><?php date_default_timezone_set('Asia/Colombo'); echo date('l jS F Y', time()); ?></p>
                        <h5 class="font-18 text-right"><?php echo $article->displayAllArticleCount(); ?></h5>
                     </div>
                     <div id="ct-chart" class="ct-chart ct-golden-section simple-pie-chart-chartist"></div>
                     <div class="mt-4">
                        <table class="table mb-0">
                           <tbody>
                              <tr>
                                 <td><span class="badge badge-primary">Windows</span></td>
                                 <td>Desktops / Windows Phones</td>
                                 <td class="text-right"><?php echo $access->getAccessedDeviceCount('windows'); ?></td>
                              </tr>
                              <tr>
                                 <td><span class="badge badge-success">Mac</span></td>
                                 <td>iPhones / iPads / MacBooks</td>
                                 <td class="text-right">28.0%</td>
                              </tr>
                              <tr>
                                 <td><span class="badge badge-dark">Linux</span></td>
                                 <td>Linux / Android</td>
                                 <td class="text-right">17.5%</td>
                              </tr>
                              <tr>
                                 <td><span class="badge badge-warning" style="background-color:#D17905">Other</span></td>
                                 <td>BlackBerry / etc.   </td>
                                 <td class="text-right">17.5%</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="mt-0 header-title mb-4">Atricle Comments</h4>
                     <div class="slimscroll" style="min-height:485px; max-height:485px">
                     <ol class="activity-feed">
                        <?php 
                        $displayAllComments = $comment->displayAllComments();

                        // Stating while loop to display all comments
                        while($row = mysqli_fetch_assoc($displayAllComments)){
                           $c_id = $row['comment_id'];
                           $c_author = $row['comment_author'];
                           $c_email = $row['comment_email'];
                           $c_post_id = $row['article_id'];
                           $c_content = $row['comment_content'];
                           $c_status = $row['comment_status'];
                           $c_date = $row['comment_date'];

                           ?>
                        <li class="feed-item">
                           <div class="feed-item-list"><span class="date"><?php echo date("F d - 'y | h:i A", strtotime($c_date)); ?></span>
                           <p class="activity-text m-0">Response To : 
                           <?php
                           $displaySingleArticle = $article->displaySingleArticle($c_post_id);

                           mysqli_stmt_bind_result($displaySingleArticle, $a_id, $a_cat_id, $a_title, $a_author, $author_id, $a_date, $a_image, $a_content, $a_tags, $a_com_count, $a_status, $a_view_count);
                     
                           while(mysqli_stmt_fetch($displaySingleArticle)):
                            echo "<a href='/iHeartCoding/Admin/Article/View/$c_post_id'>$a_title</a>";
                           endwhile;
                           ?>
                           </p>
                           <p class="activity-text">Comment St  : <?php echo $c_status ?></p>
                           <span class="activity-text"><?php echo $c_content ?></span>
                        </div>
                        </li>

                        <?php } ?>
                        
                     </ol>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="text-center"><a href="#" class="btn btn-primary">Load More</a></div>
                  </div>
               </div>
            </div>
            <div class="col-xl-5">
               <div class="card">
                  <div class="card-body">
                     <h4 class="mt-0 header-title mb-4">Latest Articles</h4>
                     <div class="table-responsive slimscroll" style="min-height:555px; max-height:555px">
                        <table class="table table-hover">
                           <tbody>
                              <?php 
                              $displayArticles = $article->displayAllArticles();

                       
                                 while($row = mysqli_fetch_assoc($displayArticles)){
                                    $a_id = $row['article_id'];
                                    $a_cat_id = $row['article_category_id'];
                                    $a_title = $row['article_title'];
                                    $a_author = $row['article_author'];
                                    $author_id = $row['author_id'];
                                    $a_image = $row['article_image'];
                                    $a_com_count = $row['article_comment_count'];
                                    $a_content = $row['article_content'];
                                    $a_tags = $row['article_tags'];
                                    $a_status = $row['article_status'];
                                    $a_date = $row['article_date'];
                                    $a_view_count = $row['article_view_count']; 
                                 ?>
                              <tr>
                                 <td><img class="img-fluid rounded-circle mr-2" alt="<?php echo $a_image; ?>" src="/iHeartCoding/public/upload/articles/<?php echo $a_image; ?>" style="width:40px"><?php echo $a_title; ?></td>
                                 <td>
                                    <div>
                                    <?php
                                       $displaySingleUser = $user->displaySingleUser($author_id);
                
                                       while($row = mysqli_fetch_assoc($displaySingleUser)){
                                           $user_image = $row['user_image'];
                                    ?>
                                    <img class="img-fluid rounded-circle mr-2" alt="<?php echo $user_image; ?>" src="/iHeartCoding/public/upload/users/<?php echo $user_image; ?>" style="width:40px"><?php echo $a_author; ?>
                                       <?php } ?>
                                    </div>
                                 </td>
                                 <td><?php echo date('M d Y | h:i A', strtotime($a_date)); ?></td>
                                 <td>$112</td>
                                 <td><span class="badge <?php echo ($a_status == 'Published') ? 'badge-success' : 'badge-warning' ; ?> p-1"><?php echo $a_status; ?></span></td>
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
         <!-- end row -->
         <div class="row">
            <div class="col-xl-8">
               <div class="card">
                  <div class="card-body">
                     <h4 class="mt-0 header-title mb-4">Members</h4>
                     <div class="table-responsive slimscroll" style="min-height:495px; max-height:495px">
                        <table class="table table-hover">
                           <tbody>
                           <?php

                              $displayAllUsers = $user->displayAllUsers();

                              while($row = mysqli_fetch_assoc($displayAllUsers)){
                                 $u_id = $row['user_id'];
                                 $username = $row['username'];
                                 $u_first_name = $row['user_firstName'];
                                 $u_last_name = $row['user_lastName'];
                                 $u_email = $row['user_email'];
                                 $u_image = $row['user_image'];
                                 $u_role = $row['user_role'];
                                 $u_status = $row['user_status'];

                                 $u_last_logged = null;
                                 $u_no_of_time_logged = null;

                                 $displayLoggedActivitySummary = $activity->displayLoggedActivitySummary($u_id);

                                 mysqli_stmt_bind_result($displayLoggedActivitySummary, $u_f_logged, $u_l_logged, $n_t_logged);

                                 while(mysqli_stmt_fetch($displayLoggedActivitySummary)):

                                       $u_last_logged = $u_l_logged;
                                       $u_no_of_time_logged = $n_t_logged;

                                 endwhile;
                              ?>

                              <tr>
                                 <td><?php echo $username?></td>
                                 <td>
                                    <div>
                                       <img src="/iHeartCoding/public/upload/users/<?php echo $u_image?>" alt="<?php echo $u_image?>" class="img-fluid rounded-circle mr-2" style="width:40px"> <?php echo $u_first_name." ".$u_last_name ?>
                                    </div>
                                 </td>
                                 <td><?php echo $u_role?></td>
                                 <td><span class="badge p-1 badge-<?php echo ($u_status == 'Active') ? 'success' : 'warning' ; ?>"><?php echo $u_status ?></span></td>
                                 <td><?php echo date('M d Y | h:i A', strtotime($u_last_logged)); ?></td>
                                 <td><?php echo $u_no_of_time_logged?></td>
                                 <td>
                                    <div><a href="/iHeartCoding/Admin/User/View/<?php echo $u_id ?>" class="btn btn-outline-primary btn-sm"><i class="ti-view-list-alt pr-1"></i> View</a></div>
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
            <div class="col-xl-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="mt-0 header-title mb-4">Error Console</h4>
                     <div class="chat-conversation">
                        <ul class="conversation-list slimscroll" style="min-height:480px; max-height:480px">
                           <li class="clearfix">
                              <div class="chat-avatar"><img src="../public/admin/assets/images/users/user-2.jpg" alt="male"> <span class="time">10:00</span></div>
                              <div class="conversation-text">
                                 <div class="ctext-wrap">
                                    <span class="user-name">John Deo</span>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui deleniti atque At vero eos et accusamus et iusto odio dignissimos ducimus qui deleniti atque...!</p>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end row -->
      </div>
      <!-- container-fluid -->
   </div>
   <!-- content -->
   <footer class="footer">© 2019 Veltrix <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</span>.</footer>
</div>
<!-- End Right content here -->


<?php
   include 'includes/footer.php';
?>

<script>
var data = {
  series: [5, 3, 4, 4]
};

var sum = function(a, b) { return a + b };

new Chartist.Pie('.ct-chart', data, {
  labelInterpolationFnc: function(value) {
    return Math.round(value / data.series.reduce(sum) * 100) + '%';
  }
});
</script>