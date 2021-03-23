<?php


require_once 'control/main_control.php';
$control=new Index();

if($_POST){
	$action=$_POST['submit']; 
		if ($action=='Login')
		{
			
		$data = array(
		'id' =>null,
		'email' =>$_POST['email'],
		'password' => $_POST['password']
		);
		$control->verify_login($data);	
	}
	if ($action=='Update')
		{
		if($_POST['password']==$_POST['c_password']){	
			$data = array(
			'id' =>null,
			'email' =>$_POST['email'],
			'password' => $_POST['password']
			'c_password' => $_POST['c_password']
			);
			$control->update_login($data);	
		}
	}
}
if($_SESSION['User_id']!=NULL)
{
	$control->redirect("http://localhost/automatic_feedback/index.php");
}

$control->signin();

?>