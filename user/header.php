<?php
include('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>SOUND</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Mixtape template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->
	<header class="header">
		<div class="header_content d-flex flex-row align-items-center justify-content-center">
			<div class="logo"><a href="#">SOUND</a></div>
				<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="active"><a href="index.php">Home</a></li>

					<li><a href="about.php">About us</a></li>				
					<li><a href="contact.php">Contact</a></li>
				


					 <?php if(isset($_SESSION['user_name'])):?>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Register</a></li>
					
					<li><a href="logout.php">LOGOUT</a></li>
						                           <?php
                    endif;
                  ?>
				</ul>
			</nav>
			<div class="log_reg">
				
 <div class="ms-auto d-none d-lg-flex">
                   <?php if(isset($_SESSION['user_name'])):?>
                        <h4>Welcome, <?php echo $_SESSION['user_name']; ?>!</h4>
                    <?php else:?>
                        <h4>Welcome, Guest!</h4>
                  <?php
                    endif;
                  ?>
                    </div>
				<ul class="d-flex flex-row align-items-start justify-content-start">
					
				</ul>
			</div>
			<div class="hamburger ml-auto">
				<div class="d-flex flex-column align-items-end justify-content-between">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
		</div>
	</header>

	

















