<?php
//echo "<pre>sign-in";

require_once 'control/main_control.php';
$control=new Index();
$error=NULL;
if($_SESSION['User_id']!=NULL)
{
	$control->redirect("http://localhost/automatic_feedback/index.php");
}
if($_POST){
	$action=$_POST['submit']; 
		if ($action=='Signup')
		{
			//echo'$action';
			if((!empty($_POST['password']))&(!empty($_POST['email']))&(!empty($_POST['name'])))
			if($_POST['password']==$_POST['c_password']){
				$data = array(
				'id' =>null,
				'email' =>$_POST['email'],
				'full_name' =>$_POST['name'],
				'password' => $_POST['password']
				);
				$responce=$control->add_user_acc($data);
				if($responce=="done"){
					//$control->redirect("http://localhost/automatic_feedback/index.php");
				}
				else{
					$error="2";
				}
			}
			else{
				$error="1";
			}
	}
}

//print_r($error);
//echo "</pre>";
$control->signup();

?>