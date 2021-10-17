
<?php

    include './includes/class-autoload.inc.php';
    
    if($_SERVER['REQUEST_METHOD']=="POST"){

	        $obj1 = new sanitize();

			$rn = $obj1->sanitize_new_string($_POST['restaurants_name']);
	        $in = $obj1->sanitize_new_string($_POST['item-name']);     
	        $ra = $obj1->sanitize_new_string($_POST['restaurant-addinfo']);
	        $ip = $obj1->sanitize_new_string($_POST['item_price']);       

	        $obj2 = new addfooditem();	 
	        $redirect = $obj2->addnewitem($rn,$in,$ra,$ip,$_FILES);
	            exit();

    }
?>

<?php

	$hash = $_GET['id'];
	$hash = trim($hash);
	$hash = str_replace(' ', '+', $hash);
	$enc = new encdec();

	$enc1 = $enc->decode($hash);
	
	$refer = new refer();

	$refer1 = $refer->checkrefer();

	$sess1 = new SessionCheck();

	$sess = $sess1->session();
?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
    <meta name="description" content="Orger Your Favourite Food Now">
    <meta name="keywords" content="Food">
    <meta name="author" content="Shubham Patni">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Add your Restaurant</title>

	<link rel="stylesheet" type="text/css" href="./assets/css/base.css">
</head>
<body>

	<!-- Header Start -->
		<?php include "./includes/header.php" ?>
	<!-- Header Close -->

	<!-- Bar Section Start -->
	<section class="bar-outer">	
			<h1>Register Your Restaurant with Us!!</h1>			
	</section>
	<!-- Bar Section Close -->


	<!-- Form Section Start -->
	<section class="form-outer">	
			<div class="form-inner">
				<form method="post" action="" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label>Choose Restaurant:</label>
						<select name="restaurants_name" required="true">
							<?php  
								$lists = new viewrestaurant();
								$restaurantlist = $lists->restaurantlist();
							    foreach ($restaurantlist as $post)
							    {
							?>					  	
					    	
					    	<option value="<?php echo $post['url_id']; ?>"><?php echo $post['restaurant_name']; ?></option>
					  						
							<?php
								}
							?>
						</select>	
					</div>
					<div class="form-group">
						<label>Food Item Name *</label>
						<input type="text" name="item-name" required="true">
					</div>
					<div class="form-group">
						<label>Item Price *</label>
						<input type="text" name="item_price" required="true">
					</div>
					<div class="form-group">
						<label>Additional Information *</label>
						<input type="text" name="restaurant-addinfo">
					</div>
					<div class="form-group">
						<label>Add Image *</label>
						<input class="pointer" type="file" name="photo" autocomplete="on" >
						<p>Allowed file types : png, jpg, jpeg</p>
					</div>

					<input class="form-button" type="submit" name="add_restaurant" value="Add Item">
				</form>
			</div>		
	</section>
	<!-- Form Section Close -->



	<!-- Footer Start -->
		<?php include "./includes/footer.php" ?>
	<!-- Footer Close -->
</body>
</html>