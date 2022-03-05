<?php
include('conn.php');
if (isset($_SESSION['id'])) {
    $sq = mysqli_query($conn, "select * from `USER` where user_id='" . $_SESSION['id'] . "'");
    $srow = mysqli_fetch_array($sq);

    $user = $srow[1];
}
?>
<style>
    #loading {
        text-align: center;
        background: url('loading.gif') no-repeat center;
        height: 150px;
    }
</style>
<div class="main-back-product">
    <div class="w3-container">
        <div class="w3-margin-top">
            <div class="row">
                <div class="col-lg-3 filter-background filter-height">
                    <div class="list-group">
                        <h3>Price</h3>
                        <input type="hidden" id="hidden_minimum_price" value="5000000" />
                        <input type="hidden" id="hidden_maximum_price" value="100000000" />
                        <p id="price_show">5.000.000 - 100.000.000</p>
                        <div id="price_range"></div>
                    </div>

                    <div class="list-group">
                        <h3>Brand</h3>
                        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;" class="srollbar-custom">
                            <?php

                            $query = "SELECT DISTINCT(brand_name),brand_id FROM brand ORDER BY brand_name ASC";
                            $statement = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($statement)) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" class="common_selector brand_name" value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></label>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>

                    <div class="list-group">
                        <h3>Status</h3>
                        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;" class="srollbar-custom">
                            <?php

                            $query = "SELECT DISTINCT(status) FROM product ORDER BY status ASC";
                            $statement = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($statement)) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" class="common_selector status" value="<?php echo $row['status']; ?>"><?php echo ($row['status'] == 'A' ? 'Avalable' : ($row['status'] == 'U' ? 'Unavailable' : 'Discount')); ?></label>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="list-group">
                        <h3>RAM</h3>
                        <div style="height: 300px; overflow-y: auto; overflow-x: hidden;" class="srollbar-custom">
                            <?php

                            $query = "SELECT DISTINCT(RAM) FROM product ORDER BY RAM ASC";
                            $statement = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($statement)) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['RAM']; ?>"><?php echo $row['RAM'] ?></label>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="list-group">
                        <h3>COLOR</h3>
                        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;" class="srollbar-custom">
                            <?php

                            $query = "SELECT DISTINCT(color) FROM product ORDER BY color ASC";
                            $statement = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($statement)) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" class="common_selector color" value="<?php echo $row['color']; ?>"><?php echo $row['color'] ?></label>
                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 filter_data">
                    <div class="product-item">
                        <!-- pagination -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>