<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$customername=$_POST['customername'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	
	$use=mysqli_query($conn,"select * from user where user_id= '$id' ");
	$urow=mysqli_fetch_array($use);
	if (empty($password)) { ?>
		<script>
			   window.alert('Password is required!');
			   window.history.back();
		</script>
	<?php }
	if ($password==$urow['password']){
		$pass=$password;
				mysqli_query($conn,"update user set username='$username', password='$pass' where user_id='$id'");
				mysqli_query($conn,"update customer set customer_name='$customername',phone_number = '$phone', address='$address', email='$email' where user_id='$id'"); ?>
				<script>
					window.alert('Customer updated successfully!');
					window.history.back();
				</script>
		<?php
	}
	else{
		if (!preg_match('/[A-Z]/', $password)) { ?>
			<script>
				   window.alert('Password must contain uppercase!');
				   window.history.back();
			</script>
		<?php } else if (ctype_upper($password)) { ?>
			<script>
				   window.alert('Password must contain lowercase!');
				   window.history.back();
			</script>
		<?php } else if (!preg_match('~[0-9]+~', $password)) { ?>
			<script>
				   window.alert('Password must contain number!');
				   window.history.back();
			</script>
		<?php } else if (strlen($password) < 8) { ?>
			<script>
				   window.alert('Password must has minimum 8 characters!');
				   window.history.back();
			</script>
		<?php }
		 	else {
				$pass=md5($password);
				mysqli_query($conn,"update user set username='$username', password='$pass' where user_id='$id'");
				mysqli_query($conn,"update customer set customer_name='$name', address='$address', contact='$contact' where user_id='$id'"); ?>
				<script>
					window.alert('Customer updated successfully!');
					window.history.back();
				</script>
		<?php
			}
	}
	?>
		