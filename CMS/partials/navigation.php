
<?php session_start() ?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<!--                    add php links to application   -->
						<?php
							$query = "SELECT * FROM categories";
							$select_all_catagories_query = mysqli_query($connection, $query);
							while($row = mysqli_fetch_assoc($select_all_catagories_query)) {
								$cat_title = $row['cat_title'];
								$cat_id = $row['cat_id'];

//								Showing active links in dynamic navigation bar
								$category_class 		= '';
								$registration_class = '';
								$contact_class = '';
								$registration = 'registration.php';
								$contact = 'contact.php';
								
								$pageName = basename($_SERVER['PHP_SELF']);

								if(isset($_GET['category']) && $_GET['category'] == $cat_id) {

									$category_class = 'active';
								}
									switch($pageName) {

										case $registration:
											$registration_class = 'active';
										break;

										case $contact:
											$contact_class = 'active';
										break;

									}
								echo "<li class='$category_class'><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
							}
						?>
                    <li><a href="admin">Admin</a></li>
                    <li class='<?php echo $registration_class ?>'><a href="registration.php">Registration</a></li>
                    <li class='<?php echo $contact_class ?>'><a href="contact.php">Contact</a></li>
				<?php
					if(isset($_SESSION['user_role'])) {

						if(isset($_GET['p_id'])) {

							$post_id = $_GET['p_id'];

				echo "<li><a href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit Post</a></li>";
						}
					}
				?>

<!--
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
