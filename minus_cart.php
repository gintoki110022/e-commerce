<?php
session_start();
include('conn.php');
include('session.php');
if (isset($_POST['min'])) {
	$id = $_POST['id'];

	$query = mysqli_query($conn, "select * from cart where PRODUCT_id='$id'");
	$row = mysqli_fetch_array($query);

	$newqty = $row['qty'] - 1;

	if ($newqty == 0) {
		mysqli_query($conn, "delete from cart where PRODUCT_id='$id'");
	} else {
		mysqli_query($conn, "update cart set qty='$newqty' where PRODUCT_id='$id'");
	}
}
