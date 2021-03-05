<?php
class login extends main_control{
	function __construct() {
		parent::__construct();
	}
	
	function index() {
	
		
		$this->view->render('login/index');
		
	}
}