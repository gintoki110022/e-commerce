<?php
	include('session.php');
	
	$name=$_POST['name'];
	$brand_id=$_POST['category'];
	$price=$_POST['price'];
	$color=$_POST['color'];
	$cpu=$_POST['cpu'];
	$ram=$_POST['ram'];
	$gpu=$_POST['gpu'];
	$storage=$_POST['storage'];
	$monitor=$_POST['monitor'];
	$battery=$_POST['battery'];
	$weight=$_POST['weight'];
	$size=$_POST['size'];
	$qty=$_POST['qty'];
	$status = $_POST['status'];

	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" || $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}

	mysqli_query($conn,"insert into product (product_name,BRAND_id,product_price,product_qty,product_photo_link, color,CPU,RAM,GPU,storage,monitor,battery,weight,size,ADMIN_id,status) values ('$name','$brand_id','$price','$qty','$location','$color','$cpu','$ram',
	 '$gpu','$storage','$monitor','$battery','$weight','$size'," . $_SESSION['id'] . ",'$status')");

	$pid=mysqli_insert_id($conn);
	$sql = "
		SELECT * from product WHERE product_id = $pid
	";

	$statement = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($statement);
	$product_name = $row['product_name'];


	mysqli_query($conn,"insert into inventory (USER_id, action, PRODUCT_id, qty, updated_date,product_name,user_name) values ('".$_SESSION['id']."', 'Add Product', '$pid', '$qty', NOW(), '$product_name','admin')");
	
	?>
		<script>
			window.alert('Product added successfully!');
			window.history.back();
		</script>
	<?php
?>