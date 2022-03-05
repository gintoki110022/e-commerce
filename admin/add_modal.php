<!-- Add Product -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addproduct.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Name:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Brand:</span>
                                <select style="width:400px;" class="form-control" name="category">
                                    <?php
                                    $cat = mysqli_query($conn, "select * from brand");
                                    while ($catrow = mysqli_fetch_array($cat)) {
                                    ?>
                                        <option value="<?php echo $catrow['brand_id']; ?>"><?php echo $catrow['brand_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Status:</span>
                                <select style="width:400px;" class="form-control" name="status">
                                    <option value="A">Available</option>
                                    <option value="U">Unavailable</option>
                                    <option value="D">Discount</option>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Price:</span>
                                <input type="text" style="width:400px;" class="form-control" name="price" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Quantity:</span>
                                <input type="text" style="width:400px;" class="form-control" name="qty">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Photo:</span>
                                <input type="file" style="width:400px;" class="form-control" name="image">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Color:</span>
                                <input type="text" style="width:400px;" class="form-control" name="color">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">CPU:</span>
                                <input type="text" style="width:400px;" class="form-control" name="cpu">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">RAM:</span>
                                <input type="text" style="width:400px;" class="form-control" name="ram">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">GPU:</span>
                                <input type="text" style="width:400px;" class="form-control" name="gpu">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Storage:</span>
                                <input type="text" style="width:400px;" class="form-control" name="storage">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Monitor:</span>
                                <input type="text" style="width:400px;" class="form-control" name="monitor">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Battery:</span>
                                <input type="text" style="width:400px;" class="form-control" name="battery">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Weight:</span>
                                <input type="text" style="width:400px;" class="form-control" name="weight">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Size:</span>
                                <input type="text" style="width:400px;" class="form-control" name="size">
                            </div>
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
<!-- /.modal -->

<!-- Add brand -->
<div class="modal fade" id="addsupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New Brand</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addbrand.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Brand:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Website link:</span>
                                <input type="text" style="width:400px;" class="form-control" name="websitelink">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Email:</span>
                                <input type="text" style="width:400px;" class="form-control" name="email">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Phone:</span>
                                <input type="text" style="width:400px;" class="form-control" name="phone">
                            </div>
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
<!-- /.modal -->