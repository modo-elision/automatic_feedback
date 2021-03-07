<?php
echo "<pre>sign-in";

require_once 'control/main_control.php';
$control=new Index();

if($_POST){
	$action=$_POST['submit']; 
		if ($action=='Login')
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
if($_SESSION['User_id']!=NULL)
{
	$control->redirect("http://localhost/automatic_feedback/index.php");
}
print_r($_SESSION);
echo "</pre>";
$control->signin();

?>