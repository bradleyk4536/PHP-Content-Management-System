<?php
		if(isset($_POST['create_user'])) {

//		$user_id = $_POST['user_id'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_role = $_POST['user_role'];
//		$user_image = $_FILES['post_image']['name'];
//		$user_image_temp = $_FILES['post_image']['tmp_name'];
		$username = $_POST['username'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
//		$user_date = date('d-m-y');
//		move_uploaded_file($post_image_temp, "../images/$post_image");
		$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
		$query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}' )";
		$create_user_query = mysqli_query($connection, $query);
		confirm($create_user_query);
	}
?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
		<label for="author">First Name</label>
		<input type="text" class="form-control" name="user_firstname">
		</div>
		<div class="form-group">
		<label for="post_status">Last Name</label>
		<input type="text" class="form-control" name="user_lastname">
		</div>
		<div class="form-group">
			<select name="user_role" id="">
				<option value="subscriber">Select Options</option>
				<option value="admin">admin</option>
				<option value="subscriber">subscriber</option>
			</select>
		</div>
<!--
		<div class="form-group">
		<label for="post_image"></label>
		<input type="file" name="post_image">
		</div>
-->
		<div class="form-group">
		<label for="post_tags">Username</label>
		<input type="text" class="form-control" name="username">
		</div>
		<div class="form-group">
		<label for="post_content">Email</label>
		<input type="email" class="form-control" name="user_email">
		</div>
		<div class="form-group">
		<label for="post_content">Password</label>
		<input type="password" class="form-control" name="user_password">
		</div>

		<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
		</div>
</form>
