<!-- Navigation -->
<nav class="w3-top w3-white w3-wide w3-padding w3-card navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="home.html"><i class="fas fa-home"></i> Home</a>
    </div>

    <ul class=" nav navbar-nav">
        <li>
            <a href="#account" data-toggle="modal"><i class="fas fa-user"></i> <?php echo $user; ?></a>
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
    </ul>

    <ul class="nav navbar-top-links navbar-right">
        <li id="showroom"><a href="showroom.html"><i class="fas fa-building"></i> Showroom</a></li>
        <li><a href="customer.html"><i class="fas fa-credit-card"></i> Customer</a></li>
        <li><a href="brand.html"><i class="fas fa-laptop"></i> Brand</a></li>
        <li><a href="product.html"><i class="fab fa-product-hunt"></i> Product</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle report" data-toggle="dropdown" href="#">
            <i class="fas fa-file-alt"></i> Report <i class="fas fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu report">
                <li>
                    <a href="sales.html"><i class="fas fa-money fa-fw"></i> Sales</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="inventory.html"><i class="fas fa-boxes"></i> Inventory</a>
                </li>
            </ul>
        </li>
        <li><a href='#logout' data-toggle="modal"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>

    <!-- <div class="w3-left w3-white w3-wide w3-padding navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li id="showroom"><a href="index.php?page=showroom"><i class="fas fa-building"></i> Showroom</a></li>
                <li><a href="index.php?page=customer"><i class="fa fa-credit-card"></i> Customer</a></li>
                <li><a href="index.php?page=brand"><i class="fa fa-laptop"></i> Brand</a></li>
                <li><a href="index.php?page=product"><i class="fab fa-product-hunt"></i> Product</a></li>
                <li>
                    <a href="#"><i class="fa fa-copy fa-fw"></i> Report<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index.php?page=sales"><i class="fa fa-money fa-fw"></i> Sales Report</a>
                        </li>
                        <li>
                            <a href="index.php?page=inventory"><i class="fa fa-barcode fa-fw"></i> Inventory Report</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div> -->
</nav>