<div class="col-md-4">
				<!-- Blog Search Well -->
				<div class="well">
						<h4>Blog Search</h4>
<!--						Search form-->
						<form action="search.php" method="post">
							<div class="input-group">
								<input name="search" type="text" class="form-control">
								<span class="input-group-btn">
										<button type="submit" name="submit" class="btn btn-default">
												<span class="glyphicon glyphicon-search"></span>
								</button>
								</span>
						</div>
						</form> <!--End search form-->
						<!-- /.input-group -->
				</div>

				<!-- Login -->
				<div class="well">
						<h4>Login</h4>
<!--						Search form-->
						<form action="partials/login.php" method="post">
							<div class="form-group">
								<input name="username" type="text" class="form-control" placeholder="Enter username">

						</div>
						<div class="input-group">
								<input name="password" type="password" class="form-control" placeholder="Enter password">
								<span class="input-group-btn">
									<button class="btn btn-primary" name="login" type="submit">Submit</button>
								</span>
						</div>
						</form> <!--End search form-->
						<!-- /.input-group -->
				</div>


				<!-- Blog Categories Well -->
				<div class="well">
					<?php
						$query = "SELECT * FROM categories";
						$select_catagories_sidebar = mysqli_query($connection, $query);
					?>
						<h4>Blog Categories</h4>
						<div class="row">
							<div class="col-lg-12">
								<ul class="list-unstyled">
									<?php
										while($row = mysqli_fetch_assoc($select_catagories_sidebar)) {
										$cat_title = $row['cat_title'];
										$cat_id = $row['cat_id'];

// The href contains the cat_id from the category table when click it is opens the category.php page
										echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
										}
									?>
								</ul>
							</div>
						</div>
						<!-- /.row -->
				</div>
				<!-- Side Widget Well -->
      		<?php include "widget.php"; ?>
      </div>
