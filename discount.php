<div class="w3-container block-sale">
    <div class="w3-margin-top"></div>
    <div class="box-sale-product">
    <div class="sale-banner">
        <img class="black-friday-banner" src="./upload/black-friday-banner.jpg" alt="blackfriday">
    </div>
        <div class="sale-contain">
            <?php
            $inc = 4;
            $query = mysqli_query($conn, "select * from product join brand on (product.BRAND_id = brand.brand_id) where product.status='D'");
            while ($row = mysqli_fetch_array($query)) {
                $inc = ($inc == 4) ? 1 : $inc + 1;
                if ($inc == 1) echo "<div class='row'>";
            ?>
                <div class="col-lg-3">
                    <div class='product product-item-background'>
                        
                        <div class="slick-product-img">
                            <a href="detail-<?php echo str_replace(" ","-",$row['product_name'])."-".$row['product_id']; ?>.html">
                                <img src="<?php if (empty($row['product_photo_link'])) {
                                                echo "upload/noimage.jpg";
                                            } else {
                                                echo $row['product_photo_link'];
                                            } ?>" class="thumbnail product-img">

                            </a>
                            <?php if ($row['status'] == 'D') { ?>
                                <div class='product-label'>
                                    <span class='sale' style="font-size: 22px;">-30%</span>
                                </div>
                            <?php } else if ($row['status'] == 'U') { ?>
                                <div class='product-label'>
                                    <span class='sale' style="font-size: 22px;">SOLD OUT</span>
                                </div>
                            <?php } ?>

                        </div>
                        <div class='product-body'>
                            <p class='product-category' style="font-size: 20px"><?php echo $row['brand_name'] ?></p>
                            <h3 class="product-name-label"><a href="#"><?php echo $row['product_name']; ?></a>
                            </h3>
                            <?php if ($row['status'] == 'D') {
                                $old_price = ($row['product_price'] * 100) / 60;
                            ?>
                                <del class="product-item-old-price"><?php echo number_format($old_price, 2); ?> VND</del>
                                <h4 class='product-price header-cart-item-info'><strong><?php echo number_format($row['product_price'], 2); ?></strong> VND</h4>
                            <?php } else { ?>
                                <h4 class='product-price header-cart-item-info'><strong><?php echo number_format($row['product_price'], 2); ?></strong> VND</h4>
                            <?php } ?>

                            <div class='product-rating'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                            </div>
                            <div class='product-btns'>
                                <button class='add-to-wishlist'><i class='far fa-heart'></i><span class='tooltipp'>add to wishlist</span></button>
                                <button class='add-to-compare'><i class='fas fa-exchange-alt'></i><span class='tooltipp'>add to compare</span></button>
                                <button class='quick-view'><i class='far fa-eye'></i><span class='tooltipp'>quick view</span></button>
                            </div>
                            <div class="left-quantity">
                                <strong><?php echo $row['product_qty'] ?> </strong><span>products left</span>
                            </div>

                            <?php if ($row['status'] == 'U') { ?>
                                <div class="add-to-cart-product-item">
                                    <div class="btn-group" style="margin-left: 25px; margin-top: 15px">
                                        <button type="button" style="margin-top:12px" class="add-to-cart-btn-product-item" value="<?php echo $row["product_id"] ?>"><i class="fas fa-cart-plus"></i> Out of stock</button></a>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($row['status'] == 'A' || $row['status'] == 'D') { ?>
                                <div class="add-to-cart-product-item">

                                    <div class="well add-to-cart-modal-product-item" id="cart<?php echo $row["product_id"] ?>">
                                        Quantity: <input type="text" id="qty<?php echo $row["product_id"] ?>">
                                        <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row["product_id"] ?>"><i class="fas fa-cart-plus"></i></button>
                                    </div>

                                    <div class="btn-group" style="margin-left: 25px; margin-top: 15px">
                                        <button type="button" style="margin-top:12px" class="add-to-cart-btn-product-item addcart" value="<?php echo $row["product_id"] ?>"><i class="fas fa-cart-plus"></i> Add to cart</button></a>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            <?php
                if ($inc == 4) echo "</div><div style='height: 30px;'></div>";
                // }
            }
            if ($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
            if ($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
            if ($inc == 3) echo "<div class='col-lg-3'></div></div>";
            ?>
        </div>
    </div>
</div>