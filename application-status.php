<?php
echo "appplication status";
require_once 'control/main_control.php';
$control=new Index();
print_r($_SESSION);
if(!empty($_SESSION)){
	if($_SESSION['User_id']==NULL)
	{
		$control->redirect("http://localhost/automatic_feedback/sign-in.php");
	}
	if($_SESSION['User_id']!=NULL)
	{
		if($_SESSION['type']=="admin"){
			$type="admin";
			$control->get_all_applied_jobs();
			$control->application_list_admin();
		}
		else{
			$control->get_applied_jobs();
			$control->application_list();
		}
	}
}
else{
	$control->redirect("http://localhost/automatic_feedback/sign-in.php");
}