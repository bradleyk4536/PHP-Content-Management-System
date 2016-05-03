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
                        <div class="col-xs-6">
<!--          Add new category to category table-->

            <?php
//Check to see if submit button is clicked
							if(isset($_POST['submit'])) {

//								read the category input field

								$cat_title = $_POST['cat_title'];

//								check to see if field is empty if so echo message

								if($cat_title == "" || empty($cat_title)) {
									echo "This field should not be empty";
//									if field is not empty create the insert query

								} else {
									$query = "INSERT INTO categories(cat_title) ";
									$query .= "VALUE('{$cat_title}') ";

									$create_category_query = mysqli_query($connection, $query);

//									Test to see if query worked
									if(!$create_category_query) {
										die('QUERY FAILE' . mysqli_error($connection));
									}
								}
							}
						?>
                        	<form action="" method="post">
                        		<div class="form-group">
                        			<label for="cat_title">Add Category</label>
                        			<input type="text" name="cat_title" class="form-control">
                        		</div>
                        		<div class="form-group">

                        			<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        		</div>
                        	</form>
                        </div>
                        <div class="col-xs-6">
<!--               Query table to get all the categories         -->
            <?php
							$query = "SELECT * FROM categories";
							$select_catagories = mysqli_query($connection, $query);
						?>

                        	<table class="table table-bordered table-hover">
                        		<thead>
                        			<tr>
                        				<th>Id</th>
                        				<th>Category Title</th>
                        			</tr>
                        		</thead>
                        		<tbody>

<!--             create rows in table from category query           		-->
						<?php
							while($row = mysqli_fetch_assoc($select_catagories)) {
							$cat_id = $row['cat_id'];
							$cat_title = $row['cat_title'];
							echo "<tr><td>{$cat_id}</td>";
							echo "<td>{$cat_title}</td></tr>";
							}
						?>
                        		</tbody>
                        	</table>
                        </div>
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
