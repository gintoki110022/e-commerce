<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>
<!-- Add Product -->

<!-- /.modal -->

<!-- Add Customer -->
<div class="modal fade" id="addshowroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="text-white modal-title">
                    <center>Add New Showroom</center>
                </h1>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addshowroom.php" enctype="multipart/form-data" id="input">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Name:</span>
                                <input type="text" onkeyup="setContentMap()" style="width:400px; text-transform:capitalize;" class="form-control" id="branchname" name="name" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Phone:</span>
                                <input type="text" onkeyup="setContentMap()" style="width:400px;" class="form-control" id="contact" name="contact">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Address:</span>
                                <input type="text" onkeyup="setContentMap()" style="width:400px; text-transform:capitalize;" class="form-control" id="addr" name="address">
                            </div>

                            <div class="form-group input-group">
                                <!-- <span style="width:120px;" class="input-group-addon">Contact Info:</span> -->
                                <input type="hidden" onkeyup="setContentMap()" style="width:400px;" class="form-control" id="coord" name="coord">

                            </div>
                            <div id="map" style="width:100%; height:390px;"></div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="./index.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo getenv('API_KEY'); ?>&callback=initMap&v=weekly" async></script>