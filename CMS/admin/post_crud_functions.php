<?php
function create_post() {
	global $connection;

	if(isset($_POST['create_post'])) {

		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category_id'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		$post_comment_count = 4;
		move_uploaded_file($post_image_temp, "../images/$post_image");
		$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
		$query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}' )";
		$create_post_query = mysqli_query($connection, $query);
		confirm($create_post_query);
	}
}
function confirm($result) {
	global $connection;

	if(!$result) {
		die("UNABLE TO CREATE" . mysqli_error($connection));
	}
}

function populate_category_dropdown() {
	global $connection;
	$query = "SELECT * FROM categories ";
			$select_catagories = mysqli_query($connection, $query);
			confirm(	$select_catagories);
				while($row = mysqli_fetch_assoc($select_catagories)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
					echo "<option value='$cat_id'>{$cat_title}</option>";
				}
}
?>
