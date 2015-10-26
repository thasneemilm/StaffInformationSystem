<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class RegisterForCourseController extends MY_Controller {
	 
	  function __construct() {
		parent::__construct();
		//$this -> load -> library('form_validation');
		$this -> load -> model('StudentModel');
		$this -> load -> model('coursemodel');
		$this->load->helper(array('form','url','html'));
        $this->load->library(array('session', 'form_validation', 'email'));
		}
	 
	public function index()
	
	{
		//$this->session->set_flashdata('msg', 'Category added');
		$data['courses'] = $this->coursemodel-> getAllCourses();
		$this->load->view('header');	
		$this->load->view('RegisterForCourse',$data);   
		$this->load->view('footer');
		//echo "Hello!";
	}
	
	
	public function registerForCourse()
	{
		$courseid =  $this->input->post('course');
	    $studentidid =  $this->input->post('student');
		 $array = array(
        'studentid' => $studentidid,
         'courseid' => $courseid,
    );
		$this->coursemodel->registerForCourse($array);
		$this->session->set_flashdata('msg', 'Category added');
		redirect('RegisterStudentController');
	}
	
	
	
		
	}