<?php 

require_once("connection.php");

	class User {

		private $iUserID;
		private $sFirstName;
		private $sLastName;
		private $sEmail;
		private $sUserName;
		private $sPassword;
		private $sPhotoPath;
		private $bExisting;

		public function __construct(){

			$this->iUserID = 0;
			$this->sFirstName = "";
			$this->sLastName = "";
			$this->sEmail = "";
			$this->sUserName = "";
			$this->sPassword = "";
			$this->sPhotoPath = "";
			$this->bExisting = false;
		}

		public function load($iID) {

			//open connection

			$oConnection = new Connection();

			//execute query

			$sSQL = "SELECT UserID, FirstName, LastName, Email, UserName, Password, PhotoPath
			FROM tbuser
			WHERE UserID=".$oConnection->escape_value($iID);

			$oResult = $oConnection->query($sSQL);

			//extract result set from query

			$aUser = $oConnection->fetch_array($oResult);

			$this->iUserID = $aUser["UserID"];
			$this->sFirstName = $aUser["FirstName"];
			$this->sLastName = $aUser["LastName"];
			$this->sEmail = $aUser["Email"];
			$this->sUserName = $aUser["UserName"];
			$this->sPassword = $aUser["Password"];
			$this->sPhotoPath = $aUser["PhotoPath"];

			//close connection

			$oConnection->close_connection();

			$this->bExisting = true;
		}

		public function save() {

			$oConnection = new Connection();

			if($this->bExisting == false){

				$sSQL = "INSERT INTO tbuser (FirstName, LastName, Email, UserName, Password, PhotoPath)
						VALUES ('".$oConnection->escape_value($this->sFirstName)."',
								'".$oConnection->escape_value($this->sLastName)."',
								'".$oConnection->escape_value($this->sEmail)."',
								'".$oConnection->escape_value($this->sUserName)."',
								'".$oConnection->escape_value($this->sPassword)."',
								'".$oConnection->escape_value($this->sPhotoPath)."')";
				
				$bResult = $oConnection->query($sSQL);

				if($bResult == true) {

					$this->iUserID = $oConnection->get_insert_id();
					$this->bExisting = true;
				} else {

					die($sSQL."fails");
				}
			} else {

				$sSQL = "UPDATE tbuser
					SET FirstName = '".$oConnection->escape_value($this->sFirstName)."',
						LastName = '".$oConnection->escape_value($this->sLastName)."',
						Email = '".$oConnection->escape_value($this->sEmail)."',
						UserName = '".$oConnection->escape_value($this->sUserName)."',
						Password = '".$oConnection->escape_value($this->sPassword)."',
						PhotoPath = '".$oConnection->escape_value($this->sPhotoPath)."'
						WHERE tbuser.UserID =" .$oConnection->escape_value($this->iUserID);

				$bResult = $oConnection->query($sSQL);

				if($bResult == false) {
					die($sSQL . "fails");
				}

			}

			$oConnection->close_connection();
		}


		public function __get($var) {

			switch($var) {
				case "UserID":
					return $this->iUserID;
					break;
				case "FirstName":
					return $this->sFirstName;
					break;
				case "LastName":
					return $this->sLastName;
					break;
				case "Email":
					return $this->sEmail;
					break;
				case "UserName":
					return $this->sUserName;
					break;
				case "Password":
					return $this->sPassword;
					break;
				case "PhotoPath":
					return $this->sPhotoPath;
					break;
				default:
					die($var . "does not exist");
			}
		}

		public function __set($var, $value) {

			switch($var) {
				case "UserID":
					return $this->iUserID = $value;
					break;
				case "FirstName":
					return $this->sFirstName = $value;
					break;
				case "LastName":
					return $this->sLastName = $value;
					break;
				case "Email":
					return $this->sEmail = $value;
					break;
				case "UserName":
					return $this->sUserName = $value;
					break;
				case "Password":
					return $this->sPassword = $value;
					break;
				case "PhotoPath":
					return $this->sPhotoPath = $value;
					break;
				default:
					die($var . "fails");
			}
		}



	}


//=======================TESTING=================

	// $User= new User();

	// $User->load(9);

	// $User->FirstName="Clark";
	// $User->LastName="Kent";
	// $User->Email="kent@super.man";
	// $User->UserName="Super_Man";
	// $User->Password="blabla";
	// $User->PhotoPath="fake/path";

	// $User->save();
	


 ?>