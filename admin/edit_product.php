<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	$p=mysqli_query($conn,"select * from product where product_id='$id'");
	$prow=mysqli_fetch_array($p);
	
	$name=$_POST['name'];
	$brand_id=$_POST['brand_id'];
	$price=$_POST['price'];
	$qty=$_POST['qty'];
	$status = $_POST['status'];

	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location=$prow['product_photo_link'];
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location=$prow['product_photo_link'];
			?>
				<script>
					window.alert('Photo not updated. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	
	mysqli_query($conn,"update product set product_name='$name',product_price='$price', product_photo_link='$location', product_qty='$qty',BRAND_id = '$brand_id',status ='$status' where product_id='$id'");
	
	if($qty!=$prow['product_qty']){
		mysqli_query($conn,"insert into inventory (USER_id,action,PRODUCT_id,qty,updated_date) values ('".$_SESSION['id']."','Update Quantity', '$id', '$qty', NOW())");
	}
	// else if($location!=$prow['product_photo_link']){
	// 	echo '2';
	// 	mysqli_query($conn,"insert into inventory (USER_id,action,PRODUCT_id,qty,updated_date) values ('".$_SESSION['id']."','Update product's photo', '$id', '$qty', NOW())");
	// }
	// else if($price!=$prow['product_price']){
	// 	echo '3';
	// 	mysqli_query($conn,"insert into inventory (USER_id,action,PRODUCT_id,qty,updated_date) values ('".$_SESSION['id']."','Update product's price', '$id', '$qty', NOW())");
	// }
	// else if($name!=$prow['product_name']){
	// 	echo '4';
	// 	mysqli_query($conn,"insert into inventory (USER_id,action,PRODUCT_id,qty,updated_date) values ('".$_SESSION['id']."','Update product's name', '$id', '$qty', NOW())");
	// }
	// else if($brand_id!=$prow['BRAND_id']){
	// 	echo '5';
	// 	mysqli_query($conn,"insert into inventory (USER_id,action,PRODUCT_id,qty,updated_date) values ('".$_SESSION['id']."','Update product's brand', '$id', '$qty', NOW())");
	// }
	?>
		<script>
			window.alert('Product updated successfully!');
			window.history.back();
		</script>
	<?php

?>