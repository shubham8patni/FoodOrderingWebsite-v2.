<?php


class addfooditem extends connection
	{

		private $restaurant_name;
		private $item_name;
	    private $item_addinfo;
	    private $item_price;
	    private $item_image;
	    private $uploadfile;
	    private $targetfilepath = "./images/";
	    private $newid;
		
		public function addnewitem($rn,$in,$ra,$ip,$photo){
			$conn = $this->conn;

	            $obj1 = new sanitize();            
	           	
	           	$this->restaurant_name = $obj1->sanitize_new_string($rn); 
	            $this->item_name = $obj1->sanitize_new_string($in);     
	            $this->item_addinfo = $obj1->sanitize_new_string($ra);
	            $this->item_price = $obj1->sanitize_new_string($ip);
	            $this->item_image = $obj1->sanitize_new_upload_image_check($_FILES['photo']['tmp_name'],$_FILES['photo']['name']);	
	            $this->item_image = basename($_FILES['photo']['name']);
	            $this->uploadfile = $this->targetfilepath.basename($_FILES['photo']['name']);		
				if (move_uploaded_file($_FILES['photo']['tmp_name'], $this->uploadfile)) {
				    echo "File is valid, and was successfully uploaded.\n";
				} else {
				    echo "Possible file upload attack!\n";
				}


	            
	            $sendtodatabase = $this->toDatabase();
	                
	            return $sendtodatabase;
		}

	    private function toDatabase(){
	  
	            $stmt1 = "INSERT INTO `menulist`(`rid`, `item_name`, `item_info`, `item_price`, `item_image`) VALUES ('$this->restaurant_name','$this->item_name', '$this->item_addinfo', '$this->item_price','$this->item_image')";
	              
	                    $qryresult=mysqli_query($this->conn,$stmt1);
	 
	                    if ( false===$qryresult ) {
	                   
	                       printf("error: %s\n", mysqli_error($this->conn));
	                    }

	                    if($qryresult){
	                    
	                        $sendemail = $this->redirect();
	                     
	                        return $sendemail;

	                    }

	    }

	    private function redirect(){
	    		$enc = new encdec();
			    $enc1 = $enc->encode($this->restaurant_name);
	 			echo '<script>alert("Item added succesfully!")</script>';
	            header("location:menu.php?id=".$enc1);	            
	            exit;

	    }

}


?>