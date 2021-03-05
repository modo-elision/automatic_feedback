<?php
require_once(dirname(__FILE__).'\controller.php');
class Index extends Controller {
    function __construct() {
		parent::__construct();
		
	}
	
	function index() {
		//require_once(dirname(__FILE__).'\controller.php');
		require_once 'model/index_Model.php';
		$this->index_model=new Index_Model();
		$value=$this->index_model->get_all_login_records();
		//$this->allrecords = $this->index_model->get_all_records();
		require_once 'view/login.php';
		//$this->view->render('/code/index');
		
	}

	function verify_login($value)
	{
		require_once 'model/index_Model.php';
		$this->index_model=new Index_Model();
		$value_login= $this->index_model->check_login_records($value);
		if(empty($value_login)){
			echo 'EMPTY<pre>'; print_r($value_login); echo '</pre>';
		}
		else{
			echo '<pre>'; print_r($value_login); echo '</pre>';
			if($value_login[0]['password']==$value['password'])
			{
				$_SESSION['User_id']=$value_login[0]['user_id'];
				$_SESSION['type']=$value_login[0]['type'];
			}
			else {

				$_SESSION['User_id']=NULL;
				$_SESSION['type']=NULL;
			}
		}
	}
	/*function edit_submit_index(){
		
		$action=$_POST['submit']; 
		if ($action=='submit')
		{
			echo'$action';
		$arg=$_POST['id'];
		$data = array(
		'id' =>null,
		'name' =>$_POST['name'],
		'email' =>$_POST['email'],
		'contact' => $_POST['contact']
		);
		$this->model->submit_index($data);	
		}
		header('location: index');
	}*/
}

