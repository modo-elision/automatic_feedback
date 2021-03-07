<?php
require_once 'control/main_control.php';
$control=new Index();
if($_SESSION['User_id']==NULL)
{
	$control->clear_session();
	$control->redirect("http://localhost/automatic_feedback/index.php");
}
else
{
	$control->clear_session();
	$control->redirect("http://localhost/automatic_feedback/index.php");
}
?>