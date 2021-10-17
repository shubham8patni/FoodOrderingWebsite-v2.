<?php
	include './includes/class-autoload.inc.php';
	error_reporting(0);
	$refer = new refer();
	$refer1 = $refer->checkrefer();

	$sess1 = new SessionCheck();
	$sess = $sess1->session();

	$hash = $_GET['id'];
	$hash = trim($hash);
	$hash = str_replace(' ', '+', $hash);

	$enc = new encdec();
	$enc1 = $enc->decode($hash);
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
	function showUser(str) {
	  if (str == "") {
	    document.getElementById("buy-btn").innerHTML = "";
	    return;
	  } else {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	        document.getElementById("mini-cart1").innerHTML = this.responseText;
	        
	      }
	    };
	    xmlhttp.open("GET","getmenu.class.php?q="+str,true);
	    xmlhttp.send();

	  }
	}


	$(document).ready(function(){
		
		$.ajax({
			url: 'getmenu.class.php?q',
			success: function(data){
				
				$("#mini-cart1").html(data);
				var n1 = document.getElementById('qty');
				var n2 = document.getElementById('cart-value');
				n2.innerText = n1.innerText;
			}
		})
	});

	
	
	function sync()
	{
		setTimeout(function() {
	    	var n1 = document.getElementById('qty');
			var n2 = document.getElementById('cart-value');
			n2.innerText = n1.innerText;
  		}, 1200);
		 
	}
</script>
	</script>
</head>
<body>

	<!-- Header Start -->
		<?php include "./includes/header.php" ?>
	<!-- Header Close -->


	<!-- First Section Start -->
	<section class="outer-flex1">

		<div class="menu-view width-70">
			<?php  
				$lists = new viewrestaurant();
				$restaurantlist = $lists->menulist($enc1);
			    foreach ($restaurantlist as $post)
			    {
			?>
			<div class="menu-item">
				<div class="menu-image" ><img width="100%" id="buy-btn" src="./images/<?php echo $post['item_image'] ?>" ></div>
				<div><h3 id="buy-btn"><?php echo $post['item_name']; ?> </h3><p id="buy-btn" style="text-align: center;">[<?php echo $post['item_info']; ?>]</p></div>
				<div><h4>Price : <?php echo $post['item_price']; ?></h4> <button type="button" class="buy-btn" id="buy-btn" onclick=" showUser(this.value);sync();" value="<?php echo $post['id']; ?>">Add +</button></div>
			</div>
			<?php } ?>
		</div>

		<div id="mini-cart1" class="side-view width-20">
			
		</div>

	</section>
	<!-- First Section Close -->



	<!-- Footer Start -->
		<?php include "./includes/footer.php" ?>
	<!-- Footer Close -->

</body>
</html>