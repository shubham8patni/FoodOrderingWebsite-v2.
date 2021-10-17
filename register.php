
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    include './includes/class-autoload.inc.php';
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
 
    		
    	
	        $obj1 = new sanitize();
	    
	        $name = $obj1->sanitize_new_string($_POST['name']);     
	        $mobile = $obj1->sanitize_new_string($_POST['mobile']);
	        $email = $obj1->sanitize_new_string($_POST['email']); 
	        $password = $obj1->sanitize_new_string($_POST['password']);     
	        $repassword = $obj1->sanitize_new_string($_POST['repassword']);


     		$obj3 = new passwordmatch();       		
     		$check = $obj3->match($password,$repassword);
     

	        $obj2 = new register();
	        $redirect = $obj2->addnewuser($name,$mobile,$email,$password,$_FILES);	            
	        exit();
     
        
    }
?>

<?php
	
	$refer = new refer();
	$refer1 = $refer->checkrefer();

	$obj1 = new sanitize();
	$ass_flag= $obj1->sanitize_new_string($_GET['err']);
	if($ass_flag==1)
		 {
		    echo '<script>alert("Passwords do not match try again")</script>';
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
				<form method="post" action="" role="form" enctype="multipart/form-data">
					<h1 class="center">Register</h1>		
					<div class="form-group">
						<label>Name *</label>
						<input type="text" name="name" required="true" autocomplete="on">
					</div>
					<div class="form-group">
						<label>Mobile No. *</label>
						<input type="text" name="mobile" required="true" autocomplete="on">
					</div>	
					<div class="form-group">
						<label>Email *</label>
						<input type="text" name="email" required="true" autocomplete="on">
					</div>
					<div class="form-group">
						<label>Password *</label>
						<input type="password" name="password" required="true">
					</div>
					<div class="form-group">
						<label>Re-Enter Password *</label>
						<input type="password" name="repassword" required="true">
					</div>
					<div class="form-group">
						<label>Select Profile Image *</label>
						<input class="pointer" type="file" name="photo" autocomplete="on">
						<p>Allowed file types : png, jpg, jpeg</p>
					</div>
					<input class="form-button" type="submit" name="register" value="Add Restaurant">
					<div class="form-group">
						<label>Already a member? <a href="login.php"> <u>Login</u></a> </label>
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