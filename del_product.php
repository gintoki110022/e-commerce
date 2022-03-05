<?php
session_start();
include('conn.php');
include('session.php');
if (isset($_POST['rem'])) {
	$id = $_POST['id'];

	mysqli_query($conn, "delete from `cart` where PRODUCT_id='$id' and CUSTOMER_id='" . $_SESSION['id'] . "'");
}
