<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<?php
		if (array_key_exists('page', $_GET) && $_SERVER['REQUEST_METHOD'] == 'GET') {
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				switch ($page) {
					case 'home':
						include 'home.php';
						break;
					case 'showroom':
						include 'showroom.php';
						break;
					case 'customer':
						include 'customer.php';
						break;
					case 'brand':
						include 'brand.php';
						break;
					case 'brand_product':
						include 'brand_product.php';
						break;
					case 'product':
						include 'product.php';
						break;
					case 'sales':
						include 'sales.php';
						break;
					case 'inventory':
						include 'inventory.php';
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
		?>
	</div>
	<?php include('script.php'); ?>
	<?php include('modal.php'); ?>
</body>

</html>