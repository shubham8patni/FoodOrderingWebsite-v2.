
<?php
include './includes/class-autoload.inc.php';
	$connection = new connection();
	$conn = $connection->__construct();
	/*$refer = new refer();
	$refer1 = $refer->checkrefer*/
	$q = intval($_GET['q']);
	


	if(!empty($q)){
			$_SESSION['item_count'] = $_SESSION['item_count'] + 1;
			$quantity = 1;
			$itemArray = array($_SESSION['item_count']=>array('item_id'=>$_GET['q'], 'quantity'=>$quantity));
			if(!empty($_SESSION["cart_item"])) {
				if(array_search($q, array_column($_SESSION["cart_item"], 'item_id')) !== FALSE){
					foreach($_SESSION["cart_item"] as $k=>$v){
					    if($q == $_SESSION['cart_item'][$k]["item_id"]){
					    	$_SESSION['cart_item'][$k]["quantity"] = $_SESSION['cart_item'][$k]["quantity"] + 1;	       
					    }
					}
				}
				else{
				   	$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			}
			else {
				$_SESSION["cart_item"] = $itemArray;			
			}	
	}
	/*$obj2 = new addtocart();	 
	$redirect = $obj2->cart($q);*/	

?>
		
		<h4 id="qty" hidden="true">Cart<?php echo "(" . $_SESSION['item_count'] . ")" ?></h4>
		<div class=" scroll">

			<?php  
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
			<div class="stick-bottom">
					<div><h4>Total : <?php echo $total; ?></h4></div>
					
			<div>
		</div>

