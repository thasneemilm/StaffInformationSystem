<?php
class MY_Controller extends CI_Controller {
		
	public $data = Array();
	

	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('menu_model');
		$this -> load -> helper(array('form', 'url', 'html', 'form'));
		$this -> load -> library(array('session', 'form_validation', 'email', 'ion_auth'));
		
	}

	public function getUserEmailById() {
		$userId = $this -> ion_auth -> get_user_id();
		//$this->User->getUserEmailById($userId);
		return $this -> User -> getUserEmailById($userId);
	}

	public function loadView($view) {
		//echo '<pre>'; print_r($this->session->all_userdata());exit;
		//	$userid = $this->ion_auth->get_user_id();
		//  	$this->data['user'] = $this->user->get_all_details_by_id($userid);
		$this -> load -> view('header');
		$this -> load -> view($view, $this -> data);
		$this -> load -> view('footer');
	}

	public function get_menus() {
		$this -> load -> model('menu_model');
		$menus = $this -> menu_model -> menus();
		$data = array('menus' => $menus);
		//$this -> load -> view('page1', $data);
		return $data;
	}

}
