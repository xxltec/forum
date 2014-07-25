<?php 

require_once("includes/header.php");
require_once("includes/model_collection.php");
require_once("includes/view.php");


$aThreads = Collection::grabAllThreadsByUserID($_SESSION["UserID"]);

echo View::renderThreads($aThreads);







require_once("includes/footer.php");


 ?>