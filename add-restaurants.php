
<?php

    include './includes/class-autoload.inc.php';
    
    if($_SERVER['REQUEST_METHOD']=="POST"){

	        $obj1 = new sanitize();

	        $rn = $obj1->sanitize_new_string($_POST['restaurant-name']);     
	        $rt = $obj1->sanitize_new_string($_POST['restaurant-tags']);
	        $ra = $obj1->sanitize_new_string($_POST['restaurant-addinfo']);
	        $cn = $obj1->sanitize_new_string($_POST['contact-number']);       

	        $obj2 = new addrestaurants();	 
	        $redirect = $obj2->addnewrestaurant($rn,$rt,$ra,$cn,$_FILES);
	            exit();

    }
?>

<?php

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
						<label>Restaurant's Name *</label>
						<input type="text" name="restaurant-name" required="true">
					</div>
					<div class="form-group">
						<label>Contact Number *</label>
						<input type="text" name="contact-number" required="true">
					</div>
					<div class="form-group">
						<label>Tags *</label>
						<input type="text" name="restaurant-tags" required="true">
					</div>
					<div class="form-group">
						<label>Additional Information *</label>
						<input type="text" name="restaurant-addinfo" required="true">
					</div>
					<div class="form-group">
						<label>Add Image *</label>
						<input class="pointer" type="file" name="photo" autocomplete="on">
						<p>Allowed file types : png, jpg, jpeg</p>
					</div>

					<input class="form-button" type="submit" name="add_restaurant" value="Add Restaurant">
				</form>
			</div>		
	</section>
	<!-- Form Section Close -->



	<!-- Footer Start -->
		<?php include "./includes/footer.php" ?>
	<!-- Footer Close -->
</body>
</html>