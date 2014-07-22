<?php
	
	require_once("includes/header.php"); 
	require_once("includes/form_view.php"); 
	require_once("includes/model_collection.php");
	require_once("includes/model_user.php");

	session_start();

		if(isset($_SESSION["UserID"])) {

			$oUser = new User();
			$oUser->load($_SESSION["UserID"]);

			echo "<p>Hi ".$oUser->FirstName.", you are already logged in. You must log out before you can log in another account</p>";

		} else {
			$oForm = new Form();

			if(isset($_POST["Submit"])) { 

				$oForm->data = $_POST; 

				$oForm->checkRequired("UserName"); 
				$oForm->checkRequired("Password"); 

				if($oForm->isValid == true) { 

					$oCollection = new Collection();
					$sUserUsername = $_POST["UserName"]; 
					$oUser = $oCollection->findUserByUserName($sUserUsername); 


					if($oUser == false) { 

						$oForm->makeErrorMessage("UserName","X");

					} elseif($_POST["Password"] !== $oUser->Password) { 

							$oForm->makeErrorMessage("Password","X"); 

					} else {

						header("Location:index.php"); 
						exit;
					}
				}

			}

			$oForm->makeInputText("User Name", "UserName");
			$oForm->makeInputPassword("Password","Password");
			$oForm->makeSubmitButton("Login", "Submit");

			echo $oForm->html;

		}

	require_once("includes/footer.php");

?>