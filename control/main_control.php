<?php
require_once(dirname(__FILE__).'\controller.php');
class Index extends Controller {
    function __construct() {
		parent::__construct();
		require_once 'model/index_Model.php';
		$this->index_model=new Index_Model();
		$this->login['error']['invalid']=0;
		if(empty($_SESSION)){
			$this->clear_session();
		}
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
			//echo "<pre>"; print_r($this->app_details); echo "</pre>";
			return $this->app_details;
		}
	}
	function get_latest_jobs()
	{
		$this->job_list=$this->index_model->get_all_job_list();
		echo "<pre>";print_r($this->job_list);echo "</pre>";
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
	function verify_email($value)
	{
		$value_login= $this->index_model->check_login_records($value);
		if(empty($value_login)){
			return "no-email";
		}
		else{
			return "email-exist";
		}
	}
	function add_user_acc($value){
		$responce=$this->verify_email($value);
		if($responce=="no-email"){

			$this->index_model->add_acc($value);
			$this->verify_login($value);
			return "done";
		}
		return "error";
		
	}
	function verify_login($value)
	{
		$value_login= $this->index_model->check_login_records($value);
		if(empty($value_login)){
			$this->login['error']['invalid']=2;
		}
		else{
			//echo '<pre>'; print_r($value_login); echo '</pre>';
			if($value_login[0]['password']==md5($value['password']))
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
	function requireToVar($file,$username,$companyname,$jobname,$template,$free_comment){
	    ob_start();
	    require($file);
	    return ob_get_clean();
	}
	function send_mail($todata)
	{
		$comp_app_data=$this->get_app_details($todata['app_id']);

		$username=$comp_app_data['0']['user_details']['full_name'];
		$companyname=$comp_app_data['0']['job_details']['company_name'];
		$jobname=$comp_app_data['0']['job_details']['title'];
		//$template="reject";
		//$template="next_round";
		$template=$comp_app_data['0']['responce'];
		$free_comment=$comp_app_data['0']['comments'];
		$email_temp=$this->requireToVar('view/email-templates.html',$username,$companyname,$jobname,$template,$free_comment);
		$to_email_address="snaroju545@gmail.com";//$comp_app_data['0']['user_details']['email'];
		$to_name="Shravan";//$comp_app_data['0']['user_details']['full_name'];
		$message=$email_temp;
		//$headers = 'From: noreply @ happytech . com';
		//echo $email_temp;
		$this->php_gmail_mailer($to_email_address,$to_name,$message);
		//mail($to_email_address,$subject,$message,$header);
		//$this->redirect("http://localhost/automatic_feedback/index.php");
	}
	function update_login($value)
	{
		//$data
		$value_login= $this->index_model->check_login_records($value);
		$id['email_id']=$value['email_id'];
	}
	function update_app($data)
	{
		$id['application_id']=$data['app_id'];
		$data_update = array(
     		'responce' =>$data['Template_select'],
     		'comments' =>$data['free_comment'],
     		'responce_time' =>date("Y-m-d H:i:s")
     	);
		$this->app_details=$this->index_model->update_app_status($id,$data_update);
		if($data['Template_select']!='wait')
		$this->send_mail($data);
	}
	function redirect($url, $permanent = false)
	{
	    header('Location: ' . $url, true, $permanent ? 301 : 302);
	    exit();
	}
	
}

