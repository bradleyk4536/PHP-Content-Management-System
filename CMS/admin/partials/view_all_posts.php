<?php
	if(isset($_POST['checkBoxArray'])) {

		foreach($_POST['checkBoxArray'] as $postValueId) {

			$bulk_options = $_POST['bulk_options'];

			switch($bulk_options) {

				case 'Published':
					$query = "UPDATE posts SET post_status = '{$bulk_options}' ";
					$query .= "WHERE post_id = {$postValueId} ";
					$update_publish_status = mysqli_query($connection, $query);
					confirm($update_publish_status);
					break;

				case 'Draft':
					$query = "UPDATE posts SET post_status = '{$bulk_options}' ";
					$query .= "WHERE post_id = {$postValueId} ";
					$update_draft_staus = mysqli_query($connection, $query);
					confirm($update_draft_staus);
					break;

				case 'Delete':
					$query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
					$delete_post = mysqli_query($connection, $query);
					confirm($delete_post);
				break;
			}
		}
	}
?>
<form action="" method="post">

<div id="bulkOptionContainer" class="col-xs-4">
	<select name="bulk_options" id="" class="form-control">
		<option value="">Select Options</option>
		<option value="Published">Publish</option>
		<option value="Draft">Draft</option>
		<option value="Delete">Delete</option>
	</select>
</div>
	<div class="col-xs-4">
		<input type="submit" class="btn btn-success" name="submit" value="Apply">
		<a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th><input id="selectAllBoxes" type="checkbox"></th>
				<th>Id</th>
				<th>Author</th>
				<th>Title</th>
				<th>Category</th>
				<th>Status</th>
				<th>Image</th>
				<th>Tags</th>
				<th>Comments</th>
				<th>Date</th>
				<th>View Post</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php
	$query = "SELECT * FROM posts";
	$select_posts = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($select_posts)) {
	$post_id = $row['post_id'];
	$post_author = $row['post_author'];
	$post_title = $row['post_title'];
	$post_category_id = $row['post_category_id'];
	$post_status = $row['post_status'];
	$post_image = $row['post_image'];
	$post_tags = $row['post_tags'];
	$post_comments = $row['post_comment_count'];
	$post_date = $row['post_date'];
		echo "<tr>";
		?>
		<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id ?>'></td>

		<?php
		echo "<td>{$post_id}</td>";
		echo "<td>{$post_author}</td>";
		echo "<td>{$post_title}</td>";
	$query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
	$edit_catagories = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($edit_catagories)) {
	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];
		echo "<td>{$cat_title}</td>";
	}
		echo "<td>{$post_status}</td>";
		echo "<td><img width=100 src='../images/$post_image'></td>";
		echo "<td>{$post_tags}</td>";
		echo "<td>{$post_comments}</td>";
		echo "<td>{$post_date}</td>";
		echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
		echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
		echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
		echo "</tr>";
	}
?>
		</tbody>
	</table>
</form>
<!--					Delete function-->
					<?php

						if(isset($_GET['delete'])) {
							$delete_post_id = $_GET['delete'];
							$query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";
							$delete_query = mysqli_query($connection, $query);
							confirm($delete_query);
							header("location: posts.php");
						}

						?>
