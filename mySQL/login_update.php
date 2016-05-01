<?php include "db.php";?>
<?php	include "functions.php";?>
<?php if(isset($_POST['submit'])) { updateRecord(); } ?>

<?php include "partials/header.php"; ?>


			<div class="container">
				<div class="col-sm-6">
					<h1 class="text-center">Update Record</h1>
					<form action="login_update.php" method="post">
						<div class="form-group">
						<label for="username">Username</label>
							<input type="text" class="form-control" name="username">
						</div>
						<div class="form-group">
						<label for="password">Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<div class="form-group">
							<select name="id" id="">
								<?php
								showAllData();
								?>
							</select>
						</div>
						<input class="btn btn-primary" type="submit" name="submit" value="UPDATE">
					</form>
				</div>
			</div>
<?php include "partials/footer.php"; ?>
