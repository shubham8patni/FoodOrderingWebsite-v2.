<?php
	include './includes/class-autoload.inc.php';

	$refer = new refer();
	$refer1 = $refer->checkrefer();

	$sess1 = new SessionCheck();
	$sess = $sess1->session();

	/*$obj2 = new addtocart();	 
	$redirect = $obj2->cart($q);*/
	$op = $_GET['op'];
	$obj1 = new sanitize();        
	$obj = $obj1->sanitize_new_string($op);
	if($obj == 1){
		echo '<script>alert("Order Placed.")</script>';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Orger Your Favourite Food Now">
    <meta name="keywords" content="Food">
    <meta name="author" content="Shubham Patni">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Select Restaurants</title>

	<link rel="stylesheet" type="text/css" href="./assets/css/base.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
	/*function addtocart(str) {
	  if (str == "") {
	    document.getElementById("buy-btn").innerHTML = "";
	    return;
	  } else {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	        //document.getElementById("mini-cart1").innerHTML = this.responseText;
	        window.location.reload();
	      }
	    };
	    xmlhttp.open("GET","addtocarthandler.php?msg="+str,true);
	    xmlhttp.send();

	  }
	}*/
	</script>

</head>
<body>

	<!-- Header Start -->
		<?php include "./includes/header.php" ?>
	<!-- Header Close -->


	<!-- First Section Start -->
	<section class="outer-flex1">


		<div id="mini-cart" class="menu-view width-90">
			
				<?php  
					if(empty($_SESSION["cart_item"])) {
						echo "<h1 style='text-align:center;'>No Items Added to Cart</h1>";
					}
					$total = 0;
					$lists = new viewrestaurant();
					foreach($_SESSION["cart_item"] as $k=>$v){
		    			$info = $_SESSION['cart_item'][$k]["item_id"];
						$restaurantlist = $lists->cartlist($info);
					    foreach ($restaurantlist as $post)
					    {
					    	$total = $total + ($post['item_price']*$_SESSION['cart_item'][$k]["quantity"]);
				    	
				?>
				<div class="menu-item">
					<div class="menu-image" ><img width="100%" src="./images/<?php echo $post['item_image'] ?>" ></div>
					<div><h3><?php echo $post['item_name']; ?> </h3></div>
					<div><h4>Price : <?php echo $post['item_price']; ?></h4><h4>Qty : <?php echo $_SESSION['cart_item'][$k]["quantity"]; ?></h4></div>
				</div>
				
				<?php } } ?>

				<div class="menu-item">
					<div><h4>Total : <?php echo $total; ?></h4></div>
					<div class="" style="line-height: 100%;"><p><a href="addtocarthandler.php" style="cursor: pointer;" class="login-btn" id="buy-btn"  value="add_item">Check Out</a></p></div>
				</div>
							
		</div>
			
		

	</section>
	<!-- First Section Close -->



	<!-- Footer Start -->
		<?php include "./includes/footer.php" ?>
	<!-- Footer Close -->

</body>
</html>