<?php


class addrestaurants extends connection
	{

		private $restaurant_name;
	    private $restaurant_tags;
	    private $restaurant_addinfo;
	    private $restaurant_image;
	    private $contact_number;
	    private $uploadfile;
	    private $targetfilepath = "./images/";
	    private $newid;
		
		public function addnewrestaurant($rn,$rt,$ra,$cn,$photo){
			$conn = $this->conn;

	            $obj1 = new sanitize();            
	           
	            $this->restaurant_name = $obj1->sanitize_new_string($rn);     
	            $this->restaurant_tags = $obj1->sanitize_new_string($rt);
	            $this->restaurant_addinfo = $obj1->sanitize_new_string($ra);
	            $this->contact_number = $obj1->sanitize_new_string($cn);
	            $this->restaurant_image = $obj1->sanitize_new_upload_image_check($_FILES['photo']['tmp_name'],$_FILES['photo']['name']);	
	            $this->restaurant_image = basename($_FILES['photo']['name']);
	            $this->uploadfile = $this->targetfilepath.basename($_FILES['photo']['name']);		
				if (move_uploaded_file($_FILES['photo']['tmp_name'], $this->uploadfile)) {
				    echo "File is valid, and was successfully uploaded.\n";
				} else {
				    echo "Possible file upload attack!\n";
				}

				/* Generate ID*/
				$query = 'Select * from restaurantlist ORDER BY id DESC LIMIT 1 ';
              	$id = mysqli_query($conn,$query);
                $row = mysqli_fetch_assoc($id);
                $id = $row['url_id'];
				$this->newid = substr($id, strpos($id, "_") + 1); 
                $this->newid = $this->newid + 1;
                $this->newid = "fdnrest_".$this->newid;
                
	            
	            $sendtodatabase = $this->toDatabase();
	                
	            return $sendtodatabase;
		}

	    private function toDatabase(){
	  
	            $stmt1 = "INSERT INTO `restaurantlist`( `restaurant_name`, `tags`, `additional_info`, `contactnum`, `image_name`, `url_id`, `status`) VALUES ('$this->restaurant_name','$this->restaurant_tags','$this->restaurant_addinfo','$this->contact_number', '$this->restaurant_image', '$this->newid', 1 )";
	              
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
	 			echo '<script>alert("Restaurant added successfully")</script>';
	            header("location:restaurants.php");	            
	            exit;

	    }

}


?>
