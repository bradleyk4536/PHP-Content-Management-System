<?php include "partials/admin_header.php" ?>
	<div id="wrapper">
<?php include "partials/admin_navigation.php" ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
				<h1 class="page-header">
					Welcome To Comments
					<small>Author</small>
        </h1>


					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Id</th>
								<th>Author</th>
								<th>Comments</th>
								<th>Email</th>
								<th>Status</th>
								<th>Date</th>
								<th>Approved</th>
								<th>Unapproved</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
				<?php
					$query = "SELECT * FROM comments ";
					$query .= "WHERE comment_post_id =" . mysqli_real_escape_string($connection, $_GET['id']) ." ";
					$select_comments = mysqli_query($connection, $query);
					while($row = mysqli_fetch_assoc($select_comments)) {
					$comment_id = $row['comment_id'];
					$comment_post_id = $row['comment_post_id'];
					$comment_author = $row['comment_author'];
					$comment_content = $row['comment_content'];
					$comment_email = $row['comment_email'];

					$comment_status = $row['comment_status'];
					$comment_date = $row['comment_date'];

						echo "<tr>";
						echo "<td>{$comment_id}</td>";
						echo "<td>{$comment_author}</td>";
						echo "<td>{$comment_content}</td>";

//					$query = "SELECT * FROM categories WHERE cat_id = $comment_category_id ";
//					$edit_catagories = mysqli_query($connection, $query);
//					while($row = mysqli_fetch_assoc($edit_catagories)) {
//					$cat_id = $row['cat_id'];
//					$cat_title = $row['cat_title'];
//						echo "<td>{$cat_title}</td>";
//					}
						echo "<td>{$comment_email}</td>";
						echo "<td>{$comment_status}</td>";
						echo "<td>{$comment_date}</td>";

//						associate a comment to a given post using the $comment_post_id
						$query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
						$select_post_id_query = mysqli_query($connection, $query);
						while($row = mysqli_fetch_assoc($select_post_id_query)){

							$post_id = $row['post_id'];
							$post_title = $row['post_title'];

//remember to link to a given post you have to get the id of the post which incase is $post_id
//							echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
						}
						echo "<td><a href='post_comments.php?approved=$comment_id&id=" . $_GET['id'] ."'>Approved</a></td>";
						echo "<td><a href='post_comments.php?unapproved=$comment_id&id=" . $_GET['id'] ."'>Unapproved</a></td>";
						echo "<td><a href='post_comments.php?delete=$comment_id&id=" . $_GET['id'] ."'>Delete</a></td>";
						echo "</tr>";
					}
				?>
						</tbody>
					</table>
<!--					Delete function-->
	<?php

		if(isset($_GET['delete'])) {
			if(isset($_SESSION['user_role'])) {
				if($_SESSION['user_role'] == 'admin') {
					$delete_comment_id = escape($_GET['delete']);
					$query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id} ";
					$delete_query = mysqli_query($connection, $query);
					confirm($delete_query);
		//			to redirect to same page must pass in get request id
					header("Location: post_comments.php?id=" . escape($_GET['id']) ."");
				}
			}

		}
//							Set approved and unapproved in comments table
			if(isset($_GET['unapproved'])) {
			$the_comment_id = escape($_GET['unapproved']);
			$query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $the_comment_id ";
			$unapproved_comment_query = mysqli_query($connection, $query);
			confirm($unapproved_comment_query);
//				to redirect to same page must pass in get request id
			header("Location: post_comments.php?id=" . escape($_GET['id']) ."");
			}

			if(isset($_GET['approved'])) {
			$the_comment_id = escape($_GET['approved']);
			$query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $the_comment_id ";
			$approved_comment_query = mysqli_query($connection, $query);
			confirm($approved_comment_query);
//				to redirect to same page must pass in get request id
			header("Location: post_comments.php?id=" . escape($_GET['id']) ."");
		}
		?>
				</div>
			</div>
				<!-- /.row -->
		</div>
			<!-- /.container-fluid -->
	</div>
			<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
<?php include "partials/admin_footer.php" ?>

