<?php 

require_once("connection.php");
require_once("model_thread.php");
require_once("model_user.php");


	class Collection {

		static public function grabAllThreads() {

			$aThreads = "";

			$oConnection = new Connection();

			$sSQL = "SELECT ThreadID FROM tbthread";
			$oResult = $oConnection->query($sSQL);

			while($aRow = $oConnection->fetch_array($oResult)) {
				$oThread = new Thread();
				$oThread->load($aRow["ThreadID"]);
				$aThreads[]=$oThread;
			}

			$oConnection->close_connection();

			return $aThreads;
		}

		static public function grabAllThreadsByUserID($iUserID) {

			$aThreads = "";

			$oConnection = new Connection();

			$sSQL = "SELECT ThreadID FROM tbthread WHERE UserID = '".$oConnection->escape_value($iUserID)."'";
			$oResult = $oConnection->query($sSQL);

			while($aRow = $oConnection->fetch_array($oResult)) {
				$oThread = new Thread();
				$oThread->load($aRow["ThreadID"]);
				$aThreads[]=$oThread;
			}

			$oConnection->close_connection();

			return $aThreads;
		}


		static public function findUserByUserName($sUserName) {

			$oConnection = new Connection();

			$sSQL = "SELECT UserID
					FROM tbuser
					WHERE UserName = '".$oConnection->escape_value($sUserName)."'";

			$oResult = $oConnection->query($sSQL);
			$aUser = $oConnection->fetch_array($oResult);
			$oConnection->close_connection();

			if($aUser != false) {

				$oUser = new User();
				$oUser->load($aUser["UserID"]);
				return $oUser;
			} else {

				return false;
			}
		}
	}

	//======================TESTING=====================

	// $Collection = new Collection();
	// $Threads = $Collection->grabAllThreadsByUserID(1);
	// // $User=$Collection->findUserByUserName("Gates");

	// echo "<pre>";
	// print_r($Threads);
	// echo "</ pre>";

 ?>