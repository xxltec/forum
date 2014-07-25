<?php 

require_once("connection.php");
require_once("model_post.php");

	class Thread {

		private $iThreadID;
		private $sThreadName;
		private $iUserID;
		private $iVisible;
		private $bExisting;
		private $aPosts;

		public function __construct(){

			$this->iThreadID = 0;
			$this->sThreadName = "";
			$this->iUserID = 0;
			$this->iVisible = 0;
			$this->bExisting = false;

			$this->aPosts = array();
		}

		public function load($iID) {

			//open connection

			$oConnection = new Connection();

			//execute query

			$sSQL = "SELECT ThreadID, ThreadName, UserID, Visible
			FROM tbthread
			WHERE ThreadID=".$oConnection->escape_value($iID) ;


			$oResult = $oConnection->query($sSQL);

			//extract result set from query

			$aThread = $oConnection->fetch_array($oResult);

			$this->iThreadID = $aThread["ThreadID"];
			$this->sThreadName = $aThread["ThreadName"];
			$this->iUserID = $aThread["UserID"];
			$this->iVisible = $aThread["Visible"];


			$sSQL ="SELECT PostID 
					FROM tbpost 
					WHERE ThreadID= '".$oConnection->escape_value($iID)."'";
			
			$oResult = $oConnection->query($sSQL);

			while($aRow = $oConnection->fetch_array($oResult)) {
				$oPost = new Post();
				$oPost->load($aRow["PostID"]);
				$this->aPosts[]=$oPost;
			}	
			//close connection

			$oConnection->close_connection();

			$this->bExisting = true;
		}

		public function save() {

			$oConnection = new Connection();

			if($this->bExisting == false){

				$sSQL = "INSERT INTO tbthread (ThreadName, UserID, Visible)
						VALUES ('".$oConnection->escape_value($this->sThreadName)."',
								'".$oConnection->escape_value($this->iUserID)."',
								'".$oConnection->escape_value($this->iVisible)."')";
			
				$bResult = $oConnection->query($sSQL);

				if($bResult == true) {

					$this->iThreadID = $oConnection->get_insert_id();
					$this->bExisting = true;
				} else {

					die($sSQL."fails");
				}
			} else {

				$sSQL = "UPDATE tbthread
					SET ThreadName = '".$oConnection->escape_value($this->sThreadName)."',
						UserID = '".$oConnection->escape_value($this->iUserID)."',
						Visible = '".$oConnection->escape_value($this->iVisible)."'
						WHERE tbthread.ThreadID=" .$oConnection->escape_value($this->iThreadID);

				$bResult = $oConnection->query($sSQL);

				if($bResult == false) {
					die($sSQL . "fails");
				}
			}

			$oConnection->close_connection();
		}

		public function __get($var) {

			switch($var) {
				case "ThreadID":
					return $this->iThreadID;
					break;
				case "ThreadName":
					return $this->sThreadName;
					break;
				case "UserID":
					return $this->iUserID;
					break;
				case "Visible":
					return $this->iVisible;
					break;
				case "Posts":
					return $this->aPosts;
					break;
				default:
					die($var . "does not exist");
			}
		}

		public function __set($var, $value) {

			switch($var) {
				case "ThreadID":
					return $this->iThreadID = $value;
					break;
				case "ThreadName":
					return $this->sThreadName = $value;
					break;
				case "UserID":
					return $this->iUserID = $value;
					break;
				case "Visible":
					return $this->iVisible = $value;
					break;
				case "Posts":
					return $this->aPosts = $value;
					break;
				default:
					die($var . "fails");
			}
		}
	}

	//=====================TESTING===================

	// $Thread = new Thread();

	// $Thread->load(2);

	// $Thread->ThreadName="Final Test";
	// $Thread->UserID=7;

	// $Thread->save();

	// echo"<pre>";
	// print_r($Thread);
	// echo"</ pre>";

 ?>