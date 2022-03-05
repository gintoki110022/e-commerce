<?php
include '../conn.php'
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Products
			<span class="pull-right">
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct"><i class="fas fa-plus-circle"></i> Add Product</button>
			</span>
		</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	<table class="table table-borderless table-hover" id="prodTable">
            <thead class="table-dark">
				<tr>
					<th>Product Name</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Photo</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pq = mysqli_query($conn, "select * from product left join brand on brand.BRAND_id=product.BRAND_id");
				while ($pqrow = mysqli_fetch_array($pq)) {
					$pid = $pqrow['product_id'];
				?>
					<tr>
						<td><?php echo $pqrow['product_name']; ?></td>
						<td><?php echo $pqrow['brand_name']; ?></td>
						<td><?php echo $pqrow['product_price']; ?></td>
						<td><?php echo $pqrow['product_qty']; ?></td>
						<td><img src="../<?php if (empty($pqrow['product_photo_link'])) {
												echo "upload/noimage.jpg";
											} else {
												echo $pqrow['product_photo_link'];
											} ?>" height="30px" width="30px;"></td>
						<td>
							<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editprod_<?php echo $pid; ?>"><i class="fas fa-edit"></i> Edit</button>
							<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delproduct_<?php echo $pid; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
							<?php include('product_button.php'); ?>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('add_modal.php'); ?>