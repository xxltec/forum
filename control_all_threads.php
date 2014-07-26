<?php 

require_once("includes/header.php");
require_once("includes/model_collection.php");
require_once("includes/view.php");
require_once("includes/form_view.php");


if(isset($_SESSION["UserID"])){

	$oUser = new User();
	$oUser->load($_SESSION["UserID"]);

	if($oUser->UserName=="xxl"){

		$aThreads = Collection::grabAllThreads();

		if (sizeof($aThreads)>=1){
			echo View::renderThreadsNames($aThreads);

			$oForm = new Form();

	if(isset($_POST["Submit"])) {


		$oForm->data = $_POST;

		$oForm->checkRequired("ThreadID");
		

		if($oForm->isValid) {


			$oThread = new Thread();
			$oThread->load ($_POST["ThreadID"]);
			$oThread->Visible = "No";


			$oThread->save();

			header("Location: control_all_threads.php");
			exit;

		}


	}

	$oForm->makeInputText("Thread ID","ThreadID");

	$oForm->makeSubmitButton("Make Inactive","Submit");


	echo $oForm->html;

}else{
	echo"<p>There is no threads on your forum</p>";
}

	}else{

		echo"<p>You are not welcome here, please leave!!!</p>";
	}

} else {

	echo"<p>You are not welcome here, please leave!!!</p>";
}

require_once("includes/header.php");


 ?>