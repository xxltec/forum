<?php 
session_start();
if($_SESSION["UserID"]) {
		session_destroy();
		header("Location:index.php");
		exit;
	} 

 ?>