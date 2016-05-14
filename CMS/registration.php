<?php  include "database/db.php"; ?>
 <?php  include "partials/header.php"; ?>

 <?php
	if(isset($_POST['submit'])) {

//		extract the fields

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

//		sanitize data
		$username = mysqli_real_escape_string($connection, $username);
		$email 		= mysqli_real_escape_string($connection, $email);
		$password = mysqli_real_escape_string($connection, $password);

//	password encryption
		$password = password_hash( $password, PASSWORD_BCRYPT, array('cost => 12') );

//		check fields are not empty
		if(!empty($username) && !empty($email) && !empty ($password)) {

						$query = "INSERT INTO users (username, user_email, user_password, user_role) ";
						$query .= "VALUES ('{$username}', '{$email}', '{$password}', 'subscriber') ";
						$register_user = mysqli_query($connection, $query);
						if(!$register_user) {
							die("QUERY FAILED" . mysqli_error($connection));
						} else {

							echo "<div class='alert alert-success alert-dismissable' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>YOU HAVE SUCCESSFULLY REGISTERED</strong></div>";
						}
		} else {
			echo "<div class='alert alert-danger alert-dismissable' role='alert'>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>FIELDS CAN NOT BE EMPTY</strong></div>";
		}
	}
	?>
    <!-- Navigation -->

    <?php  include "partials/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "partials/footer.php";?>
