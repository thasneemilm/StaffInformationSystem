<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Student extends MY_Controller {

	
	 
	  function __construct() {
		parent::__construct();
		$this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
		//$this -> load -> library('form_validation');
		$this -> load -> model('StudentModel');
		$this -> load -> model('CourseModel');
		$this->load->helper(array('form','url','html'));
        $this->load->library(array('session', 'form_validation', 'email'));
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		}
	  
	 
	public function index()
	
	{
		
		$this->data = array('content'=>'RegisterStudentView');
		$this->data['registernumber'] = $this->StudentModel->getNextRegisterNumber();	
		$this->data['allclassesTypes'] = $this->CourseModel->getAllTypeOfClasses();
		  // echo site_url();
		//$data['students'] =  $this->jquery_model->getStudents();
	//	$this->load->view('header');	
		//$this->load->view('RegisterStudentView', $data);   
		//$this->load->view('footer');
		//echo "Hello!";
		
		$this->load->view('masterView', $this->data);
	}
	
	
	public function registerStudent()
	{   //$this->form_validation->set_rules('registernumber', 'Register Number', '|required|min_length[5]|max_length[20]|numeric', array('numeric' => 'Insert A numeric vlaue'));
		//$this->form_validation->set_rules('studentname', 'Student Name', 'trim|required|min_length[5]|max_length[20]|xss_clean|alpha');
		//$this->form_validation->set_rules('phonenumber', 'Phone Number', '|required|min_length[5]|max_length[20]|numeric');
		
		//$this->StudentModel->getNextRegisterNumber();
		
		
		//$registernumber = $this->StudentModel->getNextRegisterNumber();	
		$registernumber = $this->input->post('registernumber');
		$studentname = $this->input->post('studentname');
		$parentname = $this->input->post('parentname');
		$address = $this->input->post('address');
		$phonenumber = $this->input->post('phonenumber');
		$$classeType = $this->input->post('$classeType');
		
		 $data = array(
        'id'  =>  $registernumber,
        'name'   =>  $studentname,
        'parentname'   =>  $parentname,
        'address'   =>  $address,
        'phonenumber'   =>  $phonenumber,
        'classeType'   =>  $$classeType
         );
		 if($this->StudentModel->addnewStudents($data)==TRUE){
		 	$this->session->set_flashdata('message',"<div style='color:green;'> STUDENT REGISTRATION SUCCESS .<div>");
		redirect('/' );
		}else {
			//echo $this->StudentModel->addnewStudents($data);
		   $this->session->set_flashdata('message',"<div style='color:red;'> STUDENT REGISTRATION FAIL .<div>");
		}
		
		
		
		
	}

	public function getStudentByName()
		{
			$text = $this->input->post('vlaue');

			if($rows = $this->StudentModel->getStudentByName($text)){
			header('Content-type : application/jason');
			echo json_encode($rows);
			}else {
			$data = false;
			}

	    }

	public function functionName()
	{
	    $this->db->select("student.*,course.*");
  		$this->db->from('trn_employee');
  		$this->db->join('trn_address', 'trn_address.employee_id = trn_employee.employee_id');
  		$query = $this->db->get();
  		return $query->result();	
	}	
	
	
	function dataTableViewbbbb()
    {

        $this->data = array('content'=>'RegisterForCourse');
		//$this->session->set_flashdata('msg', 'Category added');
		$data['courses'] = $this->coursemodel-> getAllCourses();
		//$this->load->view('header');	
		$this->load->view('masterView', $this->data);
		//$this->load->view('RegisterForCourse',$data);   
		//$this->load->view('footer');
		//echo "Hello!";
    }
    //function to handle callbacks
    function datatabletttttttttt()
    {
        $this->datatables->select('id,first,last,email')
        ->unset_column('id')
        ->from('subscriber');
        
        echo $this->datatables->generate();
    }
	
	
	public function registerForCourseView()
	
	{
		$this->data = array('content'=>'RegisterForCourse');
		//$this->session->set_flashdata('msg', 'Category added');
	//	$data['courses'] = $this->coursemodel-> getAllCourses();
		//$this->load->view('header');	
		$this->load->view('masterView', $this->data);
		//$this->load->view('RegisterForCourse',$data);   
		//$this->load->view('footer');
		//echo "Hello!";
	}
	
	
	public function registerForCourse()
		{
		//$this->data = array('content'=>'RegisterForCourse');	
		$courseid =  $this->input->post('course');
	    $studentidid =  $this->input->post('student');
		 $array = array(
        'studentid' => $studentidid,
         'courseid' => $courseid,
    	);
		
		if ($this->CourseModel->isRegisteredForTheCourse($studentidid,$courseid)==FALSE) {
			$this->CourseModel->registerForCourse($array);
		$this->session->set_flashdata('message',"<div style='color:GREEN;'> REGISTRATION SUCCESS .<div>");
		//$this->load->view('masterView', $this->data);
		redirect('/' );
		} else {
			$this->session->set_flashdata('message',"<div style='color:RED;'> ALREADY REGISTERED .<div>");
			//$this->load->view('masterView', $this->data);
			redirect('/' );
		}
		
		
		
		}
	
public function searchStudent(){
		$search=  $this->input->post('search');
		$query = $this->StudentModel->getStudent($search);
		header('Content-type : application/jason');
			  echo json_encode($query);
		//echo json_encode ($query);
	}
	
	 public function searchStudentByRegNumber(){
		$search=  $this->input->post('search');
		$query = $this->StudentModel->getStudentByRegNumber($search);
		//header('Content-type : application/jason');
		//	  echo json_encode($query);
		
		
		
		$arr = array();
	foreach ($query as $q) {
		$arr[] = $g;
	}
	print json_encode($arr);
		
		
		
	}
	
	function showDataTable()
    {
    	//$this->data = array('content'=>'studentListView');

        //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
        $this->table->set_template($tmpl); 
        
        $this->table->set_heading('Number','Name','Parent Name','Address','Phone Number');

        $this->load->view('studentListView');
    }
    //function to handle callbacks
    
    function datatable()
    {
        $this->datatables->select('id,name,parentname,address,phonenumber')
      //  ->unset_column('id')
        ->from('subscriber');
        
        echo $this->datatables->generate();
    }
	
	
	
		

 }
		