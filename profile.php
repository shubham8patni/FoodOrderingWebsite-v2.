<?php
	include './includes/class-autoload.inc.php';

	$refer = new refer();
	$refer1 = $refer->checkrefer();
	
	$sess1 = new SessionCheck();
	$sess = $sess1->session();


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
	<section class="primary-div">	
		<div class="profile-view">
			<div class="profile-content">
				<div class="profile-pic">
					<img src="./images/<?php echo $_SESSION['photoURL'] ?>" width="80%" >
				</div>
				
			</div>
			
			<div class="profile-content">
				<div class="profile-details">
					<p><b>Name : </b><?php echo $_SESSION['f_name']; ?><br><br><br><br></p>
					<p><b>Email : </b><?php echo $_SESSION['email']; ?><br><br><br><br></p>
					<p><b>Mobile No. : </b><?php echo $_SESSION['contact']; ?><br><br><br><br></p>
				</div>
			</div>
		</div>
		
	</section>
	<!-- Form Section Close -->



	<!-- Footer Start -->
		<?php include "./includes/footer.php" ?>
	<!-- Footer Close -->
</body>
</html>