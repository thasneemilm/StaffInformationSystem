<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Settings extends MY_Controller {

	
	 
	  function __construct() {
	 
		parent::__construct();
		 if (!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
		
		//$this->load->library('Datatables');
       // $this->load->library('table');
        $this->load->database();
		//$this -> load -> library('form_validation');
		$this -> load -> model('StudentModel');
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
     
	
	
	public function branch(){
		$this->loadView('AddBranch', $this->data);
		$this->data['branches'] = $this->StudentModel->getBranches();
		} 
	 
	public function addBranch(){
		
		$branchname = $this->input->post('branchname');
		$description = $this->input->post('description');
		
		$result = $this->StudentModel->insertBranch($branchname,$description);
		if($result){
			echo 'Success';
			} else {
			echo 'Fail';
			}
		
	//	$this->StudentModel->insertBranch($branchname,$description);
		//redirect('Settings/branch', 'refresh');
		//$this->data['courses'] = $this->StudentModel->getBranches();
		//echo 'Success';
		}  
		
    public function  getBranch(){
		
		$this->data['branches'] = $this->StudentModel->getBranches();
		//$this->loadView('branchListView', $this->data);
		 $this->load->view('branchListView', $this->data, false);
		
		} 
  
 }
		