<?php 

class Form {

	private $sHTML;
	private $aData;
	private $aErrors;
	private $aFiles;

	public function __construct() {

		$this->sHTML = '<form action="" method="post" enctype="multipart/form-data">';
		$this->aData = array();
		$this->aErrors = array();
		$this->aFiles = array();
	}

	public function makeInputText($sLabelText,$sControlName) {

		$sData = "";
		if(isset($this->aData[$sControlName])) {
			$sData = $this->aData[$sControlName];
		}

		$sErrors = "";
		if(isset($this->aErrors[$sControlName])) {
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .='<span class="errorMessage">'.$sErrors.'</span>';
		$this->sHTML .='<label for="'.$sControlName.'">'.$sLabelText.'/></label>';
		$this->sHTML .='<input type="text" name="'.$sControlName.'" id="'.$sControlName.'" value="'.$sData.'" onblur="checkForCorrect'.$sControlName.'(this.id)">';


	}

	public function makeInputPassword($sLabelText,$sControlName) {

		$sData = "";
		if(isset($this->aData[$sControlName])) {
			$sData = $this->aData[$sControlName];
		}

		$sErrors = "";
		if(isset($this->aErrors[$sControlName])) {
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .='<span class="errorMessage">'.$sErrors.'</span>';
		$this->sHTML .='<label for="'.$sControlName.'">'.$sLabelText.'/></label>';
		$this->sHTML .='<input type="password" name="'.$sControlName.'" id="'.$sControlName.'" value="'.$sData.'" onblur="checkForCorrect'.$sControlName.'(this.id)">';


	}

	public 	function makeSelect($sControlName,$sLabelText,$aOptions){

		$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabelText.'</label>';
        $this->sHTML .= '<select name="'.$sControlName.'" id="'.$sControlName.'">';
        
        foreach($aOptions as $key=>$value){

        	
				$this->sHTML .= '<option value="'.$key.'">'.$value.'</option>';
        	}

   
		}
	

	public function makeUploadBox($sLabelText,$sControlName) {

		$sData = "";
		if(isset($this->aData[$sControlName])) {
			$sData = $this->aData[$sControlName];
		}

		$sErrors = "";
		if(isset($this->aErrors[$sControlName])) {
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .='<span class="errorMessage">'.$sErrors.'</span>';
		$this->sHTML .='<label for="'.$sControlName.'">'.$sLabelText.'/></label>';
		$this->sHTML .='<input type="file" name="'.$sControlName.'" id="'.$sControlName.'" value="'.$sData.'">';


	}

	public function makeHiddenField($sControlName, $sValue) {

			$this->sHTML .= '<input type="hidden" name="'.$sControlName.'" value="'.$sValue.'"/>';
	}

	public function makeSubmitButton($sValue, $sControlName) {

		$this->sHTML .='<input type="'.$sControlName.'" name="'.$sControlName.'" id="'.$sControlName.'" value="'.$sValue.'">';
	}

	public function checkRequired($sControlName) {

			$sData = "";
			if(isset($this->aData[$sControlName])) {
				$sData = $this->aData[$sControlName];
			}

			if(trim($sData)=="") {
				$this->aErrors[$sControlName] = "X";
			}

	}

	public function checkUpload($sControlName, $sMimeType, $iSize) {

			$sErrorMessage = "";

			if(empty($this->aFiles[$sControlName]["name"])) {

				$sErrorMessage = "X";

			}  elseif($this->aFiles[$sControlName]['error'] != UPLOAD_ERR_OK) {

				$sErrorMessage = "X";

			} elseif($this->aFiles[$sControlName]["type"] != $sMimeType) {

				$sErrorMessage = "Only " . $sMimeType . " format can be uploaded";

			} elseif($this->aFiles[$sControlName]["size"] > $iSize) {

				$sErrorMessage = "Files canot exceed " . $iSize . " bytes in size";

			} 

			if($sErrorMessage != "") {

				$this->aErrors[$sControlName] = $sErrorMessage;

			}

	}

	public function moveFile($sControlName, $sNewFileName){
		
			$newname = dirname(__FILE__).'/../'.$sNewFileName;
			
			move_uploaded_file($this->aFiles[$sControlName]['tmp_name'],$newname);
			
	}

	public function checkMatch($sControlName1, $sControlName2) { //checks if the password and confirm password match or not

			$sData1 = "";
			if(isset($this->aData[$sControlName1])) {
				$sData1 = $this->aData[$sControlName1];
			}

			$sData2 = "";
			if(isset($this->aData[$sControlName2])) {
				$sData2 = $this->aData[$sControlName2];
			}

			if($sData1 !== $sData2) {
				$this->aErrors[$sControlName2] = "X"; //if doesn't match, then place this error message into the aError array so that a new customer cannot be saved
			} 

	}

	public function makeErrorMessage($sControlName, $sMessage){

			$this->aErrors[$sControlName] = $sMessage;

	}

	public function __get($var) {

			switch($var) {
				case "html":
					return $this->sHTML."</form>";
					break;
				case "isValid":
					if((count($this->aErrors))==0) {
						return true;
					} else {
						return false;
					};
					break;
				default:
					die($var . "does not exist");
			}


	}

	public function __set($var, $value) {

			switch($var) {
				case "data":
					$this->aData = $value;
					break;
				case "files":
					$this->aFiles = $value;
					break;
				default:
					die($var . "fails");
			}

	}
}

 ?>

  <script type="text/javascript" src="assets/javascript.js"></script>