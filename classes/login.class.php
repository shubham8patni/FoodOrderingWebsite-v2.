<?php


class login extends connection
{

	private $ip;
    private $email;
    private $pass;

	public function logincontrol($ip,$email,$pass){		
		    
		    $conn = $this->conn;

            $obj1 = new sanitize();            
           
            $this->ip = $obj1->sanitize_new_string($ip);     
            $this->email = $obj1->sanitize_new_string($email);
            $this->pass = $obj1->sanitize_new_string($pass);

            $checklogin = $this->checklogin();
	}

	private function checklogin(){		

		$conn = $this->conn;	
		$sql = "SELECT * FROM foodnowusers where email='" . $this->email . "'";
		$result = mysqli_query($this->conn,$sql);
		$re_uname1		=	mysqli_fetch_array($result);
		$cntusers		=	mysqli_num_rows($result);

		if ($cntusers > 0) {
			$res_pass_query	=	"select * from foodnowusers where email='" . $this->email . "' and Status=1";
			$res_pass		=	mysqli_query($this->conn, $res_pass_query);
			$re_passtemp	=	mysqli_fetch_array($res_pass);
			$act_password	=	$re_passtemp['password'];
			$cntResult		=	0; //initial value

			if (password_verify($this->pass, $act_password )) {
				$cntResult	=	1; //correct password
			} else {
				$cntResult	=	2; //incorrect password
			}

			$res_uname	=	mysqli_query($this->conn, "select * from foodnowusers where email='" . $this->email . "' and status=1");
			$re_uname	=	mysqli_fetch_array($res_uname);
			$userid = $re_uname['id'];

			if ($cntResult == 2) //if username password doesnt exits
			{
				 
				exit();
			} else if ($cntResult == 1) {

				$usertypeid = $re_uname['UserTypeID'];
				echo $usertypeid;
				$_SESSION['iuser_id']	=	$userid;
				$_SESSION['timeout'] = time();
				$_SESSION['id'] = $userid;
				$_SESSION['f_name'] = $re_uname['name'];
				$_SESSION['email'] = $re_uname['email'];
				#$_SESSION['type'] = $re_uname['type'];
				$_SESSION['contact'] = $re_uname['mobile'];
				$_SESSION['photoURL'] = $re_uname['photo_path'];

				if ($usertypeid == 2) {
					$_SESSION['loggedin'] = "user";
					$_SESSION['item_count'] = 0;
					$_SESSION['cart_item'] = array();
				}else if($usertypeid == 1) {
					$_SESSION['loggedin'] = "admin";
				}else {
					die("Error exists");
				}

				$_SESSION['usertypeid']	=	$usertypeid;
				$_SESSION['isLoggedIn'] = true;
				$_SESSION['timeOut'] 	= 6000;

				if ($usertypeid == 1) {
					$_SESSION['upload_authorization'] = true;
					header("location:index.php");
					exit;
				}

				if ($usertypeid == 2) {
					header("location:index.php");
					exit;
				}

			}else {
				
				header("location:login.php?err=2");
				exit;
			}


	}
}
}

?>