<!--DOCTYPE head located in includes folder-->
<?php include "database/db.php"; ?>
<?php include "partials/header.php"; ?>
<!--		Navigation located in includes folder -->
<?php include "partials/navigation.php"; ?>
    <!-- Page Content -->
<div class="container">
  <div class="row">
			<!-- Blog Entries Column -->
			<div class="col-md-8">
					<?php
				if(isset($_GET['p_id'])) {
					$the_post_id = $_GET['p_id'];
					$the_post_author = $_GET['author'];
				}
						$query = "SELECT * FROM posts WHERE post_user = '{$the_post_author}' ";
						$select_all_post_query = mysqli_query($connection, $query);
						while($row = mysqli_fetch_assoc($select_all_post_query)) {
						$post_title = $row['post_title'];
						$post_user = $row['post_user'];
						$post_date = $row['post_date'];
						$post_image = $row['post_image'];
						$post_content = $row['post_content'];
					?>
					<!-- First Blog Post -->
					<h2>
							<a href="#"> <?php echo $post_title ?> </a>
					</h2>
					<p class="lead">Posts by <?php echo $post_user ?></p>
					<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?> </p>
					<hr>
					<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
					<hr>
					<p> <?php echo $post_content ?> </p>
					<hr>
				<?php	} ?>
			</div>
				<!-- Blog Sidebar Widgets Column -->
				<?php include "partials/sidebar.php"; ?>
				<!--  End side bar-->
  </div>
        <!-- /.row -->
        <hr>
<!--Footer located in includes folder-->

<?php include "/partials/footer.php"; ?>


