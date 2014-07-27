<?php

require_once("includes/model_user.php");
require_once("includes/form_view.php");
session_start();
$oUser = new User();
$oUser->load($_SESSION["UserID"]);

$sPageTitle=$oUser->UserName;

require_once("includes/header.php");

echo "<p>First Name:".$oUser->FirstName."</p>";
echo "<p>Last Name:".$oUser->LastName."</p>";
echo "<p>Email:".$oUser->Email."</p>";
echo "<p>User Name:".$oUser->UserName."</p>";
echo "<p><a href='my_threads.php'>All My Threads/> </p></a>";
echo "<p><a href='my_thread_names.php'>Threads Control/> </p></a>";
if($oUser->UserName=="xxl"){
	echo "<p><a href='control_all_threads.php'>Control all Threads/> </p></a>";
}
echo "</br>";
echo "</br>";
echo "</br>";


$oForm = new Form();

	if(isset($_POST["Submit"])) {

		$oForm->data = $_POST;

		$oForm->checkRequired("Email");
		$oForm->checkRequired("Password");
		

		if($oForm->isValid) {


			$oUser->load($_SESSION["UserID"]);
			$oUser->Email = $_POST["Email"];
			$oUser->Password = $_POST["Password"];


			$oUser->save();

			header("Location: user_profile.php");
			exit;

		}


	}


	$oForm->makeInputText("New Email*","Email");
	$oForm->makeInputPassword("New Password*","Password");
	$oForm->makeSubmitButton("Update","Submit");



	echo $oForm->html;

require_once("includes/footer.php");


 ?> 

