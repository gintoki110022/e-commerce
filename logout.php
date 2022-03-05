<link href="css/login.css" rel="stylesheet">
<center>
	<div class="modal" id="myModal">
		<div class="modal-dialog">

			<!-- Modal body -->
			<div class="modal-body">
				<div class="container-login" id="loginForm">
					<h3 class="text-white">
						<center>Are you sure you want to logout?</center>
					</h3>
					<hr>
					<form method="get" action="logout_processing.php" id="input">
						<button type="submit" value="Logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</center>
<script>
	document.getElementById("myModal").style.display = 'block';
</script>
<script type="text/javascript" src="validate.js"></script>