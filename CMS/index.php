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
//				pagination system
//				get total posts
						$post_count_query = "SELECT * FROM posts ";
						$find_count = mysqli_query($connection, $post_count_query);
						$count = mysqli_num_rows($find_count);

						$count = ceil($count / 5);
						if(isset($_GET['page'])) {
							$page = $_GET['page'];
						} else {
							$page = "";
						}
						if($page == "" || $page == 1) {
							$page_1 = 0;
						} else {
							$page_1 = ($page * 5) - 5;
						}

						$query = "SELECT * FROM posts LIMIT $page_1, 5 ";
						$select_all_post_query = mysqli_query($connection, $query);
						while($row = mysqli_fetch_assoc($select_all_post_query)) {
						$post_id = $row['post_id'];
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_date = $row['post_date'];
						$post_image = $row['post_image'];

//							truncate text using substr function
						$post_content = substr($row['post_content'],0,100);

						$post_status = $row['post_status'];
//
							if($post_status == 'Published') {
								?>
					<!-- First Blog Post -->
					<h2>
							<a href="post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title ?> </a>
					</h2>
					<p class="lead">
							by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"> <?php echo $post_author ?> </a>
					</p>
					<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?> </p>
					<hr>
					<a href="post.php?p_id=<?php echo $post_id; ?>">
					<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
					</a>
					<hr>
					<p> <?php echo $post_content ?> </p>
					<a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
					<hr>							
				<?php	} } ?>


			</div>

				<!-- Blog Sidebar Widgets Column -->

				<?php include "partials/sidebar.php"; ?> 


				<!--  End side bar-->

  </div>
        <!-- /.row -->
        <hr>

<!--        PAGINATION-->
     <ul class="pager">
    <?php
			 for($i = 1; $i<= $count; $i++ ) {

				 if($i == $page) {

					 echo "<li><a class='active_link' href='index.php?page=$i'>{$i}</a></li>";
				 } else {

					 echo "<li><a href='index.php?page=$i'>{$i}</a></li>";
				 }

			 }
		?>
     </ul>


        <!--Footer located in includes folder-->
        
				<?php include "/partials/footer.php"; ?>
				
				
