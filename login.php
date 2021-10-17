
<?php

    include './includes/class-autoload.inc.php';
    
    if($_SERVER['REQUEST_METHOD']=="POST"){


	        $obj1 = new sanitize();

	        $ip	= $_SERVER['REMOTE_ADDR'];
	        $email = $obj1->sanitize_new_string($_POST['email']);     
	        $pass = $obj1->sanitize_new_string($_POST['password']);
     

	        $obj2 = new login();
	 
	        $redirect = $obj2->logincontrol($ip,$email,$pass);
	    
	            header($redirect);
	            exit();
        
    }
?>

<?php 

	$obj1 = new sanitize();
	$ass_flag= $obj1->sanitize_new_string($_GET['err']);
	if($ass_flag==1)
		 {
		    echo '<script>alert("wrong Email or Password! Try again")</script>';
		 }
	else if($ass_flag==2)
		 {
		    echo '<script>alert("Something went wrong. Try again")</script>';
		 }	

?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
    <meta name="description" content="Orger Your Favourite Food Now">
    <meta name="keywords" content="Food">
    <meta name="author" content="Shubham Patni">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Add your Restaurant</title>

	<link rel="stylesheet" type="text/css" href="./assets/css/base.css">
</head>
<body>

	<!-- Header Start -->
		<?php include "./includes/header.php" ?>
	<!-- Header Close -->

	<!-- Form Section Start -->
	<section class="form-outer">	
			<div class="form-inner">
				<form method="post" action="" role="form">
					<h1 class="center">Login</h1>			
					<div class="form-group">
						<label>Email *</label>
						<input type="text" name="email" required="true">
					</div>
					<div class="form-group">
						<label>Password *</label>
						<input type="password" name="password" required="true">
					</div>
					<input class="form-button" type="submit" name="login" value="Login">

					<div class="form-group">
						<label>Not a member? <a href="register.php"> <u>Register Now</u></a> </label>
					</div>
				</form>
			</div>		
	</section>
	<!-- Form Section Close -->



	<!-- Footer Start -->
		<?php include "./includes/footer.php" ?>
	<!-- Footer Close -->
</body>
</html>