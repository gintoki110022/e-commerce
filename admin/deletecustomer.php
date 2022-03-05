<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from user where user_id='$id'");
	
	header('location:customer.html');

?>