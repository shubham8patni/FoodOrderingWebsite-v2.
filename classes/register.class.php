<?php


class register extends connection
	{

		private $name;
	    private $mobile;
	    private $email;
	    private $password;
	    private $repassword;
	    private $finalpass;
	    private $photo;
	    private $uploadfile;
	    private $targetfilepath = "./images/";

		
		public function addnewuser($name,$mobile,$email,$password,$photo){
			$conn = $this->conn;
				
	            $obj1 = new sanitize();            
	          
	            $this->name = $obj1->sanitize_new_string($name);     
	            $this->mobile = $obj1->sanitize_new_string($mobile);
	            $this->email = $obj1->sanitize_new_string($email);
	            $this->password = $obj1->sanitize_new_string($password);
	            $this->photo = $obj1->sanitize_new_upload_image_check($_FILES['photo']['tmp_name'],$_FILES['photo']['name']);	          	            
				$this->photo = basename($_FILES['photo']['name']);
				echo $this->photo;
				$this->uploadfile = $this->targetfilepath.basename($_FILES['photo']['name']);		
				if (move_uploaded_file($_FILES['photo']['tmp_name'], $this->uploadfile)) {
				    echo "File is valid, and was successfully uploaded.\n";
				} else {
				    echo "Possible file upload attack!\n";
				}

				$this->finalpass = password_hash("$this->password", PASSWORD_DEFAULT);

	            $sendtodatabase = $this->toDatabase();
	        

	            return $sendtodatabase;
		}

	    private function toDatabase(){
	 
	            $stmt1 = "INSERT INTO `foodnowusers`( `name`, `email`, `password`, `mobile`, `photo_path`, `status`, `UserTypeID`) VALUES ('$this->name','$this->email','$this->finalpass','$this->mobile','$this->photo',1, 2)";
	              
	                    $qryresult=mysqli_query($this->conn,$stmt1);
	 
	                    if ( false===$qryresult ) {
	                  

	                       printf("error: %s\n", mysqli_error($this->conn));
	                    }

	                    if($qryresult){
	       

	                        $sendemail = $this->emailFormat();
	                     
	                        return true;

	                    }
	            

	    }

	    private function emailFormat(){
	    				echo "4";

                       $objem = new megafunction();


                      $this->to2 = $this->em;
                      #$this->subject1 = "New Lead";
                      $this->subject2 = "Registration Successful";
                        //echo "New record created successfully";
                        #$this->message1 = "
                        #<html>
                        #<head>
                        #<title>Details</title>
                        #</head>
                        #<body>
                        #<p>Olympiad Registration</p>
                        
                        #The candidate is : ". $this->tp ." ;
                        #Name : " . $this->pn . ";
                        #Email: " . $this->em . ";
                        #Phone : ". $this->mobile ." ;                        
                        #School : ". $this->in ." ;
                        #Message/Query : ". $this->qr ." ;
                        
                        #</body>
                        #</html>
                        #";

                        $this->message2 = '
                        <html>
                        <head>
                        <title>HTML email</title>
                        </head>
                        <body>
                        <p>
	                        Thankyou for registering with FoodNow. Have great meals. :)   <br>
	                    </p>
                        
                        </body>
                        </html>  ';
         
                        #$this->cc1 = 'Cc: hello@cerebrokids.com , neha@cerebrokids.com ' ;
                        $this->cc2 = 'Cc: shubhampatni88@gmail.com ';

                      #$email = $objem->email($this->to1, $this->subject1, $this->message1, $this->cc1);
                      $email = $objem->email2($this->to2, $this->subject2, $this->message2 ,$this->cc2);
                      

                    if($email){

                        return $this->redirect();
                       
                    }

	    }

	    private function redirect(){
	 
	            header("location:menu.php");	            
	            exit;

	    }

}

?>