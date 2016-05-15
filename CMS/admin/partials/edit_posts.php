
<?php

if(isset($_GET['p_id'])) {

	$update_query_id = escape($_GET['p_id']);

}
					$query = "SELECT * FROM posts WHERE post_id = $update_query_id ";
					$select_posts_by_id = mysqli_query($connection, $query);

					while($row = mysqli_fetch_assoc($select_posts_by_id)) {
						$post_id 					= $row['post_id'];
						$post_user 				= $row['post_user'];
						$post_title 			= escape($row['post_title']);
						$post_category_id = $row['post_category_id'];
						$post_status 			= $row['post_status'];
						$post_image 			= $row['post_image'];
						$post_content 		= $row['post_content'];
						$post_tags 				= $row['post_tags'];
						$post_comments 		= $row['post_comment_count'];
						$post_date 				= $row['post_date'];
					}
	if(isset($_POST['create_post'])) {

					$post_title 			= escape($_POST['post_title']);
					$post_user 				= escape($_POST['post_user']);
					$post_category_id = escape($_POST['post_category']);
					$post_status 			= escape($_POST['post_status']);
					$post_image 			= escape($_FILES['post_image']['name']);
					$post_image_temp 	= escape($_FILES['post_image']['tmp_name']);
					$post_content 		= $_POST['post_content'];
					$post_tags 				= escape($_POST['post_tags']);

					move_uploaded_file($post_image_temp, "../images/$post_image");

//				retain image after update
					if(empty($post_image)) {

						$query = "SELECT * FROM posts WHERE post_id = $update_query_id ";
						$select_image = mysqli_query($connection, $query);
						while($row = mysqli_fetch_array($select_image)) {
							$post_image = $row['post_image'];
						}
					}
					$update_post_query = "UPDATE posts SET ";
					$update_post_query .="post_title = '{$post_title}', ";
					$update_post_query .="post_category_id = '{$post_category_id}', ";
					$update_post_query .="post_date = now(), ";
					$update_post_query .="post_user = '{$post_user}', ";
					$update_post_query .="post_status = '{$post_status}', ";
					$update_post_query .="post_tags = '{$post_tags}', ";
					$update_post_query .="post_content = '{$post_content}', ";
					$update_post_query .="post_image = '{$post_image}' ";
					$update_post_query .= "WHERE post_id = {$update_query_id} ";
					$update_post = mysqli_query($connection, $update_post_query);
					confirm($update_post);

				echo "<div class='alert alert-success alert-dismissable' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>POST SUCCESSFULLY UPDATED</strong></div>";
	}
?>


	<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
	<label for="title">Post Title</label>
	<input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
	</div>

	<div class="form-group">
	<label for="post_category">Categories</label>
	<select name="post_category" id="">

<!--		populate category dropdown -->
		<?php
			$query = "SELECT * FROM categories ";
			$select_catagories = mysqli_query($connection, $query);
			confirm(	$select_catagories);
			while($row = mysqli_fetch_assoc($select_catagories)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];
			echo "<option value='$cat_id'>{$cat_title}</option>";
			}
		?>
	</select>
	</div>
<!--
	<div class="form-group">
	<label for="author">Post Author</label>
	<input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
	</div>
-->
<div class="form-group">
		<label for="post_user">Users</label>
		<select name="post_user" id="">
			<?php echo "<option value='$post_user'>{$post_user}</option>";?>
			<?php
				$get_users_query = "SELECT * FROM users ";
				$select_users = mysqli_query($connection, $get_users_query);
				confirm($select_users);
				while($row = mysqli_fetch_assoc($select_users)) {
					$user_id = $row['user_id'];
					$username = $row['username'];
					echo "<option value='$username'>{$username}</option>";
				}
			?>
		</select>
		</div>
	<div class="form-group">
	<label for="post_status">Post Status</label>
	<div class="form-group">
		<select name="post_status" id="" class="form-control">
		<option value='<?php echo $post_status ?>'><?php echo $post_status ?></option>

		<?php
			if($post_status == 'Published') {

				echo "<option value='Draft'>Draft</option>";

			} else {

				echo "<option value='Published'>Published</option>";
			}
			?>


	</select>

	</div>
		</div>


<!--
	<input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
	</div>
-->

	<div class="form-group">
	<img src="../images/<?php echo $post_image; ?>" alt="" width= 100>
	<input type="file" name="post_image">
	</div>

	<div class="form-group">
	<label for="post_tags">Post Tags</label>
	<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
	</div>

	<div class="form-group">
  <label for="post_content">Post Content</label>
	<textarea class="form-control" name="post_content" id="" cols="30" rows="10" ><?php echo $post_content; ?></textarea>
	</div>

	<div class="form-group">
	<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>

</form>
