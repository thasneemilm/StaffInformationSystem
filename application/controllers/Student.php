<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	
	class Student extends MY_Controller {
		
		   function __construct() {
			parent::__construct();
			if (!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
			$this->load->library('Ajax_pagination');
			$this->load->database();
			$this->load->library("pagination");
			$this -> load -> model('StudentModel');
			$this -> load -> model('CourseModel');
			$this->load->helper(array('form','url','html'));
			$this->load->library(array('session', 'form_validation', 'email'));
			$this->perPage = 7;
		}
		
		
		public function index()
		{
		$this->loadView('student_view');		
		}
		
		
		
/* 		public function search_student2()
		{
			
		$config = array();
		// $config['base_url'] = $base_url;
       // $config['base_url'] = $base_url."Student/search_student";;
        $config['total_rows'] = $this->StudentModel->record_student_count();
        $config['per_page'] = 5; 
		$config["uri_segment"] = 3;
		$config['base_url'] = site_url('Student/search_student');
		
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $base_url= site_url('teachers/index');
        $this -> pagination -> initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data["students"] = $this->StudentModel->fetch_students($config["per_page"], $page);
        $this->data["links"] = $this->pagination->create_links();

        $this->loadView("student_search", $this->data);		
		}

		
		public function get_pagination($base_url,$total_rows,$start,$limit) {

        $this -> load -> library('pagination');
        $config = array();
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit; 
        $config['next_link'] = 'Next page';   
        $config['next_tag_open'] = '<div class="next-page">';
        $config['next_tag_close'] = '</div>';
        $config['prev_link'] = 'Prev page'; 
        $config['prev_tag_open'] = '<div class="prev-page">'; 
        $config['prev_tag_close'] = '</div>';
        $this -> pagination -> initialize($config);
        return $this -> pagination -> create_links();
		} 
		
		
		
*/
		
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
			//$$classeType = $this->input->post('$classeType');
			
			$data = array(
			'id'  =>  $registernumber,
			'name'   =>  $studentname,
			'parentname'   =>  $parentname,
			'address'   =>  $address,
			'phonenumber'   =>  $phonenumber
			// 'classeType'   =>  $$classeType
			);
			if($this->StudentModel->addnewStudents($data)==TRUE){
				$this->session->set_flashdata('flashSuccess', 'Student Registration Success');
				redirect('Student' );
				}else {
				//echo $this->StudentModel->addnewStudents($data);
				$this->session->set_flashdata('flashDanger','Student Registration Fail');
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
		
		
		
		
		
	
        

    
		
	function get_all_studens(){
	//	$data = null;
	//	$query_s = $this -> StudentModel -> get_student_list();
		
	/* 	if ($query_s -> num_rows() > 0) {
            $data['students'] = $query_s -> result();
			foreach ($data['students'] as $student) {
			  	
				echo $student->name;
				echo '<br>';
				       
			}
        }
		
		}	
		 */
	return 	$this -> StudentModel -> get_student_list();
	}
	
	
/* 	
	public function ajax_search()
	{
		$search=  $this->input->post('search');
		$query = $this->StudentModel->getStudentAjax($search);
		echo json_encode ($query);
	}
	
 */	
 
 
 
	public function search_student()
    {
	
        $totalRec = count($this->StudentModel->getRows());
        
        //pagination configuration
        $config['first_link']  = 'First';
        $config['div']         = 'postList'; //parent div tag id
        $config['base_url']    = base_url().'index.php/Student/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $this->data['students'] = $this->StudentModel->getRows(array('limit'=>$this->perPage));
		//print_r($this->data['students']);
        
        //load the view
        $this->loadView('student_search', $this->data);
    }
    
	
	
    function ajaxPaginationData()
    {
        $page=  $this->input->post('page');
       // if(!$page){
       //     $offset = 0;
       // }else{
            $offset = $page;
      //  }
        
        //total rows count
        $totalRec = count($this->StudentModel->getRows());
        
        //pagination configuration
        $config['first_link']  = 'First';
       // $config['div']         = 'postList'; //parent div tag id
        $config['base_url']    = base_url().'index.php/student/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['students'] = $this->StudentModel->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        $this->load->view('ajax-pagination-data', $data, false);
    }
	
	
	
	function ajaxGetStudentSearch()
    {
       $search=  $this->input->post('search');
       // if(!$page){
       //     $offset = 0;
       // }else{
       //     $offset = $page;
      //  }
        
        //total rows count
        $totalRec = count($this->StudentModel->getRows());
        
        //pagination configuration
        $config['first_link']  = 'First';
       // $config['div']         = 'postList'; //parent div tag id
        $config['base_url']    = base_url().'index.php/Student/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['students'] = $this->StudentModel->getStudent($search);
        
        //load the view
        $this->load->view('ajax-pagination-data', $data, false);
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
		