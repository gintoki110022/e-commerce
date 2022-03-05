<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Inventory Report</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	<table class="table table-borderless table-hover" id="invTable">
            <thead class="table-dark">
				<tr>
					<th class="hidden"></th>
					<th>Update date</th>
					<th>User name</th>
					<th>Action</th>
					<th>Product Name</th>
					<th>Quantity</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$iq = mysqli_query($conn, "select * from inventory order by updated_date desc");
				while ($iqrow = mysqli_fetch_array($iq)) {
				?>
					<tr>
						<td class="hidden"></td>
						<td><?php echo date('M d, Y h:i A', strtotime($iqrow['updated_date'])); ?></td>
						<td>
						<?php echo $iqrow['user_name']; ?>
						</td>
						<td><?php echo $iqrow['action']; ?></td>
						<td><?php 
							echo $iqrow['product_name']; 
							?></td>
						<td><?php echo $iqrow['qty']; ?></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('add_modal.php'); ?>