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
	function index() {
		
	}
}