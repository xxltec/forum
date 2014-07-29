<?php 

require_once("includes/model_collection.php");
require_once("includes/view.php");

$sPageTitle="Home";





$aThreads = Collection::grabAllThreads();


require_once("includes/header.php");

echo View::renderThreads($aThreads);

if(isset($_SESSION["UserID"])){
					
	echo '<a href="add_thread.php" class="nav" id="addThread">&lt; ? Add a Thread ? &gt;</a>';
					
}

require_once("includes/footer.php");

?>

