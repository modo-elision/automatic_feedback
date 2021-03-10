<?php
require_once 'control/main_control.php';
$control=new Index();
$address=$_SERVER['PHP_SELF'];
if(!empty($_POST)){
	if(!empty($_POST['Template_select'])){
		$data=$_POST;
		$_GET['app_id']=$_POST['app_id'];
		$control->update_app($data);
		//$control->redirect("index.php");
	}
}
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