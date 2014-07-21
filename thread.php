<?php 

require_once("includes/model_collection.php");
require_once("includes/view.php");


$iThreadID = 1;

if(isset($_GET['threadID'])){
	$iThreadID = $_GET['threadID'];
}

$oThread = new Thread();
$oThread->load($iThreadID);

$oView = new View();




require_once("includes/header.php");

echo $oView->renderThread($oThread);


require_once("includes/footer.php");