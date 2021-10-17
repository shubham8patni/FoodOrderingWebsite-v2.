<?php

class passwordmatch extends connection
	{

		private $password;
	    private $repassword;
	    #private $err1 = '<script>alert("Passwords do not match try again")</script>';
	

	    public function match($password,$repassword){
			$conn = $this->conn;

			$obj1 = new sanitize();            
	           
	            $this->password = $obj1->sanitize_new_string($password);     
	            $this->repassword = $obj1->sanitize_new_string($repassword);

	            if($this->password != $this->repassword){
		            return header("location:register.php?err=1");
		            
	            }
	            else if($this->password == $this->repassword){
	            	return true;
	            }
	    }

	}

?>