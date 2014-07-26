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
				$sHTML.='<img src="'.$oUser->PhotoPath.'" alt="">';
				$sHTML.='<a href="thread.php?threadID='.$oThread->ThreadID.'"><h1>< '.$oThread->ThreadName.' /></h1></a>';
				$sHTML.='<h2>&lt;by&gt; '.$oUser->UserName.' &lt;/by&gt;</h2>';
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
				$sHTML.='<p>Thread Name/> '.$oThread->ThreadName.'</p>';
				$sHTML.='<p>Thread ID/> '.$oThread->ThreadID.'</p>';
				$sHTML.='<p>Active/> '.$oThread->Visible.'</p>';
				$sHTML.='</div>';
				
			}

		
			return $sHTML;

			
			
		}

		static public function renderThread($oThread){

			$oUser = new User();
			$oUser->load($oThread->UserID);



				$sHTML = "";
				$sHTML.='<img src="'.$oUser->PhotoPath.'" alt="">';
				$sHTML.='<h1 class="post">< '.$oThread->ThreadName.' /></h1>';
				$sHTML.='<h2 class="post">&lt;by&gt; '.$oUser->UserName.' &lt;/by&gt;</h2>';


			$aPosts = $oThread->Posts;
			for($iCount=0; $iCount < count($aPosts); $iCount++) {
				$oPost= $aPosts[$iCount];
				$oUser = new User();
				$oUser->load($oPost->UserID);
				
				$sHTML.='<div class="post">';
				$sHTML.='<p>&lt;h1&gt; '.$oPost->PostName.' &lt;/h1&gt;</p>';
				$sHTML.='<p>&lt;p&gt;';
				$sHTML.='<br> <span id="red">';
				$sHTML.= $oPost->PostText;
				$sHTML.='</span> <br>';
				$sHTML.='&lt;/p&gt;</p>';
				$sHTML.='<p> &lt;date&gt; '.$oPost->PostDate.' &lt;/date&gt;</p>';
				$sHTML.='<p>&lt;by&gt; '.$oUser->UserName.' &lt;/by&gt;</p>';
				$sHTML.='<img src="'.$oUser->PhotoPath.'" alt="" id="postouthor">';
				$sHTML.='</div>';
			}

			return $sHTML;

		}
	  
	}

 ?>

 <a href=""></a>

 