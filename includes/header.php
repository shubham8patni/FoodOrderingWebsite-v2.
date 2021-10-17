<?php
	$connection = new connection();
	$conn = $connection->__construct();

?>
<html>
<head>
	<title></title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>

		$(document).ready(function(){
			
			$.ajax({
				url: 'testmenu.php?q',
				success: function(data){
					
					$("#mini-cart").html(data);
					setTimeout(function() {
				    	var n1 = document.getElementById('qty');
						var n2 = document.getElementById('cart-value');
						n2.innerText = n1.innerText;
			  		}, 1500);
					
				}
			})
		});

	</script>
</head>

<body>
	<div class="header-outer" id="myHeader">
		<div class="header-inner">
			<div class="left-header">
				<img src="">
				<h2>FoodNow</h2>
			</div>
			<div class="right-header">
				<a class="header-btn" href="restaurants.php">Home</a>
								
				<?php

					if (isset($_SESSION['loggedin'])) {

				?>
				<?php

					if ($_SESSION['loggedin'] == "admin") {

				?>
				<a class="header-btn" href="add-restaurants.php">Add Restaurant</a>
				<?php
					}
				?>
				<a id="cart-value" class="header-btn" href="cart.php">Cart</a>
				<a class="header-btn" href="./profile.php">Profile</a>
				<a class="login-btn" href="./logout.php">Logout</a>

				<?php
					}
					else{
				?>
				<a class="login-btn" href="login.php">Login</a>
				<?php
					}
				?>
			</div>
		</div>		
	</div>
	<div id="mini-cart" hidden="true">
			
	</div>
</body>
</html>