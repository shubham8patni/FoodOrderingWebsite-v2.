<?php


class addtocart extends connection
	{

		private $item_id;
		private $item_quantity;
		private $user_id;
	    private $session_id;
		
		public function cart($i,$q){
			$conn = $this->conn;

	            $obj1 = new sanitize();            

	           	
	           	$this->item_id = $obj1->sanitize_new_string($i);
	           	$this->item_quantity = $obj1->sanitize_new_string($q);
	            $this->user_id = $obj1->sanitize_new_string($_SESSION['iuser_id']);     
	            $this->session_id = session_id();           
	            
	            $sendtodatabase = $this->toDatabase();
	                
	            return $sendtodatabase;
		}

	    private function toDatabase(){
	  
	            $stmt1 = "INSERT INTO `foodnowcart`(`session_id`, `item_id`, `item_quantity`, `user_id`, `status`) VALUES ('$this->session_id','$this->item_id', '$this->item_quantity', '$this->user_id',1)";
	              
	                    $qryresult=mysqli_query($this->conn,$stmt1);
	 
	                    if ( false===$qryresult ) {
	                   
	                       printf("error: %s\n", mysqli_error($this->conn));
	                    }

	                    if($qryresult){
	                    
	                        //$sendemail = $this->redirect();
	                     
	                        return true;

	                    }

	    }

	    /*private function redirect(){
	 			echo '<script>alert("Restaurant added successfully")</script>';
	            header("location:restaurants.php");	            
	            exit;

	    }*/

}


?>