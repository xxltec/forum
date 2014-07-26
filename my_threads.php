<?php 

require_once("includes/header.php");
require_once("includes/model_collection.php");
require_once("includes/view.php");

if (isset($_SESSION["UserID"])){
$aThreads = Collection::grabAllThreadsByUserID($_SESSION["UserID"]);

if (empty($aThreads)){
	echo"<p>You dont have any threads</p>";
}else{
	echo View::renderThreads($aThreads);
}

}else{

	echo "<p>You need to be loged in to use this page!!!</p>";
}



require_once("includes/footer.php");


 ?>