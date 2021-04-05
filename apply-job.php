<?php
require_once 'control/main_control.php';
$control=new Index();
//echo "<pre>"; print_r($_SESSION); echo "</pre>";
if(!empty($_GET)){
	if(!empty($_SESSION)){
	if(($_SESSION["User_id"])){
		//echo "appply jobs";
		$control->get_job_details($_GET['job_id']);
		$control->get_cv_details($_GET['job_id']);
		$control->job_detail();
		die();
	}
	}	
}
$control->redirect("index.php");
