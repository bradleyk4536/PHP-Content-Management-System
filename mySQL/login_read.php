<?php include "db.php" ?>
<?php include "functions.php"; ?>

	<?php include "partials/header.php"; ?>

	<div class="container">
		<div class="col-sm-6">
			<pre>
				<?php readRecord(); ?>
			</pre>
		</div>
	</div>
<?php include "partials/footer.php"; ?>
