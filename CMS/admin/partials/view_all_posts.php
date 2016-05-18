<?php
include("delete_modal.php");
	if(isset($_POST['checkBoxArray'])) {

		foreach($_POST['checkBoxArray'] as $postValueId) {

			$bulk_options = escape($_POST['bulk_options']);

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

				case 'Clone':
					$query = "SELECT * FROM posts WHERE post_id = {$postValueId} ";
					$select_query = mysqli_query($connection, $query);
					while($row = mysqli_fetch_array($select_query)) {
						$post_title = $row['post_title'];
						$post_category_id = $row['post_category_id'];
						$post_date = $row['post_date'];
						$post_user = $row['post_user'];
						$post_status = $row['post_status'];
						$post_image = $row['post_image'];
						$post_tags = $row['post_tags'];
						$post_content = $row['post_content'];
					}

						$clone_query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_tags, post_content, post_status) ";

						$clone_query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_user}', now(), '{$post_image}', '{$post_tags}', '{$post_content}', '{$post_status}') ";

						$copy_query = mysqli_query($connection, $clone_query);

						if(!$copy_query) {

							die("QUERY FAILED" . mysqli_error($connection));
						}
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
		<option value="Clone">Clone</option>
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
				<th>Users</th>
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
				<th>Views</th>
			</tr>
		</thead>
		<tbody>
<?php
//	$query = "SELECT * FROM posts ORDER BY post_id DESC";

//joining multiple tables

$query = "SELECT posts.post_id, posts.post_author, posts.post_user, posts.post_title, posts.post_category_id, posts.post_status, posts.post_image, ";
$query .= "posts.post_tags, posts.post_comment_count, posts.post_date, posts.post_views_count, categories.cat_id, categories.cat_title ";
$query .= " FROM posts ";
$query .= " LEFT JOIN categories ON posts.post_category_id = categories.cat_id ";
$query .= " ORDER BY posts.post_id DESC ";

	$select_posts = mysqli_query($connection, $query);
	confirm($select_posts);
	while($row = mysqli_fetch_assoc($select_posts)) {
	$post_id = $row['post_id'];
	$post_author = $row['post_author'];
	$post_user = $row['post_user'];
	$post_title = $row['post_title'];
	$post_category_id = $row['post_category_id'];
	$post_status = $row['post_status'];
	$post_image = $row['post_image'];
	$post_tags = $row['post_tags'];
	$post_comments = $row['post_comment_count'];
	$post_date = $row['post_date'];
	$post_views_count = $row['post_views_count'];
		//from virtual table
	$category_title = $row['cat_title'];
	$category_id = $row['cat_id'];
		echo "<tr>";
		?>
		<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id ?>'></td>
		<?php
		echo "<td>{$post_id}</td>";
		if(!empty($post_author)){
			echo "<td>{$post_author}</td>";
		} elseif(!empty($post_user)) {
			echo "<td>{$post_user}</td>";
		}
		echo "<td>{$post_title}</td>";
		echo "<td>{$category_title}</td>";
		echo "<td>{$post_status}</td>";
		echo "<td><img width=100 src='../images/$post_image'></td>";
		echo "<td>{$post_tags}</td>";

		$query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
		$send_comment_query = mysqli_query($connection, $query);
//		$row = mysqli_fetch_array($send_comment_query);
//		$comment_id = $row['comment_id'];
		$count_comments = mysqli_num_rows($send_comment_query);


		echo "<td><a href='post_comments.php?id=$post_id'>{$count_comments}</a></td>";
		echo "<td>{$post_date}</td>";
		echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
		echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
		echo "<td><a rel=$post_id href='javascript:void(0)' class='delete_link'>Delete</a></td>";
		//echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
		echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
		echo "</tr>";
	}
?>
		</tbody>
	</table>
</form>
<!--					Delete function-->
					<?php
						if(isset($_GET['delete'])) {
							$delete_post_id = escape($_GET['delete']);
							$query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";
							$delete_query = mysqli_query($connection, $query);
							confirm($delete_query);
							header("location: posts.php");
						}
						?>
<!--Reset a record counter -->
						<?php
							if(isset($_GET['reset'])) {

								$reset_views_id = escape($_GET['reset']);
								$query = "UPDATE posts SET post_views_count = 0 ";
								$query .= "WHERE post_id =" . mysql_real_escape_string($reset_views_id) . " ";
								$reset_query = mysqli_query($connection, $query);
								confirm($reset_query);
								header("Location: posts.php");
							}
						?>
<!--	target delete model and delete record					-->
<script>
	$(document).ready(function(){
		$(".delete_link").on('click', function() {
//			target post_id from database stored in a-tag rel attribute
			var id 					= $(this).attr("rel");
			var delete_url 	= "posts.php?delete= "+ id +" "; //get request
//			target model form link
			$(".modal_delete_link").attr("href", delete_url);

			$("#myModal").modal('show');
		});
	});

</script>
