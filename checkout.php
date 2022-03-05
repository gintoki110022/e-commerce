<?php include('session.php'); ?>
<body>
<div class="w3-container">
	<div class="row w3-margin-top"></div>
	<div class="row">
		<div class="col-lg-12">
			<a href="home.html" class="btn btn-primary" style="position:relative; left:3px;"><i class="fas fa-arrow-left"></i> Cancel</a>
		</div>
	</div>
	<div style="height:10px;"></div>
	<div id="checkout_area"></div>
	<!-- <div class="row">
		<span class="pull-right" style="margin-right:15px;"><strong>Payment method Here</strong></span>
	</div> -->
	<div style="height:20px;"></div>
</div>
<?php include('script.php'); ?>
<script>
$(document).ready(function(){
	showCheckout();	
});
</script>
</body>
</html>