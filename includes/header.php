<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="GeeK/><?php echo htmlentities($sPageTitle); ?>">
	<?php 
	require_once("model_collection.php");
	require_once("view.php");
	$MetaTopics=Collection::grabAllThreads();
	?>
	<meta name="keywords" content="<?php echo View::renderMetaTopics($MetaTopics); ?>">
	<meta name="author" content="Valentin Ponyaev">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/print.css" media="print">
	<link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
	<title>GeeK/><?php echo htmlentities($sPageTitle); ?></title>
</head>
<body>
	<header>
		
		<a href="index.php" id="logo"></a>
		
		<?php 

		require_once("includes/model_user.php");
		
		if(empty($_SESSION)){	
			session_start();
		}
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
					echo '<a href="user_profile.php" class="nav">&lt; Hi '.$oUser->FirstName.' &gt;</a>';
					echo '<a href="log_out.php" class="nav">&lt; ? LogOut ? &gt;</a>';
				
				}else{
					echo '<a href="log_in.php" class="nav">&lt; ? LogIn ? &gt;</a>';
					echo '<a href="register.php" class="nav">&lt; ? Register ? &gt;</a>';
				}
			?>
			

		</nav>
		

	</header>

			

		<div id="container">
		


	<!-- ============================end of header=================== -->