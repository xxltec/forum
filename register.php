<?php 
require_once("includes/header.php");
require_once("includes/form_view.php");
require_once("includes/model_user.php");
require_once("includes/model_collection.php");
require_once("includes/model_post.php");

session_start();


$oForm = new Form();


	if(isset($_POST["Submit"])) {

		$oForm->data = $_POST;
		$oForm->files = $_FILES;

		$oForm->checkRequired("FirstName");
		$oForm->checkRequired("LastName");
		$oForm->checkRequired("Email");
		$oForm->checkRequired("UserName");
		$oForm->checkRequired("Password");
		$oForm->checkUpload("ProfilePicture","image/jpeg", 10000000);
		$oForm->checkMatch("Password","ConfirmPassword");
		

		if($oForm->isValid == true) {

			$oCollection = new Collection();
			$oUser = $oCollection->findUserByUserName($_POST["UserName"]);

			if($oUser != false) {
				$oForm->makeErrorMessage("UserName","X");
			}

			if($oForm->isValid == true) {

				$sPhotoName = "assets/pics/users/".date('Y-m-d H-i-s').".jpg";
				$oForm->moveFile("ProfilePicture", $sPhotoName);

				$oUser = new User();

				$oUser->FirstName = $_POST["FirstName"];
				$oUser->LastName = $_POST["LastName"];
				$oUser->Email = $_POST["Email"];
				$oUser->UserName = $_POST["UserName"];
				$oUser->Password = $_POST["Password"];
				$oUser->PhotoPath = $sPhotoName;

				$oUser->save();

				header("Location: index.php");
				exit;
			}
		}
	}

	$oForm->makeInputText("First Name*","FirstName");
	$oForm->makeInputText("Last Name*","LastName");
	$oForm->makeInputText("Email*","Email");
	$oForm->makeInputText("User Name*","UserName");
	$oForm->makeInputPassword("Password*","Password");
	$oForm->makeInputPassword("=> Password*","ConfirmPassword");
	$oForm->makeUploadBox("Profile Picture*","ProfilePicture");
	$oForm->makeSubmitButton("Submit","Submit");

	echo $oForm->html;







require_once("includes/footer.php");
?>

<!-- <form action="">
	
	<span class="errorMessage">X</span>
	<label for="FirstName">First Name/></label>
	<input type="text" name="FirstName" id="FirstName">

	<span class="errorMessage">X</span>
	<label for="LastName">Last Name/></label>
	<input type="text" name="LastName" id="LastName">

	<span class="errorMessage">X</span>
	<label for="Email">Email/></label>
	<input type="text" name="Email" id="Email">
	
	<span class="errorMessage">X</span>
	<label for="UserName">User Name/></label>
	<input type="text" name="UserName" id="UserName">
	
	<span class="errorMessage">X</span>
	<label for="Password">Password/></label>
	<input type="password" name="Password" id="Password">
	
	<span class="errorMessage">X</span>
	<label for="ConirmPassword">Confirm Password/></label>
	<input type="password" name="ConirmPassword" id="ConirmPassword">
	
	<span class="errorMessage">X</span>
	<label for="ProfilePicture">Profile Picture/></label>
	<input type="file" name="ProfilePicture" id="ProfilePicture">

	<input type="Submit" name="Submit" id="Submit">

</form> -->