<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Customers</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	<table class="table table-borderless table-hover" id="cusTable">
            <thead class="table-dark">
				<tr>
					<th>Customer Name</th>
					<th>Username</th>
					<th>Phone number</th>
					<th>Email</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$cq = mysqli_query($conn, "select * from customer join user on user.user_id=customer.user_id");
				while ($cqrow = mysqli_fetch_array($cq)) {
				?>
					<tr>
						<td><?php echo $cqrow['customer_name']; ?></td>
						<td><?php echo $cqrow['username']; ?></td>
						<td><?php echo $cqrow['phone_number']; ?></td>
						<td><?php echo $cqrow['email']; ?></td>
						<td><?php echo $cqrow['address']; ?></td>
						<td>
							<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $cqrow['user_id']; ?>"><i class="fas fa-edit"></i> Edit</button>
							<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['user_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
							<?php include('user_button.php'); ?>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include 'add_modal.php'; ?>