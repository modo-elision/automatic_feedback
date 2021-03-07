<?php
echo "appplication status";
require_once 'control/main_control.php';
$control=new Index();
if($_SESSION['User_id']==NULL)
{
	$control->redirect("http://localhost/automatic_feedback/sign-in.php");
}

$control->get_applied_jobs();
$control->application_list();
