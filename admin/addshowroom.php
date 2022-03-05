<?php
	include('session.php');
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$lat=explode(",",$_POST['coord'])[0];
	$long=explode(",",$_POST['coord'])[1];
	
	mysqli_query($conn,"insert into SHOWROOM (name,address, phone, latitude, longtitude) values ('$name', '$address','$contact', $lat, $long)");
	// $userid=mysqli_insert_id($conn);
	
	// mysqli_query($conn,"insert into customer (userid, customer_name, address, contact) values ('$userid', '$name', '$address', '$contact')");
	
	?>
		<script>
			window.alert('Showroom added successfully!');
			window.history.back();
		</script>
	<?php
?>