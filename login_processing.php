<?php
include('conn.php');
session_start();
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = check_input($_POST['username']);

	if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
		$_SESSION['error'] = "Username should not contain space and special characters!";
		header("location:index.php?page=error");
	} else {

		$fusername = $username;

		$password = check_input($_POST["password"]);
		$fpassword = md5($password);

		$query = mysqli_query($conn, "select * from `USER` where username='$fusername' and password='$fpassword'");

		if (mysqli_num_rows($query) == 0) {
			$_SESSION['error'] = "Login Failed, Invalid Input!";
			header("location:index.php?page=error");
		} else {

			$row = mysqli_fetch_array($query);
			$_SESSION["loggedin"] = true;
			$_SESSION["name"] = $row["username"];
			$_SESSION["role"] = $row["access"];
			if ($row['access'] == 'ADMIN') {
				$_SESSION['id'] = $row['user_id'];
?>
				<script>
					
					window.alert('Login Success, Welcome Admin!');
					window.location.href = 'admin/';
				</script>
			<?php
			} elseif ($row['access'] == 'CUSTOMER') {
				$_SESSION['id'] = $row['user_id'];
			?>
				<script>
					sessionStorage.setItem('status', 'loggedIn')
					localStorage.setItem('status', 'loggedIn')
					window.alert('Login Success, Welcome User!');
					window.location.href = 'home.html';
				</script>
<?php
			}
		}
	}
}
?>