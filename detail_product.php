<?php
include 'header.php';
session_start();
$loggedin = false;
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $loggedin = true;
}
include('conn.php');
include 'navbar.php';
?>
<!--footer font-->
<link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet' />
<!-- SECTION -->
<div class="section main main-raised">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->

            <?php
            include 'conn.php';
            $product_id = $_GET['p'];

            // $sql = " SELECT * FROM products ";
            $sql = " SELECT * FROM product JOIN brand on (product.BRAND_id = brand.brand_id) WHERE product_id = $product_id";
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $product_price = number_format($row['product_price'], 2);

            ?>
                    <div class="col-md-5 col-md-push-2">
                        <div id="product-main-img">
                            <div class="product-preview">
                                <img src="./<?php echo $row['product_photo_link'] ?>" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="./<?php echo $row['product_photo_link'] ?>" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="./<?php echo $row['product_photo_link'] ?>" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="./<?php echo $row['product_photo_link'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2  col-md-pull-5">
                        <div id="product-imgs">
                            <div class="product-preview">
                                <img src="./<?php echo $row['product_photo_link'] ?>" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="./<?php echo $row['product_photo_link'] ?>" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="./<?php echo $row['product_photo_link'] ?>" alt="">
                            </div>

                            <div class="product-preview">
                                <img src="./<?php echo $row['product_photo_link'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- FlexSlider -->

                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['product_name'] ?></h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="review-link" href="#review-form">10 Review(s) | Add your review</a>
                            </div>
                            <?php if ($row['status'] == 'D') {
                                $old_price = ($row['product_price'] * 100) / 60;
                            ?>
                                <div>
                                    <h3 class="product-price"><?php echo number_format($row['product_price'], 2); ?> VND</h3>
                                    <del class="product-old-price"><?php echo number_format($old_price, 2); ?> VND</del>
                                    <span class="product-available" style="margin-left: 0px;">DISCOUNT</span>
                                </div>
                            <?php } elseif ($row['status'] == 'A' || $row['status'] == 'U') { ?>
                                <div>
                                    <h3 class="product-price"><?php echo $product_price; ?> VND</h3>

                                    <?php if ($row['status'] == 'A') { ?><span class="product-available">IN STOCK</span> <?php } else { ?>
                                        <span class="product-available">OUT OF STOCK</span> <?php } ?>
                                </div>
                            <?php } ?>
                            <p style="text-transform:uppercase">TRADEMARK: <?php echo $row['brand_name'] ?>.</p>

                            <div class="product-options">
                                <label>
                                    Size
                                    <select class="input-select">
                                        <option value="<?php echo $row['size'] ?>"><?php echo $row['size'] ?></option>
                                    </select>
                                </label>
                                <label>
                                    Color
                                    <select class="input-select">
                                        <option value="<?php echo $row['color'] ?>"><?php echo $row['color'] ?></option>
                                    </select>
                                </label>
                            </div>


                            <?php if ($row['status'] == "A" || $row['status'] == 'D') { ?>

                                <div class="add-to-cart">

                                    <div class="well add-to-cart-modal-details" id="cart<?php echo $row["product_id"] ?>">
                                        Quantity: <input type="text" id="qty<?php echo $row["product_id"] ?>">
                                        <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row["product_id"] ?>"><i class="fas fa-cart-plus"></i></button>
                                    </div>

                                    <div class="btn-group" style="margin-left: 25px; margin-top: 15px">
                                        <button type="button" style="margin-top:12px" class="add-to-cart-btn-home addcart" value="<?php echo $row["product_id"] ?>"><i class="fas fa-cart-plus"></i> Add to cart</button></a>
                                    </div>

                                </div>

                            <?php } else if ($row['status'] == "U") { ?>
                                <div class="add-to-cart">
                                    <div class="btn-group" style="margin-left: 25px; margin-top: 15px">
                                        <button type="button" style="margin-top:12px" class="add-to-cart-btn-home"><i class="fas fa-cart-plus"></i>SOLD OUT</button></a>
                                    </div>
                                </div>
                            <?php } ?>
                            <ul class="product-btns">
                                <li><a href="#"><i class="far fa-heart"></i> Add to wishlist</a></li>
                                <li><a href="#"><i class="fas fa-exchange-alt"></i> Add to compare</a></li>
                            </ul>

                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a href="#">ELECTRONICS</a></li>
                            </ul>

                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="far fa-envelope"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->



                    <!-- /Product thumb imgs -->

                    <!-- Product details -->

                    <!-- /Product details -->
                    <!-- Product tab -->
                    <div class="col-md-12">
                        <div id="product-tab">
                            <!-- product tab nav -->
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                <li><a data-toggle="tab" href="#tab2">Details</a></li>
                            </ul>
                            <!-- /product tab nav -->

                            <!-- product tab content -->
                            <div class="tab-content">
                                <!-- tab1  -->
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>As a laptop line equipped with powerful configuration with 11th generation Intel Core chip.
                                                With an ultra-light weight of only 1.4kg, this will be the right laptop to accompany you on business trips or go on a long trip,
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab1  -->

                                <!-- tab2  -->
                                <div id="tab2" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped" style="width: 80%;margin-left:auto; margin-right:auto">
                                                <tr>
                                                    <th>CPU</th>
                                                    <td><?php echo $row['CPU'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>RAM</th>
                                                    <td><?php echo $row['RAM'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>GPU</th>
                                                    <td><?php echo $row['GPU'] ?></td>
                                                </tr>
                                                <th>Storage</th>
                                                <td><?php echo $row['storage'] ?></td>
                                                </tr>
                                                <th>Monitor</th>
                                                <td><?php echo $row['monitor'] ?></td>
                                                </tr>
                                                <th>Battery</th>
                                                <td><?php echo $row['battery'] ?></td>
                                                </tr>
                                                <th>Weigh</th>
                                                <td><?php echo $row['weight'] ?> kg</td>
                                                </tr>
                                                <th>Size</th>
                                                <td><?php echo $row['size'] ?> inch</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab2  -->

                            </div>
                            <!-- /product tab content  -->
                        </div>
                    </div>
                    <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- Section -->
<div class="section main main-raised">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>

                </div>
            </div>

    <?php $_SESSION['product_id'] = $row['product_id'];
                }
            }
    ?>
    <?php
    include 'conn.php';
    $product_id = $_GET['p'];

    $product_query = "SELECT * FROM product,brand WHERE product.BRAND_id = brand.brand_id AND brand.brand_id in ( select BRAND_id from product where product_id = $product_id) LIMIT 4";
    $run_query = mysqli_query($conn, $product_query);
    if (mysqli_num_rows($run_query) > 0) {

        while ($row = mysqli_fetch_array($run_query)) {
            $pro_id    = $row['product_id'];
            $pro_cat   = $row['brand_name'];
            $pro_title = $row['product_name'];
            $pro_price = number_format($row['product_price'], 2);
            $pro_image = $row['product_photo_link'];
    ?>
            <div class='col-md-3 col-xs-6'>
                <a href='detail_product.php?p=<?php echo $pro_id ?>'>
                    <div class='product'>
                        <div class='slick-product-img'>
                            <img src='./<?php echo $pro_image ?>' style='max-height: 170px;' alt=''>
                            <?php if ($row['status'] == 'A') { ?>
                                <div class='product-label'>
                                    <span class='new'>NEW</span>
                                </div>
                            <?php } elseif ($row['status'] == 'U') { ?>
                                <div class='product-label'>
                                    <span class='new'>SOLD OUT</span>
                                </div>

                            <?php } else { ?>
                                <div class='product-label'>
                                    <span class='new'>NEW</span>
                                    <span class='sale'>-30%</span>
                                </div>
                            <?php } ?>
                        </div>
                </a>
                <div class='product-body'>
                    <p class='product-category'><?php echo $pro_cat ?></p>
                    <h3 class='product-name header-cart-item-name'><a href='detail_product.php?p=<?php echo $pro_id ?>'><?php echo $pro_title ?></a></h3>

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
                </div>
                <div class='add-to-cart'>
                    <a href='detail_product.php?p=<?php echo $row["product_id"] ?>'><button pid='$pro_id' id='product' class='add-to-cart-btn-home block2-btn-towishlist' href='#'><i class='fas fa-cart-plus'></i> Buy now</button></a>
                </div>
            </div>
        </div>

<?php
        }
    }
?>

    </div>
    <!-- /row -->

</div>
<!-- /container -->
</div>
<!-- /Section -->


<?php
include 'script.php';
include 'newsletter.php';
include 'footer.php';
?>
<script type="text/javascript" src="custom.js"></script>