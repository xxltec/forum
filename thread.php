<?php 

require_once("includes/model_collection.php");
require_once("includes/view.php");
require_once("includes/form_view.php");
require_once("includes/model_user.php");
require_once("includes/model_collection.php");
require_once("includes/model_post.php");


$iThreadID = 1;

if(isset($_GET['threadID'])){
	$iThreadID = $_GET['threadID'];
}

$oThread = new Thread();
$oThread->load($iThreadID);

$oView = new View();




require_once("includes/header.php");

echo View::renderThread($oThread);

if(isset($_SESSION["UserID"])){
$oForm = new Form();

	
	if(isset($_POST["Submit"])) {


		$oForm->data = $_POST;
		$oForm->files = $_FILES;

		$oForm->checkRequired("PostName");
		$oForm->checkRequired("Post");
		

		if($oForm->isValid) {


			$oPost = new Post();
			$oPost->PostName = $_POST["PostName"];
			$oPost->PostText = $_POST["Post"];
			$oPost->ThreadID = $oThread->ThreadID;
			$oPost->UserID = $_SESSION["UserID"];


			$oPost->save();

			header("Location: thread.php?threadID=".$oThread->ThreadID);
			exit;

		}


	}





	$oForm->makeInputText("Post Name*","PostName");
	$oForm->makeInputText("Post*","Post");
	$oForm->makeSubmitButton("Add new Post","Submit");



	echo $oForm->html;
}

require_once("includes/footer.php");