function checkForBlank (sElementId) {

	var bValid = false;
	var aElementId = document.getElementById(sElementId);

	if(aElementId.value==""){
		aElementId.previousElementSibling.style.color="#FF0040";
		aElementId.style.borderColor="#FF0040";
		aElementId.placeholder="Compulsory!!!";

	}

	else {

		aElementId.previousElementSibling.style.color="#01DF01";
		aElementId.style.borderColor="#01DF01";
		aElementId.placeholder="";
		bValid = true;

		
	}

	return bValid;
	
}



function checkForCorrectFirstName (sElementId) {


	var bFilled = checkForBlank(sElementId);

	if(bFilled == true){

		var aElementId = document.getElementById(sElementId);
		var sInputValue = aElementId.value;
		var oRegExp=new RegExp("[^a-zA-Z]");

		if(oRegExp.test(sInputValue)!=false){
			aElementId.previousElementSibling.style.color="#FF0040";
			aElementId.previousElementSibling.innerHTML="Invalid First Name!";
			aElementId.style.borderColor="#FF0040";

		}

		else {

			aElementId.previousElementSibling.style.color="#01DF01";
			aElementId.previousElementSibling.innerHTML="First Name:";
			aElementId.style.borderColor="#01DF01";

			
		}

	}
}

function checkForCorrectLastName (sElementId) {


	var bFilled = checkForBlank(sElementId);

	if(bFilled == true){

		var aElementId = document.getElementById(sElementId);
		var sInputValue = aElementId.value;
		var oRegExp=new RegExp("[^a-zA-Z]");

		if(oRegExp.test(sInputValue)!=false){
			aElementId.previousElementSibling.style.color="#FF0040";
			aElementId.previousElementSibling.innerHTML="Invalid Last Name!";
			aElementId.style.borderColor="#FF0040";

		}

		else {

			aElementId.previousElementSibling.style.color="#01DF01";
			aElementId.previousElementSibling.innerHTML="Last Name:";
			aElementId.style.borderColor="#01DF01";

			
		}

	}
}

function checkForCorrectEmail (sElementId) {


	var bFilled = checkForBlank(sElementId);

	if(bFilled == true){

		var aElementId = document.getElementById(sElementId);
		var sInputValue = aElementId.value;
		var oRegExp=new RegExp("[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}");

		if(oRegExp.test(sInputValue)==false){
			aElementId.previousElementSibling.style.color="#FF0040";
			aElementId.previousElementSibling.innerHTML="Invalid Email!";
			aElementId.style.borderColor="#FF0040";

		}

		else {

			aElementId.previousElementSibling.style.color="#01DF01";
			aElementId.previousElementSibling.innerHTML="Email:";
			aElementId.style.borderColor="#01DF01";

			
		}

	}
}

function checkForCorrectUserName (sElementId) {


	var bFilled = checkForBlank(sElementId);

	if(bFilled == true){

		var aElementId = document.getElementById(sElementId);
		var sInputValue = aElementId.value;
		var oRegExp=new RegExp("^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$");

		if(oRegExp.test(sInputValue)==false){
			aElementId.previousElementSibling.style.color="#FF0040";
			aElementId.previousElementSibling.innerHTML="Invalid User Name!";
			aElementId.style.borderColor="#FF0040";

		}

		else {

			aElementId.previousElementSibling.style.color="#01DF01";
			aElementId.previousElementSibling.innerHTML="User Name:";
			aElementId.style.borderColor="#01DF01";

			
		}

	}
}

function checkForCorrectPassword (sElementId) {


	var bFilled = checkForBlank(sElementId);

	if(bFilled == true){

		var aElementId = document.getElementById(sElementId);
		var sInputValue = aElementId.value;
		var oRegExp=new RegExp("^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$");

		if(oRegExp.test(sInputValue)==false){
			aElementId.previousElementSibling.style.color="#FF0040";
			aElementId.previousElementSibling.innerHTML="Invalid Password!";
			aElementId.style.borderColor="#FF0040";

		}

		else {

			aElementId.previousElementSibling.style.color="#01DF01";
			aElementId.previousElementSibling.innerHTML="Password:";
			aElementId.style.borderColor="#01DF01";

			
		}

	}
}
