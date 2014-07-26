<?php 

require_once("includes/header.php");
require_once("includes/model_collection.php");
require_once("includes/view.php");


$aThreads = Collection::grabAllThreadsByUserID($_SESSION["UserID"]);

if (sizeof($aThreads)!=1){
	echo View::renderThreads($aThreads);
}else{
	echo"<p>You dont have any threads</p>";
}






require_once("includes/footer.php");


 ?>