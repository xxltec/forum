<?php 

require_once("connection.php");

	class Post {

		private $iPostID;
		private $sPostName;
		private $sPostText;
		private $iThreadID;
		private $iUserID;
		private $sPostDate;
		private $bExisting;

		public function __construct() {

			$this->iPostID = 0;
			$this->sPostName = "";
			$this->sPostText = "";
			$this->iThreadID = 0;
			$this->iUserID = 0;
			$this->sPostDate = "";
			$this->bExisting = false;
		}

		public function load($iID) {

			//open connection

			$oConnection = new Connection();

			//execute query

			$sSQL = "SELECT PostID, PostName, PostText, ThreadID, UserID, PostDate
					FROM tbpost
					WHERE PostID=".$oConnection->escape_value($iID);

					$oResult = $oConnection->query($sSQL);

					//extract result from query

					$aPost = $oConnection->fetch_array($oResult);

					$this->iPostID = $aPost["PostID"];
					$this->sPostName = $aPost["PostName"];
					$this->sPostText = $aPost["PostText"];
					$this->iThreadID = $aPost["ThreadID"];
					$this->iUserID = $aPost["UserID"];
					$this->sPostDate = $aPost["PostDate"];

					//close connection

					$oConnection->close_connection();

					$this->bExisting = true;
		}

		public function save() {

			$oConnection = new Connection();

			if($this->bExisting == false) {

				$sSQL = "INSERT INTO tbpost (PostName, PostText, ThreadID, UserID)
						VALUES ('".$oConnection->escape_value($this->sPostName)."',
								'".$oConnection->escape_value($this->sPostText)."',
								'".$oConnection->escape_value($this->iThreadID)."',
								'".$oConnection->escape_value($this->iUserID)."')";
	
				$bResult = $oConnection->query($sSQL);

				if($bResult == true) {

					$this->iPostID = $oConnection->get_insert_id();
					$this->bExisting = true;
				} else {

					die($sSQL."fails");
				}
			} else {

				$sSQL = "UPDATE tbpost
						SET PostName = '".$oConnection->escape_value($this->sPostName)."',
							PostText = '".$oConnection->escape_value($this->sPostText)."',
							ThreadID = '".$oConnection->escape_value($this->iThreadID)."',
							UserID = '".$oConnection->escape_value($this->iUserID)."'
							WHERE tbpost.PostID=" .$oConnection->escape_value($this->iPostID);

				$bResult = $oConnection->query($sSQL);

				if($bResult == false) {
					die($sSQL . "fails");
				}
			}

			$oConnection->close_connection();
		}

		public function __get($var) {

			switch($var) {
				case "PostID":
					return $this->iPostID;
					break;
				case "PostName":
					return $this->sPostName;
					break;
				case "PostText":
					return $this->sPostText;
					break;
				case "ThreadID":
					return $this->iThreadID;
					break;
				case "UserID":
					return $this->iUserID;
					break;
				case "PostDate":
					return $this->sPostDate;
					break;
				default:
					die($var . "does not exist");
			}
		}

		public function __set($var, $value) {

			switch($var) {
				case "PostID":
					return $this->iPostID = $value;
					break;
				case "PostName":
					return $this->sPostName = $value;
					break;
				case "PostText":
					return $this->sPostText = $value;
					break;
				case "ThreadID":
					return $this->iThreadID = $value;
					break;
				case "UserID":
					return $this->iUserID = $value;
					break;
				default:
					die($var . "fails");
			}
		}
	}

	//==================TESTING===================

	// $Post = new Post();

	// $Post->load(5);

	// $Post->PostName="Bla";
	// $Post->PostText="dfhjghjghjgjh";
	// $Post->ThreadID=5;
	// $Post->UserID=6;

	// $Post->save();

	// echo "<pre>";
	// print_r($Post);
	// echo "</ pre>";
 ?>