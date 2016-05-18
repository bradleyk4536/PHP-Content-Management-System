<?php include "partials/admin_header.php" ?>
<?php include "partials/admin_functions.php" ?>

    <div id="wrapper">

<?php include "partials/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin

                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>

                <!-- /.row -->

                <!-- /.row -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<!--                    count number of post in databas-->
                    <?php
											$post_counts = recordCount('posts');
											echo "<div class='huge'>{$post_counts}</div>";
										?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="./posts.php">
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
                    <?php
//											get total comment count
											$get_comment_count = recordCount('comments');
											echo "<div class='huge'>{$get_comment_count}</div>";
										?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
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
                    <?php
//											show user count
											$get_user_count = recordCount('users');
											echo "<div class='huge'>{$get_user_count}</div>";
										?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
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
                      <?php
//											show categories count
												$get_category_count = recordCount('categories');
												echo "<div class='huge'>{$get_category_count}</div>";
											?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
 							<?php
//							display how many published post in database


								$post_published_count = checkstatus('posts', 'post_status', 'Published');
//							display how many draft post in database

								$post_draft_count = checkstatus('posts', 'post_status', 'Draft');

//							display unapproved status
								$unapproved_comments_count = checkstatus('comments', 'comment_status', 'unapproved');

//							display total user for each role
								$subscribers_count = checkstatus('users', 'user_role', 'subscriber');
							?>

<!--                Using google charts to display database status-->
        <div class="row">
        	<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Date', 'Count'],

					<?php
						$element_text = ['All Posts','Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
						$element_count = [$post_counts, $post_published_count, $post_draft_count, $get_comment_count, $unapproved_comments_count, $get_user_count, $subscribers_count, $get_category_count];

					for($i = 0; $i < 8; $i++) {

						echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
					}
					?>
        ]);
        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, options);
      }
    </script>
        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

        </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "partials/admin_footer.php" ?>
