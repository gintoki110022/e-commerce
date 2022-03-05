<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	
	mysqli_query($conn,"delete from brand where brand_id='$id'");
	
	header('location:brand.html');

?>