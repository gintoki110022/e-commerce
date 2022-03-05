<?php
session_start();
include('conn.php');
if (isset($_POST['ss'])) {
	$search = $_POST['name'];
	$query = mysqli_query($conn, "select * from `PRODUCT` where product_name like '%$search%' limit 5");
	if (mysqli_num_rows($query) == 0) {

?>
		<div style="position:relative">No results found</div>
		<?php

	} else {

		while ($row = mysqli_fetch_array($query)) {
		?>

			<div class="livesearch-dropdown">
				<a href="search-<?php echo $row['product_id']; ?>.html"><?php echo $row['product_name']; ?></a><br><br>
			</div>

<?php
		}
	}
}
?>