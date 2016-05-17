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

//				Then this page is displayed the $_GET super global captures the URL category id and then it is saved into the $post_category_id variable. It is then sent to the $query where it selects all the post from a given category

				if(isset($_GET['category'])){

					$post_category_id = $_GET['category'];


						$query = "SELECT * FROM posts WHERE post_category_id = $post_category_id  AND post_status = 'published' ";
						$select_all_post_query = mysqli_query($connection, $query);

						if(mysqli_num_rows($select_all_post_query) < 1) {

							echo "<div class='alert alert-warning alert-dismissable text-center' role='alert'>
			  				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>NO BLOG POST AVAILABLE FOR SELECT CATEGORY</strong></div>";
						} else {

						while($row = mysqli_fetch_assoc($select_all_post_query)) {
						$post_id = $row['post_id'];
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_date = $row['post_date'];
						$post_image = $row['post_image'];
						$post_content = substr($row['post_content'],0,100);
					?>
					<h1 class="page-header">
							Page Heading
							<small>Secondary Text</small>
					</h1>
					<!-- First Blog Post -->
					<h2>
							<a href="post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title ?> </a>
					</h2>
					<p class="lead">
							by <a href="index.php"> <?php echo $post_author ?> </a>
					</p>
					<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?> </p>
					<hr>
					<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
					<hr>
					<p> <?php echo $post_content ?> </p>
					<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
					<hr>
				<?php	} } } else {

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


