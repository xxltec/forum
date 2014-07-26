<?php 
include_once("includes/header.php");
require_once("includes/model_collection.php");
require_once("includes/view.php");
require_once("includes/form_view.php");
require_once("includes/model_thread.php");


$aThreads = Collection::grabAllThreadsByUserID($_SESSION["UserID"]);

if (sizeof($aThreads)!=1){
echo View::renderThreadsNames($aThreads);

$oForm = new Form();

	if(isset($_POST["Submit"])) {


		$oForm->data = $_POST;

		$oForm->checkRequired("ThreadID");
		

		if($oForm->isValid) {


			$oThread = new Thread();
			$oThread->load ($_POST["ThreadID"]);
			$oThread->Visible = ($_POST["Active"]);


			$oThread->save();

			header("Location: my_thread_names.php");
			exit;

		}


	}

	$oForm->makeInputText("Thread ID","ThreadID");
	$aYesNo= array();
	$aYesNo["Yes"]="Yes";
	$aYesNo["No"]="No";


	
	$oForm->makeSelect("Active","Active/>",$aYesNo);
	$oForm->makeSubmitButton("Make Active/Inactive","Submit");


	echo $oForm->html;

}else{
	echo"<p>You dont have any threads</p>";
}
 
include_once("includes/footer.php");

?>