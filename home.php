<style>
    .mySlides {
        display: none;
    }

    .line {
        border: 1px solid #e73131;
        width: 20%;
        margin-left: auto;
        margin-right: auto;
    }

    #about {
        text-align: center;
    }

    #about span {
        color: red;
    }

    #about p {
        padding: 20px 0;
    }
</style>

<body>
    <div class="main main-raised">
        <div class="slideshow-content">
            <div class="w3-content w3-section" style="max-width:500px">
                <?php
                require_once 'conn.php';
                $sql = "SELECT * FROM product LIMIT 3";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <img class="mySlides" src="./upload/ip3.jpg"<?php echo $row['product_photo_link'] ?>" style="width:500px; height:500px">
                        <img class="mySlides" src="./upload/S1.jpg"<?php echo $row['product_photo_link'] ?>" style="width:500px; height:500px">
                        <img class="mySlides" src="./upload/O1.jpg"<?php echo $row['product_photo_link'] ?>" style="width:500px; height:500px">
                    <?php
                    } ?>
            </div>
        </div>
    <?php
                } else {
                    echo "no image is uploaded";
                };
                mysqli_close($conn);
    ?>
    <section id="about">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h2>TMN <span>SHOP</span></h2>
                    <div class="line"></div>
                    <p><span><strong>TMN SHOP</strong></span> a whole new experience of technology</p>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION -->
    <div class="section mainn mainn-raised">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="products-2.html">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="./upload/dell.jpg" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>APPLE<br>Collection</h3>
                                <a href="products-2.html" class="cta-btn">Shop now <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="products-1.html">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="./upload/asus.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>SAMSUNG<br>Collection</h3>
                                <a href="products-1.html" class="cta-btn">Shop now <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="products-3.html">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="./upload/lenovo.jpg" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>OPPO<br>Collection</h3>
                                <a href="products-3.html" class="cta-btn">Shop now <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">APPLE</a></li>
                                <li><a data-toggle="tab" href="#tab2">SAMSUNG</a></li>
                                <li><a data-toggle="tab" href="#tab3">OPPO</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->
                <!-- Products tab & slick -->
                <div class="col-md-12 mainn mainn-raised">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab ASUS-->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">

                                    <?php
                                    include 'conn.php';

                                    $product_query = "SELECT * FROM product,brand WHERE product.BRAND_id = brand.brand_id AND product.BRAND_id = 1";
                                    $run_query = mysqli_query($conn, $product_query);
                                    if (mysqli_num_rows($run_query) > 0) {

                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $pro_id    = $row['product_id'];

                                            $pro_brand = $row['brand_name'];
                                            $pro_title = $row['product_name'];
                                            $pro_price = number_format($row['product_price'], 2);
                                            $pro_image = $row['product_photo_link'];

                                    ?>

                                            <div class='product'>
                                                <a href='detail-<?php echo str_replace(" ","-",$pro_title); ?>-<?php echo $pro_id ?>.html'>
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
                                                    <p class='product-category'><?php echo $pro_brand ?></p>
                                                    <h3 class='product-name header-cart-item-name'><a href='product.php?p=<?php echo $pro_id ?>'><?php echo $pro_title ?></a></h3>
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
                                                    <a href='detail-<?php echo str_replace(" ","-",$row["product_name"]) ?>-<?php echo $row["product_id"] ?>.html'><button type='button' class='add-to-cart-btn-home' value='<?php echo $row["product_id"] ?>'><i class='fas fa-cart-plus'></i> Buy now</button></a>
                                                </div>
                                            </div>


                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- product -->


                                    <!-- /product -->


                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab ASUS -->

                            <!-- tab DELL -->
                            <div id="tab2" class="tab-pane">
                                <div class="products-slick" data-nav="#slick-nav-2">

                                    <?php
                                    include 'conn.php';

                                    $product_query = "SELECT * FROM product,brand WHERE product.BRAND_id = brand.brand_id AND product.BRAND_id = 2";
                                    $run_query = mysqli_query($conn, $product_query);
                                    if (mysqli_num_rows($run_query) > 0) {

                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $pro_id    = $row['product_id'];

                                            $pro_brand = $row['brand_name'];
                                            $pro_title = $row['product_name'];
                                            $pro_price = number_format($row['product_price'], 2);
                                            $pro_image = $row['product_photo_link'];

                                    ?>

                                            <div class='product'>
                                                <a href='detail-<?php echo str_replace(" ","-",$pro_title) ?>-<?php echo $pro_id ?>.html'>
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
                                                    <p class='product-category'><?php echo $pro_brand ?></p>
                                                    <h3 class='product-name header-cart-item-name'><a href='product.php?p=<?php echo $pro_id ?>'><?php echo $pro_title ?></a></h3>
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
                                                    <a href='detail-<?php echo str_replace(" ","-",$row["product_name"])."-".$row["product_id"] ?>.html'><button type='button' class='add-to-cart-btn-home' value='<?php echo $row["product_id"] ?>'><i class='fas fa-cart-plus'></i> Buy now</button></a>
                                                </div>
                                            </div>


                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- product -->


                                    <!-- /product -->


                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab DELL -->

                            <!-- tab LENOVO -->
                            <div id="tab3" class="tab-pane">
                                <div class="products-slick" data-nav="#slick-nav-3">

                                    <?php
                                    include 'conn.php';

                                    $product_query = "SELECT * FROM product,brand WHERE product.BRAND_id = brand.brand_id AND product.BRAND_id = 3";
                                    $run_query = mysqli_query($conn, $product_query);
                                    if (mysqli_num_rows($run_query) > 0) {

                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $pro_id    = $row['product_id'];

                                            $pro_brand = $row['brand_name'];
                                            $pro_title = $row['product_name'];
                                            $pro_price = number_format($row['product_price'], 2);
                                            $pro_image = $row['product_photo_link'];

                                    ?>

                                            <div class='product'>
                                                <a href='detail-<?php echo str_replace(" ","-",$pro_title) ?>-<?php echo $pro_id ?>.html'>
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
                                                    <p class='product-category'><?php echo $pro_brand ?></p>
                                                    <h3 class='product-name header-cart-item-name'><a href='product.php?p=<?php echo $pro_id ?>'><?php echo $pro_title ?></a></h3>

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
                                                    <a href='detail-<?php echo str_replace(" ","-",$row["product_name"])."-".$row["product_id"] ?>.html'><button type='button' class='add-to-cart-btn-home' value='<?php echo $row["product_id"] ?>'><i class='fas fa-cart-plus'></i> Buy now</button></a>
                                                </div>
                                            </div>


                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- product -->


                                    <!-- /product -->


                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab DELL -->

                        </div>

                    </div>
                </div>
                <!-- Products tab & slick -->


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section mainn mainn-raised">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <!-- <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li> -->
                        </ul>
                        <h2 class="text-uppercase">Black Friday this week</h2>
                        <p>New Collection Up to 30% OFF</p>
                        <a class="primary-btn cta-btn" href="discount.html">Shop now</a>
                    </div>
                    </dyiv>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOT DEAL SECTION -->
    </div>
    </div>
</body>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }

    /////////////////////////////////////////
</script>