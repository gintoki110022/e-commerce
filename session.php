<?php
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
	header('location:login.html');
	exit();
}

$sq = mysqli_query($conn, "select * from `USER` where user_id='" . $_SESSION['id'] . "'");
$srow = mysqli_fetch_array($sq);

$user = $srow['username'];
