<?php 
	
	include './includes/class-autoload.inc.php';
	
	#$sess1 = new SessionCheck();

	#$sess = $sess1->session();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Order Your Favourite Food Now">
    <meta name="keywords" content="Food">
    <meta name="author" content="Shubham Patni">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Select Restaurants</title>

	<link rel="stylesheet" type="text/css" href="./assets/css/base.css">
</head>
<body>

	<!-- Header Start -->
	<?php include "./includes/header.php" ?>
	<!-- Header Close -->


	<!-- First Section Start -->
	<section class="outer-flex">
		<div class="restaurants-view">
			<?php  
				$lists = new viewrestaurant();
				$restaurantlist = $lists->restaurantlist();
			    foreach ($restaurantlist as $post)
			    {

			    	$enc = new encdec();
			    	$enc1 = $enc->encode($post['url_id']);
			?>
			<div class="restaurants-name">
				<a href="./menu.php?id=<?php echo $enc1;?>">
					<div><img src="./images/<?php echo $post['image_name']; ?>"></div>
					<div class="restaurants-info">
						<div><h3><?php echo $post['restaurant_name']; ?></h3></div>
						<div><p><?php echo $post['tags']; ?></p></div>
						<div><p><?php echo $post['additional_info']; ?></p></div>
					</div>					
				</a>
				<?php 
				if($_SESSION['loggedin'] == 'admin')
					{
					    ?>
					<div class="restaurants-info">
						<div class="form-button"><a href="add-menuitem.php?id=<?php echo $enc1; ?>"><h3>ADD NEW ITEM +</h3></a></div>						
					</div>  
				<?php
					}
				?>
			</div>
			
			<?php } ?>
			
		</div>
	</section>
	<!-- First Section Close -->



	<!-- Footer Start -->
	<?php include "./includes/footer.php" ?>
	<!-- Footer Close -->

</body>
</html>