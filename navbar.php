<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

?>

<!-- Navigation -->
<nav class="w3-top w3-white w3-wide w3-padding w3-card navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" href="home.html"><i class="fas fa-home"></i> Home</a>
			
	</div>

	<ul class=" nav navbar-nav">
		<?php if ($loggedin) {
			include 'session.php'; ?>
			<li>
				<a href="#account" data-toggle="modal"><i class="fas fa-user"></i> <b><?php echo $user; ?></b></a>
			</li>
			<li id="cartme">
				<a id="cart_control"><i class="fas fa-shopping-cart"></i> My Cart</a>
			</li>
			<li id="history"><a href="history.html"><span class="fas fa-list-alt"></span> History</a></li>
		<?php } ?>
	</ul>

	<ul class="nav navbar-top-links navbar-right">
		<li>
			<form class="navbar-form" role="search" method="POST" action="index.php">
				<input type="hidden" class="" name="page" value="search">
				<div class="input-group" id="searchbox">
					<input type="text" class="form-control" placeholder="Search by name..." name="search" id="search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
					</div>
					<div id="search_area" class="panel panel-default"></div>
				</div>
			</form>
		</li>
		<li id="showroom"><a href="showroom.html"><span class="fas fa-building"></span> Showrooms</a></li>

		<li class="dropdown">
			<a class="dropdown-toggle brand" data-toggle="dropdown" href="#">
				<i class="fas fa-laptop"></i> Brand <i class="fas fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu brand">
				<li><a href="products-all.html">All</a></li>
				<?php
				$caq = mysqli_query($conn, "select * from BRAND");
				while ($catrow = mysqli_fetch_array($caq)) {
				?>
					<li class="divider"></li>
					<li><a href="products-<?php echo $catrow['brand_id']; ?>.html"><?php echo $catrow['brand_name']; ?></a></li>
				<?php
				}
				?>
			</ul>
		</li>
		<!-- <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<span class="glyphicon glyphicon-lock"></span> <i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span> My Account</a></li>
				<li class="divider"></li>
				<li><a href="#profile" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
				<li class="divider"></li>
				<li><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
			</ul>
		</li> -->

		<?php if ($loggedin) { ?>
			<li><a class="" href='logout.html'><i class="fas fa-sign-out-alt"></i> Logout</a></li>
		<?php } else { ?>
			<li><a class="" href='register.html'><i class="fas fa-user-plus"></i> Register</a></li>
			<li><a class="" href='login.html'><i class="fas fa-sign-in-alt"></i> Login</a></li>
		<?php } ?>

	</ul>
</nav>
<?php include('cart_search_field.php'); ?>