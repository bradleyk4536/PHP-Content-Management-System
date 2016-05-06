					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Id</th>
								<th>Username</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
				<?php
					$query = "SELECT * FROM users";
					$select_users = mysqli_query($connection, $query);
					while($row = mysqli_fetch_assoc($select_users)) {
					$user_id = $row['user_id'];
					$username = $row['username'];
					$user_password = $row['user_password'];
					$user_firstname = $row['user_firstname'];
					$user_lastname = $row['user_lastname'];
					$user_email = $row['user_email'];
					$user_image = $row['user_image'];
					$user_role = $row['user_role'];

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

//						associate a comment to a given post using the $comment_post_id
						$query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
						$select_post_id_query = mysqli_query($connection, $query);
						while($row = mysqli_fetch_assoc($select_post_id_query)){

							$post_id = $row['post_id'];
							$post_title = $row['post_title'];

//remember to link to a given post you have to get the id of the post which incase is $post_id
							echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
						}


						echo "<td>{$comment_date}</td>";
						echo "<td><a href='comments.php?approved=$comment_id'>Approved</a></td>";
						echo "<td><a href='comments.php?unapproved=$comment_id'>Unapproved</a></td>";
						echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
						echo "</tr>";
					}
				?>
						</tbody>
					</table>
<!--					Delete function-->
	<?php

		if(isset($_GET['delete'])) {
			$delete_comment_id = $_GET['delete'];
			$query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id} ";
			$delete_query = mysqli_query($connection, $query);
			confirm($delete_query);
			header("Location: comments.php");
		}
//							Set approved and unapproved in comments table

			if(isset($_GET['unapproved'])) {
			$the_comment_id = $_GET['unapproved'];
			$query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
			$unapproved_comment_query = mysqli_query($connection, $query);
			confirm($unapproved_comment_query);
			header("Location: comments.php");
			}

			if(isset($_GET['approved'])) {
			$the_comment_id = $_GET['approved'];
			$query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
			$approved_comment_query = mysqli_query($connection, $query);
			confirm($approved_comment_query);
			header("Location: comments.php");
		}

		?>


