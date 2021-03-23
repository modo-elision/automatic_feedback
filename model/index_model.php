<?php
require_once(dirname(__FILE__).'\db.php');
class Index_Model extends dbconn
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_all_login_records()
	{
		return $this->Select('login','*',"","","","","");
	}
	public function check_login_records($data)
	{
		$where['email_id']=$data['email'];
		return $this->Select('login','*',$where,"","","","");
	}
	public function get_all_job_list()
	{
		return $this->Select('jobs',"job_id,title,company_name,required_experience,pay,brief_description,post_date","","","","","");
	}

	public function get_job_detail($id)
	{
		$where['job_id']=$id;
		return $this->Select('jobs',"*",$where,"","","","");
	}
	public function add_acc($data)
	{
		{
			$rows["email_id"]=$data['email'];
			$rows["password"]=md5($data['password']);
			$rows["full_name"]=$data['full_name'];
			$rows["verify_flag"]=1;
			$rows["created_on"]=date("Y-m-d H:i:s");
			$rows["last_login"]=date("Y-m-d H:i:s");		
			return $this->Insert('login',$rows);
		}
		return 0;
	}
	public function apply_job($job_id)
	{
		if(!empty($_SESSION))
		if($_SESSION['User_id']!=NULL){
			$rows["user_id"]=$_SESSION['User_id'];
			$rows["job_id"]=$job_id;
			$rows["applyed_time"]=date("Y-m-d H:i:s");	
			return $this->Insert('applications',$rows);
		}
		return 0;
	}

	public function get_apply_status($id)
	{
		if(!empty($_SESSION))
		if($_SESSION['User_id']!=NULL){
			$where="`user_id` = ".$_SESSION['User_id']." AND `job_id` = ".$id;
			return $this->Select('applications',"*",$where,"","","","AND");
		}
		return 0;
	}
	function update_app_status($id,$data)
	{
		$this->Update("applications",$data,$id);
	}
	public function get_app_status($id)
	{
		if(!empty($_SESSION))
		if($_SESSION['User_id']!=NULL){
			$where['application_id']=$id;
			$this->app_details= $this->Select('applications',"*",$where,"","","","");
			unset($where);
			$where['job_id']=$this->app_details[0]['job_id'];
			$this->job_details=$this->Select('jobs',"job_id,title,company_name,required_experience,pay,brief_description,post_date",$where,"","","","");
			$this->app_details[0]["job_details"]=$this->job_details[0];
			unset($where);
			$where['user_id']=$this->app_details[0]['user_id'];
			$this->usera_details=$this->Select('login',"full_name,phone_number,email_id",$where,"","","","");
			$this->app_details[0]["user_details"]=$this->usera_details[0];
			return $this->app_details;
		}
		return 0;
	}
	public function get_all_appled_job_list()
	{
		$this->application_list=$this->Select('applications',"*","","application_id","DESC","");
		$count=10;
		if(count($this->application_list)<10){
			$count=count($this->application_list);
		}
		for ($i=0;$i<$count;$i++){
			unset($where);
			$where['job_id']=$this->application_list[$i]['job_id'];
			$this->job_details=$this->Select('jobs',"job_id,title,company_name,required_experience,pay,brief_description,post_date",$where,"","","","");
			$this->application_list[$i]["job_details"]=$this->job_details[0];
			unset($where);
			$where['user_id']=$this->application_list[$i]['user_id'];
			$this->usera_details=$this->Select('login',"full_name,phone_number",$where,"","","","");
			$this->application_list[$i]["user_details"]=$this->usera_details[0];
		}
		return $this->application_list;
	}

	public function get_one_appled_job_list($apply_id)
	{
		$this->application_list=$this->Select('applications',"*","","","application_id","DESC","");
		$count=10;
		if(count($this->application_list)<10){
			$count=count($this->application_list);
		}
		for ($i=0;$i<$count;$i++){
			unset($where);
			$where['job_id']=$this->application_list[$i]['job_id'];
			$this->job_details=$this->Select('jobs',"job_id,title,company_name,required_experience,pay,brief_description,post_date",$where,"","","","");
			$this->application_list[$i]["job_details"]=$this->job_details[0];
			unset($where);
			$where['user_id']=$this->application_list[$i]['user_id'];
			$this->job_details=$this->Select('login',"full_name,phone_number",$where,"","","","");
			$this->application_list[$i]["user_details"]=$this->job_details[0];
		}
		return $this->application_list;
	}
	public function get_appled_job_list($id)
	{
		$where['user_id']=$id;
		$this->application_list=$this->Select('applications',"*",$where,"","","","");
		$count=10;
		if(count($this->application_list)<10){
			$count=count($this->application_list);
		}
		for ($i=0;$i<$count;$i++){
			unset($where);
			$where['job_id']=$this->application_list[$i]['job_id'];
			$this->job_details=$this->Select('jobs',"job_id,title,company_name,required_experience,pay,brief_description,post_date",$where,"","","","");
			$this->application_list[$i]["job_details"]=$this->job_details[0];
		}
		return $this->application_list;
	}
	public function get_job_data()
	{
		return $this->Select('jobs',"*","","","","","");
	}
	
	}