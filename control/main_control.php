<?php
require_once(dirname(__FILE__).'\controller.php');
class Index extends Controller {
    function __construct() {
		parent::__construct();
		require_once 'model/index_Model.php';
		$this->index_model=new Index_Model();
		$this->login['error']['invalid']=0;
	}
	
	
	function apply_job($job_id)
	{
		$this->apply_status=$this->index_model->get_apply_status($job_id);
		if(empty($this->apply_status))
		{
			$this->index_model->apply_job($job_id);
		}
	}
	function get_job_details($id)
	{
		$this->job_details=$this->index_model->get_job_detail($id);
		//echo "<pre>"; print_r($this->job_details); echo "</pre>";
		echo "<pre>"; print_r($_SESSION); echo "</pre>";
		$this->apply_status=$this->index_model->get_apply_status($id);
		if(!empty($this->apply_status))
		{
			//echo "<pre>"; print_r($this->apply_status); echo "</pre>";
		}
	}

	function get_app_details($id)
	{
		//$this->job_details=$this->index_model->get_job_detail($id);
		//echo "<pre>"; print_r($_SESSION); echo "</pre>";
		$this->app_details=$this->index_model->get_app_status($id);
		if(!empty($this->app_details))
		{
			echo "<pre>"; print_r($this->app_details); echo "</pre>";
		}
	}
	function get_latest_jobs()
	{
		$this->job_list=$this->index_model->get_all_job_list();
	}

	function get_applied_jobs()
	{
		$this->user_id=$this->user_id();
		$this->applied_job_list=$this->index_model->get_appled_job_list($this->user_id);
		//echo "<pre>";print_r($this->applied_job_list);echo "</pre>";
	}
	function get_all_applied_jobs()
	{
		$user_type=$this->user_type();
		if($user_type=="admin"){
			$this->applied_job_list=$this->index_model->get_all_appled_job_list();
		}
		//echo "<pre>";print_r($this->applied_job_list);echo "</pre>";
	}
	function clear_session()
	{
		$_SESSION['User_id']=NULL;
		$_SESSION['type']=NULL;
	}
	function verify_login($value)
	{
		$value_login= $this->index_model->check_login_records($value);
		if(empty($value_login)){
			$this->login['error']['invalid']=1;
		}
		else{
			echo '<pre>'; print_r($value_login); echo '</pre>';
			if($value_login[0]['password']==$value['password'])
			{
				$_SESSION['User_id']=$value_login[0]['user_id'];
				$_SESSION['type']=$value_login[0]['type'];
				$this->login['error']['invalid']=0;
			}
			else {
				$_SESSION['User_id']=NULL;
				$_SESSION['type']=NULL;
				$this->login['error']['invalid']=1;
			}
		}
	}

	function redirect($url, $permanent = false)
	{
	    header('Location: ' . $url, true, $permanent ? 301 : 302);
	    exit();
	}
	
}

