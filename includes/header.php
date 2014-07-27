<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="GeeK/><?php echo $sPageTitle; ?>">
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
	<title>GeeK/><?php echo $sPageTitle; ?></title>
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