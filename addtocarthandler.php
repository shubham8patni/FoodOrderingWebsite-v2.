
<?php
include './includes/class-autoload.inc.php';
	$connection = new connection();
	$conn = $connection->__construct();

	/*$refer = new refer();
	$refer1 = $refer->checkrefer*/

	$obj2 = new addtocart();
		$msg = $_GET["msg"];
			if(!empty($_SESSION["cart_item"])) {				
				foreach($_SESSION["cart_item"] as $k=>$v){
				    $i = $_SESSION['cart_item'][$k]["item_id"];
					$q = $_SESSION['cart_item'][$k]["quantity"];
				    $redirect = $obj2->cart($i,$q); 
				    unset($_SESSION['cart_item'][$k]);   
				    unset($_SESSION['item_count']);
				    
				}	
				
			}
		
	header("Location: ./cart.php?op=1");
?>
	