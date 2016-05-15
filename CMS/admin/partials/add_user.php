<?php
		if(isset($_POST['create_user'])) {

//		$user_id = $_POST['user_id'];
		$user_firstname = escape($_POST['user_firstname']);
		$user_lastname = escape($_POST['user_lastname']);
		$user_role = escape($_POST['user_role']);
		$username = escape($_POST['username']);
		$user_email = escape($_POST['user_email']);
		$user_password = escape($_POST['user_password']);

//		password encryption
			$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost => 10') );

//		$user_date = date('d-m-y');
//		move_uploaded_file($post_image_temp, "../images/$post_image");
		$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
		$query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}' )";
		$create_user_query = mysqli_query($connection, $query);
		confirm($create_user_query);

			echo "<div class='alert alert-success alert-dismissable' role='alert'>
			 <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>USER SUCCESSFULLY CREATED</strong></div>";
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
