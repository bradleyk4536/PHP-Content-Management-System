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

							case 'add_post';
								include "partials/add_posts.php";
							break;

							case 'edit_post';
								include "partials/edit_posts.php";
							break;

							default: 	include "partials/view_all_posts.php";
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
