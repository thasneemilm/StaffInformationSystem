<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // do some stuff
    }
}





class RegisterStudentController extends MY_Controller {

	
	 
	  function __construct() {
		parent::__construct();
		//$this -> load -> library('form_validation');
		$this -> load -> model('StudentModel');
		$this->load->helper(array('form','url','html'));
        $this->load->library(array('session', 'form_validation', 'email'));
		}
	 
	public function index()
	
	{
		$data['registernumber'] = $this->StudentModel->getNextRegisterNumber();	
		  // echo site_url();
		//$data['students'] =  $this->jquery_model->getStudents();
		$this->load->view('header');	
		$this->load->view('RegisterStudentView', $data);   
		$this->load->view('footer');
		//echo "Hello!";
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
		
		 $data = array(
        'id'  =>  $registernumber,
        'name'   =>  $studentname,
        'parentname'   =>  $parentname,
        'address'   =>  $address,
        'phonenumber'   =>  $phonenumber,
         );
		$this->StudentModel->addnewStudents($data);
		redirect('RegisterStudentController' );
		
		
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

			

			}
		