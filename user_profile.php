<?php 

require_once("includes/header.php");
require_once("includes/model_user.php");


$oUser = new User();
$oUser->load($_SESSION["UserID"]);


echo "<p>First Name:".$oUser->FirstName."</p>";
echo "<p>Last Name:".$oUser->LastName."</p>";
echo "<p>Email:".$oUser->Email."</p>";
echo "<p>User Name:".$oUser->UserName."</p>";

require_once("includes/footer.php");


 ?> 