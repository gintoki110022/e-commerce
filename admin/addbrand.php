<?php
	include('session.php');
	
	$name=$_POST['name'];
	$websitelink=$_POST['websitelink'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	
	
	
	mysqli_query($conn,"insert into brand (brand_name, website_link, email, phone) values ('$name', '$websitelink', '$email', '$phone')");
	
	?>
		<script>
			window.alert('Brand added successfully!');
			window.history.back();
		</script>
	<?php
?>