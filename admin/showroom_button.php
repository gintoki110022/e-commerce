<!-- Delete Customer -->
<div class="modal fade" id="del_<?php echo $cqrow['showroom_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete Showroom</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from SHOWROOM where showroom_id=".$cqrow['showroom_id']."");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Showroom Name: <strong><?php echo ucwords($b['name']); ?></strong></center></h5>
					<form role="form" method="POST" action="deleteshowroom.php<?php echo '?id='.$cqrow['showroom_id']; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->