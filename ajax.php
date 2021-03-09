<?php
if(!empty($_GET)){
	if($_GET['a_j']){
		$job_id=$_GET['a_j'];
		require_once 'control/main_control.php';
		$control=new Index();

		if(!empty($_SESSION)){
			if($_SESSION["User_id"]!=NULL){
				$control->apply_job($job_id);
				echo "1";
			}
			else
			{
				//$control->redirect("sign-in.php");
				echo "2";
			}
		}
		else{
			echo "0";
		}	
	}
	if($_GET['res_email']){
		$res_email=$_GET['res_email'];
		require_once 'control/main_control.php';
		$control=new Index();
		if(!empty($_SESSION)){
			if($_SESSION['type']=='admin'){
				$control->send_email_responce();
			}
		}
	}
}

?>