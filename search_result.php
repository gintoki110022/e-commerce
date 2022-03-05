<?php $id = $_GET['id']; ?>

<body>
<div class="main-back-product">
	<div class="w3-container">
		<div class="w3-margin-top">
			<?php
			$inc = 4;
			$query = mysqli_query($conn, "select * from product join brand on (product.BRAND_id = brand.brand_id) where product_id='$id'");
			// $data = mysqli_fetch_array($query);
			// $product_name = $data['product_name'];
			
			if (mysqli_num_rows($query) > 0) {
				$num_row = mysqli_num_rows($query);
				include 'product_item_search.php';
			} else echo "<div class = 'row'>
							<div class = 'col-lg-12>
								<h3>There are ".$num_row." items found</h3>
							</div>
						</div>";
			?>
		</div>
	</div>
</div>
</body>