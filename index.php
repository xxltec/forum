<?php 

require_once("includes/model_collection.php");
require_once("includes/view.php");




$oCollection = new Collection();
$aThreads = $oCollection->grabAllThreads();

$oView = new View();

require_once("includes/header.php");

echo $oView->renderThreads($aThreads);

if(isset($_SESSION["UserID"])){
					
	echo '<a href="add_thread.php" class="nav" id="addThread">< ? Add a Thread ? ></a>';
					
}

require_once("includes/footer.php");

?>