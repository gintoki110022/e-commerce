<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Brands
			<span class="pull-right">
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addsupplier"><i class="fas fa-plus-circle"></i> Add brand</button>
			</span>
		</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<table class="table table-borderless table-hover" id="prodTable">
            <thead class="table-dark">
				<tr>
					<th>Brand</th>
					<th>Website</th>
					<th>Email</th>
					<th>Hotline</th>
					<th>Products</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sq = mysqli_query($conn, "select * from brand");
				while ($sqrow = mysqli_fetch_array($sq)) {
				?>
					<tr>
						<td><?php echo $sqrow['brand_name']; ?></td>
						<td><?php echo $sqrow['website_link']; ?></td>
						<td><?php echo $sqrow['email']; ?></td>
						<td><?php echo $sqrow['phone']; ?></td>
						<td><a class="w3-button" href='index.php?page=brand_product&id=<?php echo $sqrow['brand_id'] ?>&name=<?php echo $sqrow['brand_name'] ?>'><i class="fas fa-info"></i> View detail</a></td>
						<td>
							<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $sqrow['brand_id']; ?>"><i class="fas fa-edit"></i> Edit</button>
							<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $sqrow['brand_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
							<?php include('supp_butt.php'); ?>
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