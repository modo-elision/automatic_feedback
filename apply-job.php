<?php
require_once 'control/main_control.php';
$control=new Index();
if(!empty($_GET)){
	echo "appply jobs";
	$control->get_job_details($_GET['job_id']);
	$control->job_detail();
}
else
{
	$control->redirect("index.php");
}