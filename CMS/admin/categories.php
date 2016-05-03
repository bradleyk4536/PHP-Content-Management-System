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
            <?php create_category(); ?>
<!--                       	Add category form-->
                        	<form action="" method="post">
                        		<div class="form-group">
                        			<label for="cat_title">Add Category</label>
                        			<input type="text" name="cat_title" class="form-control">
                        		</div>
                        		<div class="form-group">
                        			<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        		</div>
                        	</form>
<!--            Update and include categories                        	-->
                <?php update_category(); ?>
                        </div>
                        <div class="col-xs-6">
                        	<table class="table table-bordered table-hover">
                        		<thead>
                        			<tr>
                        				<th>Id</th>
                        				<th>Category Title</th>
                        			</tr>
                        		</thead>
                        		<tbody>
<!--             find all categories query           		-->
						<?php read_categories(); ?>
<!--                Delete category for table query      		-->
            <?php delete_category(); ?>
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
