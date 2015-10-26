<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->helper(array('form','url','html','form'));
        $this->load->library(array('session', 'form_validation', 'email' ,'ion_auth'));
		
		
    }
	
	public function getUserEmailById()
	{   
		$userId = $this->ion_auth->get_user_id();
  		//$this->User->getUserEmailById($userId);
  		return $this->User->getUserEmailById($userId);				
	}
	
}