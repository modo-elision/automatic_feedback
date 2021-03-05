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
		return $this->Select('login',"","","","","");
	}
	public function check_login_records($data)
	{
		$where['email_id']=$data['email'];
		return $this->Select('login',$where,"","","","");
	}
	
	public function submit_index($data)
	{
		$this->db->insert('mvc', $data);
	}
	}