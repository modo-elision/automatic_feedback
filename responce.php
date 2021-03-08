<?php
require_once 'control/main_control.php';
$control=new Index();
if(!empty($_SESSION)){
	if($_SESSION['type']=='admin'){
	if(!empty($_GET)){
		if(!empty($_GET['app_id'])){
		$control->get_app_details($_GET['app_id']);
		$control->app_detail();
		exit();
		}
	}
	}	
}
$control->redirect("index.php");