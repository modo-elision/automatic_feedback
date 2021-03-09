<?php
class Controller {
    function __construct() {
    	session_start();
    	//error_reporting(E_ERROR | E_PARSE);
		//require_once 'model/db.php';
		//$this->model=new dbconn();
	}
	function user_id()
	{
		return $_SESSION["User_id"];
	}
	function user_type()
	{
		return $_SESSION["type"];
	}
	function index() {
		require_once 'view/index.html';
	}
	function signin() {
		require_once 'view/sign-in.html';
	}
	function signup() {
		require_once 'view/sign-up.html';
	}
	function application_list() {
		require_once 'view/application-status.html';
	}
	function application_list_admin() {
		require_once 'view/applications.html';
	}
	function job_detail() {
		require_once 'view/apply-job.html';
	}
	function app_detail() {
		require_once 'view/application.html';
	}
}