
<?php
include './includes/class-autoload.inc.php';

	/*$refer = new refer();
	$refer1 = $refer->checkrefer*/
	$q = intval($_GET['q']);

	$obj2 = new addtocart();	 
	$redirect = $obj2->cart($q);

	

?>
		<div class=" scroll">
			<?php  
				$total = 0;
				$lists = new viewrestaurant();
				$restaurantlist = $lists->cartlist($q);
			    foreach ($restaurantlist as $post)
			    {
			    	$total = $total + $post['item_price'];
			?>
			<div class="menu-item">
				<div class="menu-image" ><img width="100%" src="./images/<?php echo $post['item_image'] ?>" ></div>
				<div><h3><?php echo $post['item_name']; ?> </h3></div>
				<div><h4>Price : <?php echo $post['item_price']; ?></h4></div>
			</div>
			
			<?php } ?>
		</div>
		<div class="stick-bottom">
			<div><h4>Total : <?php echo $total; ?></h4></div>
		</div>

