<?php include "partials/header.php" ?>

    <div id="wrapper">

<?php include "partials/navigation.php" ?>

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
                        	<form action="" method="get">
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
                        	<table class="table table-bordered table-hover">
                        		<thead>
                        			<tr>
                        				<th>Id</th>
                        				<th>Category Title</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<tr>
                        				<td>Baseball Category</td>
                        				<td>Basketball Category</td>
                        			</tr>
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
<?php include "partials/footer.php" ?>
