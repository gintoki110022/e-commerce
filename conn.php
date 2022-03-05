<?php

$conn = mysqli_connect("localhost:3308","root","","tmn_store");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>