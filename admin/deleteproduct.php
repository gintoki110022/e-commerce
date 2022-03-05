<?php
	include('session.php');
	$pid=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from product where product_id='$pid'");
	$b=mysqli_fetch_array($a);
	
	mysqli_query($conn,"delete from product where product_id='$pid'");
	
	header('location:product.html');

?>