<?php include('session.php'); ?>
<body>
<div class="w3-container">
	<div class="row w3-margin-top">
        <div class="col-lg-12">
            <h1 class="page-header">Purchase History</h1>
        </div>
    </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
								<th>Purchase Date</th>
								<th>Total Amount</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$h=mysqli_query($conn,"select * from sales where CUSTOMER_id='".$_SESSION['id']."' order by sale_date desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
											<td><?php echo date("M d, Y", strtotime($hrow['sale_date']));?></td>
											<td><?php echo number_format($hrow['sale_total_price'],2); ?></td>
											<td>
												<a href="#detail<?php echo $hrow['sale_id']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> View Full Details</a>
												<?php include ('modal_hist.php'); ?>
											</td>
										</tr>
									<?php
								}
							?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	
	
</div>
<script>
$(document).ready(function(){
	$('#history').addClass('active');
	
	$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
});
</script>
</body>
</html>