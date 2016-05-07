<?php include "partials/admin_header.php" ?>
	<div id="wrapper">
<?php include "partials/admin_navigation.php" ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
				<h1 class="page-header">
					Welcome To Admin
					<small>Author</small>
        </h1>
<!--        conditional view all post from partials-->
			<?php

					if(isset($_GET['source'])) {

						$source = $_GET['source'];

					} else {

						$source = '';

					}
						switch($source) {

							case 'add_user';
								include "partials/add_user.php";
							break;

							case 'edit_user';
								include "partials/edit_user.php";
							break;

							default: 	include "partials/view_all_users.php";
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
