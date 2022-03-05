<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from showroom where showroom_id='$id'");
	
	
	header('location:showroom.html');

?>