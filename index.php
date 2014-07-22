<?php 

require_once("includes/model_collection.php");
require_once("includes/view.php");

session_start();


$oCollection = new Collection();
$aThreads = $oCollection->grabAllThreads();

$oView = new View();

require_once("includes/header.php");

echo $oView->renderThreads($aThreads);

require_once("includes/footer.php");

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>