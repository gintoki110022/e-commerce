<?php
$name = $_POST['search'];
?>
<div class="main-back-product">
    <div class="w3-container">
        <div class="w3-margin-top">
            <?php
            $inc = 4;
            $query = mysqli_query($conn, "select * from product join brand on (product.BRAND_id = brand.brand_id) where product_name like '%$name%'");
            if (mysqli_num_rows($query) > 0) {
                $num_row = mysqli_num_rows($query);
                echo "<div class = 'result product-item-background'>
					<h2 style='color: #2428b9;'>There are " . $num_row . " items found</h2>
				</div>";
                include 'product_item_search.php';
            } else echo "<div class = 'result'> 
            <h2 style='color: #2428b9;'>There are no items found </h2>
                    </div>";
            ?>
        </div>
    </div>
</div>