<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/style.css">
	<link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
	<title>Document</title>
</head>
<body>
	<header>
		
		<a href="index.php" id="logo"></a>
		
		<?php 

		require_once("includes/model_user.php");
			session_start();

			if(isset($_SESSION["UserID"])){
			
				$oUser = new User;
				$oUser->load($_SESSION["UserID"]);

				echo '<span>
						<img src="'.$oUser->PhotoPath.'" alt="" id="userImg">
					</span>';

			} else {

				echo '
				<span>
				<img src="assets/pics/question.png" alt="" id="userImg">
				</span>';
			}




		 ?>


		
		
		<nav>
			<?php
				if(isset($_SESSION["UserID"])){
					echo '<a href="user_profile.php" class="nav">< Hi '.$oUser->FirstName.' ></a>';
					echo '<a href="log_out.php" class="nav">< ? LogOut ? ></a>';
				
				}else{
					echo '<a href="log_in.php" class="nav">< ? LogIn ? ></a>';
					echo '<a href="register.php" class="nav">< ? Register ? ></a>';
				}
			?>
			

		</nav>
		

	</header>

			

		<div id="container">
		


	<!-- ============================end of header=================== -->