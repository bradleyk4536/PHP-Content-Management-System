
<?php

if(isset($_GET['edit_user'])) {

	 $edit_user_id = $_GET['edit_user'];

					$query = "SELECT * FROM users WHERE user_id =  $edit_user_id ";
					$edit_users = mysqli_query($connection, $query);
					while($row = mysqli_fetch_assoc($edit_users)) {
					$user_id = $row['user_id'];
					$username = $row['username'];
					$user_password = $row['user_password'];
					$user_firstname = $row['user_firstname'];
					$user_lastname = $row['user_lastname'];
					$user_email = $row['user_email'];
					$user_image = $row['user_image'];
					$user_role = $row['user_role'];
					}
	}
	if(isset($_POST['edit_user'])) {

					$user_firstname = $_POST['user_firstname'];
					$user_lastname = $_POST['user_lastname'];
					$user_role = $_POST['user_role'];
					$username = $_POST['username'];

					$user_email = $_POST['user_email'];
					$user_password = $_POST['user_password'];

//					move_uploaded_file($post_image_temp, "../images/$post_image");


					$update_user_query = "UPDATE users SET ";
					$update_user_query .="user_firstname = '{$user_firstname}', ";
					$update_user_query .="user_lastname = '{$user_lastname}', ";
					$update_user_query .="user_role = '{$user_role}', ";
					$update_user_query .="username = '{$username}', ";
					$update_user_query .="user_email = '{$user_email}', ";
					$update_user_query .="user_password = '{$user_password}' ";
					$update_user_query .= "WHERE user_id = {$edit_user_id} ";
					$update_user = mysqli_query($connection, $update_user_query);
					confirm($update_user);


	}
?>
	<form action="" method="post" enctype="multipart/form-data">

		<div class="form-group">
		<label for="author">First Name</label>
		<input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
		</div>

		<div class="form-group">
		<label for="post_status">Last Name</label>
		<input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
		</div>



		<div class="form-group">
			<select name="user_role" id="">
				<option value="subscriber"><?php echo $user_role; ?> </option>

					<?php
					if($user_role == 'admin') {
						echo "<option value='subscriber'>subscriber</option>";
					} else {
						echo "<option value='admin'>admin</option>";
					}

					?>


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
		<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
		</div>

		<div class="form-group">
		<label for="post_content">Email</label>
		<input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
		</div>

		<div class="form-group">
		<label for="post_content">Password</label>
		<input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
		</div>

		<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
		</div>
</form>
