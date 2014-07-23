<?php 

require_once("includes/header.php");
require_once("includes/form_view.php");
require_once("includes/model_user.php");
require_once("includes/model_collection.php");
require_once("includes/model_thread.php");


$oForm = new Form();

	if(isset($_POST["Submit"])) {

		$oForm->data = $_POST;
		$oForm->files = $_FILES;

		$oForm->checkRequired("ThreadName");
		

		if($oForm->isValid) {


			$oThread = new Thread();
			$oThread->ThreadName = $_POST["ThreadName"];
			$oThread->UserID = $_SESSION["UserID"];


			$oThread->save();

			header("Location: index.php");
			exit;

		}


	}





	$oForm->makeInputText("Thread Name*","ThreadName");
	$oForm->makeSubmitButton("Add a Thread","Submit");



	echo $oForm->html;





require_once("includes/footer.php");



 ?>