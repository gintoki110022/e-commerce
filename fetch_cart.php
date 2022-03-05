<?php
session_start();
include('conn.php');
include('session.php');
if (isset($_POST['fcart'])) {
	$query = mysqli_query($conn, "select * from `cart` left join product on product.product_id=cart.PRODUCT_id where cart.CUSTOMER_id='" . $_SESSION['id'] . "'");
	if (mysqli_num_rows($query) < 1) {
		echo "Your Cart is Empty <br><br>";
	} else {
		while ($row = mysqli_fetch_array($query)) {
?>
			<div class="row">
				<div class="col-lg-1">
					<button type="button" class="btn btn-danger btn-sm remove_product" value="<?php echo $row['product_id']; ?>"><i class="fas fa-trash-alt"></i></button>
				</div>
				<div class="col-lg-1">
					<button type="button" class="btn btn-warning btn-sm minus_qty" value="<?php echo $row['product_id']; ?>"><i class="fas fa-minus"></i></button>
				</div>
				<div class="col-lg-1 qty">
					<p class=""><strong><?php echo $row['qty']; ?></strong></p>
				</div>
				<div class="col-lg-1">
					<button type="button" class="btn btn-primary btn-sm add_qty" value="<?php echo $row['product_id']; ?>"><i class="fas fa-plus"></i></button>
				</div>
				<div class="col-lg-1">
					<img src="<?php if (empty($row['product_photo_link'])) {
									echo "upload/noimage.jpg";
								} else {
									echo $row['product_photo_link'];
								} ?>" class="thumbnail product-img-cart">
				</div>
				<div class="col-lg-7">
					<span class="product-name-label-cart"><?php echo $row['product_name']; ?></span>
				</div>
			</div>
<?php
		}
	}
}

?>