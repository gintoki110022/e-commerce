<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sales Report</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	<table class="table table-borderless table-hover" id="salesTable">
            <thead class="table-dark">
				<tr>
					<th class="hidden"></th>
					<th>Sales Date</th>
					<th>Customer</th>
					<th>Total Purchase</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sq = mysqli_query($conn, "select * from sales order by sale_date desc");
				while ($sqrow = mysqli_fetch_array($sq)) {
				?>
					<tr>
						<td class="hidden"></td>
						<td><?php echo date('M d, Y h:i A', strtotime($sqrow['sale_date'])); ?></td>
						<td><?php echo $sqrow['customer_name']; ?></td>
						<td align="left"><?php echo number_format($sqrow['sale_total_price'], 2); ?></td>
						<td>
							<a href="#detail<?php echo $sqrow['sale_id']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> View Full Details</a>
							<?php include('full_details.php'); ?>
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