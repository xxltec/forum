<?php 

require_once("includes/header.php");
require_once("includes/model_user.php");
require_once("includes/form_view.php");


$oUser = new User();
$oUser->load($_SESSION["UserID"]);


echo "<p>First Name:".$oUser->FirstName."</p>";
echo "<p>Last Name:".$oUser->LastName."</p>";
echo "<p>Email:".$oUser->Email."</p>";
echo "<p>User Name:".$oUser->UserName."</p>";
echo "<p><a href='my_threads.php'>My Threads/> </p></a>";
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

