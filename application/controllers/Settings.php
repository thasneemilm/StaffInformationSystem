<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Settings extends MY_Controller {

	
	 
	  function __construct() {
		parent::__construct();
		//$this->load->library('Datatables');
       // $this->load->library('table');
        $this->load->database();
		//$this -> load -> library('form_validation');
		//$this -> load -> model('StudentModel');
		$this -> load -> model('CourseModel');
		//$this->load->helper(array('form','url','html','form'));
        //$this->load->library(array('session', 'form_validation', 'email' ,'ion_auth'));
		}
	 
	public function index()
	{
		$this->data = array('content'=>'Course/RegisterCourseView');
		//$this->data['courses'] = $this->CourseModel->getAllCourses();
		//$this->load->view('masterView', $this->data);
		 $this->loadView('Settings/Settings', $this->data);
		
	}
 
  
 }
		