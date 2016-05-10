<?php include "partials/admin_header.php" ?>

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
											$query = "SELECT * FROM posts ";
											$select_all_post = mysqli_query($connection, $query);
											$post_counts = mysqli_num_rows($select_all_post);
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
											$query = "SELECT * FROM comments ";
											$comment_query = mysqli_query($connection, $query);
											$get_comment_count = mysqli_num_rows($comment_query);
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
											$query = "SELECT * FROM users ";
											$user_query = mysqli_query($connection, $query);
											$get_user_count = mysqli_num_rows($user_query);
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
												$query = "SELECT * FROM categories ";
												$category_query = mysqli_query($connection, $query);
												$get_category_count = mysqli_num_rows($category_query);
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

								$query = "SELECT * FROM posts WHERE post_status = 'Published' ";
								$select_all_published_posts = mysqli_query($connection, $query);
								$post_published_count = mysqli_num_rows($select_all_published_posts);

//							display how many draft post in database
								$query = "SELECT * FROM posts WHERE post_status = 'Draft' ";
								$select_all_draft_posts = mysqli_query($connection, $query);
								$post_draft_count = mysqli_num_rows($select_all_draft_posts);


//							display how many draft post in database
								$query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
								$unapproved_comments = mysqli_query($connection, $query);
								$unapproved_comments_count = mysqli_num_rows($unapproved_comments);


//							display how many draft post in database
								$query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
								$select_all_subscribers = mysqli_query($connection, $query);
								$subscribers_count = mysqli_num_rows($select_all_subscribers);
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
