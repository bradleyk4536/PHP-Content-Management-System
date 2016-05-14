<?php
		if(isset($_POST['create_post'])) {
		$post_title = escape($_POST['title']);
		$post_user = $_POST['post_user'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		move_uploaded_file($post_image_temp, "../images/$post_image");
		$query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_status) ";
		$query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_user}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' )";
		$create_post_query = mysqli_query($connection, $query);
		confirm($create_post_query);

				echo "<div class='alert alert-success alert-dismissable' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>POST SUCCESSFULLY ADDED</strong></div>";
	}
?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
		</div>
		<div class="form-group">
		<label for="post_category">Category</label>
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
		<div class="form-group">
		<label for="post_user">Post Author</label>
		<select name="post_user" id="">
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
		<select name="post_status" id="" class="form-control">
			<option value="Draft">Post Status</option>
			<option value="Published">Published</option>
			<option value="Draft">Draft</option>
		</select>
		</div>
		<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="post_image">
		</div>
		<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
		</div>
		<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10" ></textarea>
		</div>
		<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
		</div>
</form>
