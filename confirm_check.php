<?php
session_start();
include('conn.php');
include('session.php');
$total = $_GET['total'];

if (preg_match("/^[0-9,]+$/", $total)) {
	$new = $total;
} else {
	$new = str_replace(',', '', $total);
}

mysqli_query($conn, "insert into sales (CUSTOMER_id, sale_total_price, sale_date, customer_name) values ('" . $_SESSION['id'] . "', '$new', NOW(), '" . $_SESSION['name'] . "')");
$sid = mysqli_insert_id($conn);

$query = mysqli_query($conn, "select * from cart where CUSTOMER_id='" . $_SESSION['id'] . "'");
while ($row = mysqli_fetch_array($query)) {
	$r = mysqli_query($conn, "select product_name, product_price from product where product_id = ". $row['PRODUCT_id']);
	$product = mysqli_fetch_array($r);

	mysqli_query($conn, "insert into sales_item (SALES_id, PRODUCT_id, product_name, sale_price, sale_qty) values ('$sid', '" . $row['PRODUCT_id'] . "', '" . $product['product_name'] . "', '" . $product['product_price'] . "', '". $row['qty'] . "')");

	$pro = mysqli_query($conn, "select * from product where product_id='" . $row['PRODUCT_id'] . "'");
	$prorow = mysqli_fetch_array($pro);
	$product_name = $prorow['product_name'];

	$newqty = $prorow['product_qty'] - $row['qty'];

	mysqli_query($conn, "update product set product_qty='$newqty' where product_id='" . $row['PRODUCT_id'] . "'");

	mysqli_query($conn, "insert into inventory (USER_id, action, PRODUCT_id, qty, updated_date, product_name, user_name) values ('" . $_SESSION['id'] . "', 'Purchase', '" . $row['PRODUCT_id'] . "', '" . $row['qty'] . "', NOW(),'$product_name','" . $_SESSION['name'] . "')");
}

mysqli_query($conn, "delete from cart where CUSTOMER_id='" . $_SESSION['id'] . "'");
header('location:history.html');
