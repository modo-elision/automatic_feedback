<?php
echo "INDEX";
require_once 'control/main_control.php';
$control=new Index();
if($_POST){
	$action=$_POST['submit']; 
		if ($action=='submit_login')
		{
			echo'$action';
		$data = array(
		'id' =>null,
		'email' =>$_POST['email'],
		'password' => $_POST['password']
		);
		$control->verify_login($data);	
	}
}

/*$data = array(
		'email' =>"syedatifhashmi@gmail.com",
		);
$control->verify_login($data);*/
$control->index();


