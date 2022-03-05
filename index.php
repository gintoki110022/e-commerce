<?php include('header.php');
session_start();
$loggedin = false;
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	if ($_SESSION['role'] == 'ADMIN') {
		header('location:admin/index.php?page=home');
		exit();
	}
	$loggedin = true;
} else { ?>
	<script>
		localStorage.removeItem('status');
		localStorage.clear();
	</script>
<?php
}
include('conn.php'); ?>

<body>
	<?php include('navbar.php'); ?>

	<!-- Page content -->
	<?php
	// include('slideshow.php');
	if (array_key_exists('page', $_GET) && $_SERVER['REQUEST_METHOD'] == 'GET') {
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			
			switch ($page) {
				// case 'all_product':
				// 	include 'all_product.php';
				// 	break;
				case 'home':
					include 'home.php';
					break;
				case 'showroom':
					include 'showroom.php';
					break;
				case 'history':
					include 'history.php';
					break;
				case 'search':
					include 'search.php';
					break;
				case 'search_result':
					include 'search_result.php';
					break;
				case 'products':
					if ($_GET['cat'] != 'all') {
						$_SESSION['cat'] = $_GET['cat'];
						include 'products.php';
					}
					else{
						include 'all_product.php';
						
					}
					
					break;
				case 'checkout':
					include 'checkout.php';
					break;
				case 'login':
					include 'login.php';
					break;
				case 'logout':
					include 'logout.php';
					break;
				case 'register':
					include 'register.php';
					break;
				case 'discount':
					include 'discount.php';
					break;
				case 'error':
					include 'error.php';
					break;
			}
		} else {
			include 'home.php';
		}
	} else if (array_key_exists('page', $_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['page'])) {
			$page = $_POST['page'];
			switch ($page) {
				case 'home':
					include 'home.php';
					break;
				case 'search':
					include 'search.php';
					break;
			}
		} else {
			include 'home.php';
		}
	} else include 'home.php';
	include('script.php');
	include('newsletter.php');
	include('footer.php');
	include('modal.php');
	?>
	<script type="text/javascript" src="custom.js"></script>
	<script type="text/javascript" src="validate.js"></script>

</html>