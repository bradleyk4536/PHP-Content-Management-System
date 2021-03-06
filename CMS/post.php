<!--DOCTYPE head located in includes folder-->
<?php include "database/db.php"; ?>
<?php include "partials/header.php"; ?>
<?php include "admin/post_crud_functions.php"; ?>
<!--		Navigation located in includes folder -->

<?php include "partials/navigation.php"; ?>

    <!-- Page Content -->
<div class="container">

  <div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

					<?php

				if(isset($_GET['p_id'])) {

					$the_post_id = escape($_GET['p_id']);

							$view_query = "UPDATE posts SET post_views_count = post_views_count + 1 ";
							$view_query .= "WHERE post_id = $the_post_id ";
				    	$send_query = mysqli_query($connection, $view_query);

					if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
						$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
					} else {
						$query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'Published' ";
					}

						$select_all_post_query = mysqli_query($connection, $query);
						confirm($select_all_post_query);
						if(mysqli_num_rows($select_all_post_query) < 1) {
							echo "<div class='alert alert-warning alert-dismissable text-center' role='alert'>
			  				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>NO BLOG POST AVAILABLE FOR SELECT CATEGORY</strong></div>";
						} else {
						while($row = mysqli_fetch_assoc($select_all_post_query)) {
						$post_title = $row['post_title'];
						$post_author = $row['post_user'];
						$post_date = $row['post_date'];
						$post_image = $row['post_image'];
						$post_content = $row['post_content'];
					?>
					<!-- First Blog Post -->
					<h2>
							<a href="#"> <?php echo $post_title ?> </a>
					</h2>
					<p class="lead">
							by <a href="index.php"> <?php echo $post_author ?> </a>
					</p>
					<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?> </p>
					<hr>
					<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
					<hr>
					<p> <?php echo $post_content ?> </p>
					<hr>
				<?php	}



				?>

<!-- Blog Comments -->

		<!-- Comments Form -->
		<div class="well">
				<h4>Leave a Comment:</h4>

				<?php
					if(isset($_POST['create_comment'])) {

						$the_post_id = $_GET['p_id'];

						$comment_author 	= escape($_POST['comment_author']);
						$comment_email 		= escape($_POST['comment_email']);
						$comment_content 	= escape($_POST['comment_content']);

//						Check fields to see if filled out before running query

						if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){

							$query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
							$query .= "VALUES($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', now())";
								$create_comment_query = mysqli_query($connection, $query);
								if(!$create_comment_query) {
									die("QUERY FAILED" . mysqli_error($connection));
								}
		//						update post_comment_count in posts table by 1
								$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
								$query .= "WHERE post_id = $the_post_id ";
								$update_comment_count = mysqli_query($connection, $query);
								if(!$update_comment_count) {
									die("QUERY FAILED" . mysqli_error($connection));
						}
						} else {

							echo "<script>alert('Fields cannot be empty')</script>";
						}
					}
				?>
				<form role="form" action="" method="post">
						<div class="form-group">
						<label for="comment_author">Comment Author</label>
						<input class="form-control" type="text" name="comment_author">
						</div>
						<div class="form-group">
						<label for="comment_email">Email Address</label>
						<input class="form-control" type="email" name="comment_email">

						</div>

						<div class="form-group">
								<label for="">Comment</label>
								<textarea class="form-control" rows="3" name="comment_content"></textarea>
						</div>
						<button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
				</form>
		</div>

		<hr>

		<!-- query comments datebase to get all comments for a given post -->

		<?php
				$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
				$query .= "AND comment_status = 'approved' ";
				$query .= "ORDER BY comment_id DESC ";
				$select_comment_query = mysqli_query($connection, $query);

				if(!$select_comment_query) {

					die("QUERY FAILED" . mysqli_error($connection));
				}
				while ($row = mysqli_fetch_array($select_comment_query)) {

					$comment_date = $row['comment_date'];
					$comment_content = $row['comment_content'];
					$comment_author = $row['comment_author'];
					?>
						<!-- Comment -->
		<div class="media">
				<a class="pull-left" href="#">
						<img class="media-object" src="http://placehold.it/64x64" alt="">
				</a>
				<div class="media-body">
						<h4 class="media-heading"><?php echo $comment_author; ?>
								<small><?php echo $comment_date; ?></small>
						</h4>
						<p><?php echo $comment_content; ?></p>
				</div>
		</div>
	<?php }	} } else {
					header("Location: index.php");
				}
		?>
			</div>
				<!-- Blog Sidebar Widgets Column -->

				<?php include "partials/sidebar.php"; ?>
				<!--  End side bar-->
  </div>
        <!-- /.row -->
        <hr>
        <!--Footer located in includes folder-->
				<?php include "partials/footer.php"; ?>


