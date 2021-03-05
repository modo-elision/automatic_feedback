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
	public function get_job_data()
	{
		return $this->Select('jobs',"*","","","","","");
	}
	public function submit_index($data)
	{
		$this->db->insert('mvc', $data);
	}
	}