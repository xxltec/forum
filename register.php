<?php 
require_once("includes/header.php");
?>

<form action="">
	
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

</form>




<?php 
require_once("includes/footer.php");
?>