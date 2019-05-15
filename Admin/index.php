<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <div class='huge'><?php echo $article->displayAllPublishedArticleCount(); ?></div>
                                <div>Articles</div>
                            </div>
                        </div>
                    </div>
                    <a href="articles">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $comment->displayAllApprovedCommentCount(); ?></div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="comments">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <div class='huge'><?php echo $user->displayActiveUserCount(); ?></div>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="users">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $category->displayCategoryCount(); ?></div>
                                    <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="categories">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <canvas id="myChart" width="150" height="100"></canvas>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<!-- Footer -->
<?php include 'includes/footer.php'; ?>
<script>
    var ctx01 = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx01, {
        type: 'bar',
        data: {
            labels: ["Articles", "Published", "Drafted", "Comments", "Approved", "Pending", "Users", "Active", "Disabled"],
            datasets: [{
                    data: [<?php echo $article->displayAllArticleCount(); ?>,
                        <?php echo $article->displayAllPublishedArticleCount(); ?>,
                        <?php echo $article->displayAllDraftedArticleCount(); ?>,
                        <?php echo $comment->displayAllCommentCount(); ?>,
                        <?php echo $comment->displayAllApprovedCommentCount(); ?>,
                        <?php echo $comment->displayAllPendingCommentCount(); ?>,
                        <?php echo $user->displayUserCount(); ?>,
                        <?php echo $user->displayActiveUserCount(); ?>,
                        <?php echo $user->displayDisabledUserCount(); ?>],
                    backgroundColor: [
                        'rgba(51, 122, 183, 0.8)', //Primary Blue
                        'rgba(54, 162, 235, 0.8)', //Blue
                        'rgba(0, 188, 212, 0.8)', //Marine Blue
                        'rgba(153, 102, 255, 0.8)', //Deep Purple
                        'rgba(156, 39, 176, 0.8)', //Purple
                        'rgba(206, 62, 232, 0.8)', //Light Purple
                        'rgba(251, 140, 0, 0.8)', //Yellow
                        'rgba(255, 159, 64, 0.8)', //Amber
                        'rgba(255, 206, 86, 1)', //Light Yellow
                    ],
                    borderColor: [
                        'rgba(51, 122, 183, 1)', //Primary Blue
                        'rgba(54, 162, 235, 1)', //Blue
                        'rgba(0, 188, 212, 1)', //Marine Blue
                        'rgba(153, 102, 255, 1)', //Deep Purple
                        'rgba(156, 39, 176, 1)', //Purple
                        'rgba(206, 62, 232, 1)', //Light Purple
                        'rgba(251, 140, 0, 0.8)', //Yellow
                        'rgba(255, 159, 64, 1)', //Amber
                        'rgba(255, 206, 86, 1)', //Light Yellow
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                        scaleLabel: {
                            display: false,
                            labelString: 'Statistics',
                            fontSize: 15
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                xAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
            }
        }
    });
</script>

