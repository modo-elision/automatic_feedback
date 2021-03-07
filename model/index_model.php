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