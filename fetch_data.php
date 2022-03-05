<?php

//fetch_data.php

include('conn.php');
if(isset($_POST["action"]))
{
    $record_per_page = 6;

    $page = '';

    if (isset($_POST["page"])) {
        $page = $_POST["page"];
    } else {
        $page = 1;
    }
    
    $start_from = ($page - 1) * $record_per_page;

    if ($_POST['cat'] != null) {
        $sql = "
		SELECT * from product join brand on (product.BRAND_id = brand.brand_id) WHERE ADMIN_id = 3 AND product.BRAND_id = ".$_POST['cat']."
	";
    
    } else {
        
	$sql = "
		SELECT * from product join brand on (product.BRAND_id = brand.brand_id) WHERE ADMIN_id = 3
	";
    }
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$sql .= "
		 AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$sql .= "
		 AND product.BRAND_id IN('".$brand_filter."') 
		";
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$sql .= "
		 AND RAM IN('".$ram_filter."') 
		";
	}
	if(isset($_POST["status"]))
	{
		$status_filter = implode("','", $_POST["status"]);
		$sql .= "
		 AND status IN('".$status_filter."') 
		";
	}

    if(isset($_POST["color"]))
	{
		$color_filter = implode("','", $_POST["color"]); 
		$sql .= "
		 AND color IN('".$color_filter."') 
		";
	}

	
	$limit = "LIMIT $start_from, $record_per_page";
	$output = "";

    $query = $sql . $limit;
    $statement = mysqli_query($conn, $query);

	if(mysqli_num_rows($statement) > 0)
	{
        $inc = 3;
		while($row = mysqli_fetch_assoc($statement)) 
		{
            $inc = ($inc == 3) ? 1 : $inc + 1;
            if ($inc == 1) $output .= "<div class='row'>";
      
            $output .= '<div class="col-lg-4">
                <div class="product product-item-background">
                    <div class="slick-product-img">
                        <a href="detail_product.php?p='.$row['product_id'].' ">'
                        ;

            $output .= '<img src=" '; if ( empty($row['product_photo_link']) ) {
                                            $output .= "upload/noimage.jpg";
                                        } else {
                                            $output .= $row['product_photo_link'];
                                        } $output .= ' " class="thumbnail product-img">
        
                        </a> ';

                        if ($row['status'] == 'D') { 
                            $output .= "<div class='product-label'>
                                <span class='sale' style='font-size: 22px;'>-30%</span>
                            </div>";
                             } else if ($row['status'] == 'U') { 
                            $output .= "<div class='product-label'>
                                <span class='sale' style='font-size: 22px;'>SOLD OUT</span>
                            </div> ";
                         } 
                $output .= "
                    </div>
                    <div class='product-body'>
                        <p class='product-category' style='font-size: 20px'> ".$row['brand_name']."</p>
                        <h3 class='product-name-label'><a href='#'></a>".$row['product_name']. "</a>
                        </h3> ";
                         if ($row['status'] == 'D') {
                            $old_price = ($row['product_price'] * 100) / 60;
                        
                        $output .= "
                            <del class='product-item-old-price'>" .number_format($old_price, 2)." VND</del>
                            <h4 class='product-price header-cart-item-info'><strong>". number_format($row['product_price'], 2)."</strong> VND</h4>";
                         } else { 
                        $output .= "
                            <h4 class='product-price header-cart-item-info' style='min-height:54px;line-height:54px'><strong>". number_format($row['product_price'], 2)."</strong> VND</h4> ";
                         };
                        

                        $output .= "
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
                        <div class='left-quantity'>
                            <strong>". $row['product_qty'] ."</strong><span> products left</span>
                        </div>
                        ";

                        if ($row['status'] == 'U') { 
                        $output.= '
                            <div class="add-to-cart-product-item">
                                <div class="btn-group" style="margin-left: 25px; margin-top: 15px">
                                    <button type="button" style="margin-top:12px" class="add-to-cart-btn-product-item" value=" '.$row["product_id"].' "><i class="fas fa-cart-plus"></i> Out of stock</button></a>
                                </div> 
                            </div>' ;
                        } if ($row['status'] == 'A' || $row['status'] == 'D') { 
                            $output.= '<div class="add-to-cart-product-item">
        
                                <div class="well add-to-cart-modal-product-item" id="cart'.$row["product_id"].'">
                                    Quantity: <input type="text" id="qty'.$row["product_id"].'">
                                    <button type="button" class="btn btn-primary btn-sm concart" value="'.$row["product_id"].'"><i class="fas fa-cart-plus"></i></button>
                                </div>
        
                                <div class="btn-group" style="margin-left: 25px; margin-top: 15px">
                                    <button type="button" style="margin-top:12px" class="add-to-cart-btn-product-item addcart" value="'.$row["product_id"].'"><i class="fas fa-cart-plus"></i> Add to cart</button></a>
                                </div>
        
                            </div>';
                        } 
                        $output .= '
                    </div>
                </div>
        
            </div>';
            if ($inc == 3) $output .= "</div><div style='height: 30px;'></div>";
        }
            if ($inc == 1) $output .= "<div class='col-lg-4'></div><div class='col-lg-4'></div></div>";
            if ($inc == 2) $output .= "<div class='col-lg-4'></div></div>";

	}
	else
	{
		$output = 
        '<div class="alert alert-warning" role="alert">
        <strong>OOPS!</strong> NO ITEM WAS FOUND iN FILTERING.
        </div>
       ';
	}


/////////page number /////

$render = '';
$render .= '<br /><div align="center">';
if ($_POST['cat'] != null) {
    $page_query = "SELECT * from product join brand on (product.BRAND_id = brand.brand_id) WHERE ADMIN_id = 3 AND product.BRAND_id = ".$_POST['cat']." ";


}else {
    $page_query = "select * from product join brand on (product.BRAND_id = brand.brand_id)";
}

if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$page_query .= "
		 AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$page_query .= "
		 AND product.BRAND_id IN('".$brand_filter."')
		";
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$page_query .= "
		 AND RAM IN('".$ram_filter."')
		";
	}
	if(isset($_POST["status"]))
	{
		$status_filter = implode("','", $_POST["status"]);
		$page_query .= "
		 AND status IN('".$status_filter."')
		";
	}

    if(isset($_POST["color"]))
	{
		$color_filter = implode("','", $_POST["color"]); 
		$page_query .= "
		 AND color IN('".$color_filter."') 
		";
	}
   
$page_result = mysqli_query($conn, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);

$render .= '<nav class="pagination-section" aria-label="...">
    <ul class="pagination pagination-lg product-item-background">';
if ($page > 1 ) {
$previous = $page -1 ;
$render .= '
<li class="page-item pagination_page_num" id="'.$previous.'"><a class="page-link" style="cursor:pointer;" tabindex="-1">Previous</a></li>';
}
for($i=1; $i<=$total_pages; $i++) {
    $activePage = '';
    if ($i == $page) {
        $activePage = 'active';
    }
    $render .= ' 
    <li class="page-item pagination_page_num '.$activePage.' " id="'.$i.'" ><a class="page-link" style="cursor:pointer;" >'.$i.'</a></li>
';
}
if ($page < $total_pages) {
    $page = $page +1;
    $render .= '
    <li class="page-item pagination_page_num" id ="'.$page.'"><a class="page-link" style="cursor:pointer;">Next</a></li>';
}  
$render .= '</ul></nav> '; 
$render .= '</div><br /><br />';  

echo $output .''. $render;

}