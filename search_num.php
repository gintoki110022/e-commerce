<?php
	if(isset($_POST['num'])){
		$search = $_POST['name'];
		$query=mysqli_query($conn,"select * from `PRODUCT` where product_name like '%$search%'");
		echo mysqli_num_rows($query);
	}
?>