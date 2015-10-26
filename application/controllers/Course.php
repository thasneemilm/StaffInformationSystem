<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Course extends MY_Controller {

	
	 
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
		$this->data['courses'] = $this->CourseModel->getAllCourses();
		$this->load->view('masterView', $this->data);
		
	}
		


   public function registerNewCourse()
   {
       $coursename = $this->input->post('coursename');
		$description = $this->input->post('description');
		
		
		 $data = array(
        'name'  =>  $coursename,
        'description'   =>  $description,
         );
		 if($this->CourseModel->registerNewCourse($data)==TRUE){
		 	$this->session->set_flashdata('message',"<div style='color:green;'> COURSE REGISTRATION SUCCESS .<div>");
		//$this->data = array('content'=>'Course/RegisterCourseView');
		//$this->load->view('masterView', $this->data);
		redirect('Course');
		}else {
			//echo $this->StudentModel->addnewStudents($data);
		   $this->session->set_flashdata('message',"<div style='color:red;'> COURSE REGISTRATION SUCCESS .<div>");
		}
		
   }
   
   
   public function editCourse($id)
   {
   	    $this->data = array('content'=>'Course/CourseUpateView');
   	    $id = $this->uri->segment(3);
		//echo $id;
		$this->data['single_course'] = $this->CourseModel->getCourseById($id);	
		//echo $this->CourseModel->getCourseById($id);
        $this->data['courses'] = $this->CourseModel->getAllCourses();
		$this->load->view('masterView', $this->data);
   }
   
   
   public function updateCourse()
   {
    	$id= $this->input->post('id');
		$data = array(
		'name' => $this->input->post('coursename'),
		'description'=> $this->input->post('description'),);
		$this->CourseModel->updateCourse($id,$data);
		redirect('Course');
   }
   
   function deleteCourse() {
	$id = $this->uri->segment(3);
	$this->CourseModel->deleteCourse($id);
	redirect('Course');
	}
   
   
    public function searchCourse(){
		$course=  $this->input->post('cousre');
		$query = $this->CourseModel->getCourse($course);
		header('Content-type : application/jason');
			  echo json_encode($query);
		//echo json_encode ($query);
	}
   
   
   
   
   
 }
		