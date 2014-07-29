<?php 

require_once("model_user.php");
require_once("model_thread.php");

	class View {

		static public function renderThreads($aThreads){

			

			$sHTML = "";

			for($iCount=0; $iCount < count($aThreads); $iCount++) {
				$oThread = $aThreads[$iCount];

				$oUser = new User();
				$oUser->load($oThread->UserID);

				$sHTML.='<div>';
				$sHTML.='<img src="'.htmlentities($oUser->PhotoPath).'" alt="">';
				$sHTML.='<a href="thread.php?threadID='.htmlentities($oThread->ThreadID).'"><h1>&lt; '.htmlentities($oThread->ThreadName).' /&gt;</h1></a>';
				$sHTML.='<h2>&lt;by&gt; '.htmlentities($oUser->UserName).' &lt;/by&gt;</h2>';
				$sHTML.='</div>';
				
			}

		
			return $sHTML;

			
			
		}

		static public function renderThreadsNames($aThreads){

			

			$sHTML = "";

			for($iCount=0; $iCount < count($aThreads); $iCount++) {
				$oThread = $aThreads[$iCount];

				$oUser = new User();
				$oUser->load($oThread->UserID);

				$sHTML.='<div id="forDelete">';
				$sHTML.='<p>Thread Name/> '.htmlentities($oThread->ThreadName).'</p>';
				$sHTML.='<p>Thread ID/> '.htmlentities($oThread->ThreadID).'</p>';
				$sHTML.='<p>Active/> '.htmlentities($oThread->Visible).'</p>';
				$sHTML.='</div>';
				
			}

		
			return $sHTML;

			
			
		}

		static public function renderMetaTopics($aThreads){

			

			$sHTML = "";

			for($iCount=0; $iCount < count($aThreads); $iCount++) {
				$oThread = $aThreads[$iCount];


				$sHTML.=htmlentities($oThread->ThreadName).', ';
				
			}

		
			return $sHTML;

			
			
		}



		static public function renderThread($oThread){

			$oUser = new User();
			$oUser->load($oThread->UserID);



				$sHTML = "";
				$sHTML.='<img src="'.htmlentities($oUser->PhotoPath).'" alt="">';
				$sHTML.='<h1 class="post">< '.htmlentities($oThread->ThreadName).' /></h1>';
				$sHTML.='<h2 class="post">&lt;by&gt; '.htmlentities($oUser->UserName).' &lt;/by&gt;</h2>';


			$aPosts = $oThread->Posts;
			for($iCount=0; $iCount < count($aPosts); $iCount++) {
				$oPost= $aPosts[$iCount];
				$oUser = new User();
				$oUser->load($oPost->UserID);
				
				$sHTML.='<div class="post">';
				$sHTML.='<p>&lt;h1&gt; '.htmlentities($oPost->PostName).' &lt;/h1&gt;</p>';
				$sHTML.='<p>&lt;p&gt;';
				$sHTML.='<br> <span id="red">';
				$sHTML.= htmlentities($oPost->PostText);
				$sHTML.='</span> <br>';
				$sHTML.='&lt;/p&gt;</p>';
				$sHTML.='<p> &lt;date&gt; '.htmlentities($oPost->PostDate).' &lt;/date&gt;</p>';
				$sHTML.='<p>&lt;by&gt; '.htmlentities($oUser->UserName).' &lt;/by&gt;</p>';
				$sHTML.='<img src="'.htmlentities($oUser->PhotoPath).'" alt="" id="postouthor">';
				$sHTML.='</div>';
			}

			return $sHTML;

		}
	  
	}

 ?>



 