<?php
session_start();
include('conn.php');
include('session.php');
if (isset($_POST['cart'])) {
	$id = $_POST['id'];
	$qty = $_POST['qty'];

	$query = mysqli_query($conn, "select * from cart where PRODUCT_id='$id' and CUSTOMER_id='" . $_SESSION['id'] . "'");
	if (mysqli_num_rows($query) > 0) {
		echo "Product already on your cart!";
	} else {
		mysqli_query($conn, "insert into cart (CUSTOMER_id, PRODUCT_id, qty) values ('" . $_SESSION['id'] . "', '$id', '$qty')");
	}
}
