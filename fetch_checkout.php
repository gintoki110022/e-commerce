<?php
session_start();
include('conn.php');
include('session.php');
if (isset($_POST['check'])) {
?>
	<table width="100%" class="table table-striped table-bordered table-hover">
		<thead>
			<th></th>
			<th>Product Name</th>
			<th>Available quantity</th>
			<th>Price (VND)</th>
			<th>Quantity</th>
			<th>Total (VND)</th>
		</thead>
		<tbody>
			<form method="POST" action="">
				<?php
				$total = 0;
				$invalidQty = false;
				$query = mysqli_query($conn, "select * from cart left join product on product.product_id=cart.PRODUCT_id where CUSTOMER_id='" . $_SESSION['id'] . "'");
				while ($row = mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['product_id']; ?>"><i class="fas fa-trash-alt"></i> Remove</button></td>
						<td><?php echo $row['product_name']; ?></td>
						<td><?php echo $row['product_qty']; ?></td>
						<td align="right"><?php echo number_format($row['product_price'], 2); ?></td>
						<td><button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['product_id']; ?>"><i class="fas fa-minus"></i></button>
							<?php echo $row['qty']; ?>
							<?php if ($row['qty'] < $row['product_qty']) { ?>
								<button type="button" class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['product_id']; ?>"><i class="fas fa-plus"></i></button>
							<?php } ?>
						</td>
						<td align="right"><strong><span class="subt">
									<?php
									if ($row['qty'] > $row['product_qty']) { 
										echo 'Not enough product!';
										$subtotal = 0;
										$invalidQty = true;
									}
									else {
										$subtotal = $row['qty'] * $row['product_price'];
										echo number_format($subtotal, 2);
									}
									$total += $subtotal;
									?>
								</span></strong></td>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="5"><span class="pull-right"><strong>Grand Total</strong></span></td>
					<td align="right"><strong><span id="total"><?php echo number_format($total, 2); ?></span><strong></td>
				</tr>
			</form>
		</tbody>
	</table>
	<?php if ($total > 0 && !$invalidQty) { ?>
		<div class="row">
			<button type="button" id="check" class="btn btn-primary pull-right" style="margin-right:15px;"><i class="fas fa-check fa-fw"></i> Confirm</button>
		</div>
<?php }
} ?>