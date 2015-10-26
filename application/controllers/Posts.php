<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Posts Management class created by CodexWorld
 */
class Posts extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('post');
        $this->load->library('Ajax_pagination');
        $this->perPage = 7;
		
			$this->load->database();
		//	$this->load->library("pagination");
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
        //$data = array();
        
        //total rows count
        $totalRec = count($this->post->getRows());
        
        //pagination configuration
        $config['first_link']  = 'First';
        $config['div']         = 'postList'; //parent div tag id
        $config['base_url']    = base_url().'index.php/posts/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $this->data['students'] = $this->post->getRows(array('limit'=>$this->perPage));
        
        //load the view
        $this->loadView('AjaxMain', $this->data);
    }
    
    function ajaxPaginationData()
    {
        $page = $this->input->post('page');
       // if(!$page){
       //     $offset = 0;
       // }else{
            $offset = $page;
      //  }
        
        //total rows count
        $totalRec = count($this->post->getRows());
        
        //pagination configuration
        $config['first_link']  = 'First';
       // $config['div']         = 'postList'; //parent div tag id
        $config['base_url']    = base_url().'index.php/posts/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['students'] = $this->post->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        $this->load->view('ajax-pagination-data', $data, false);
    }
	
	function ajaxPaginationData2()
    {
       $search=  $this->input->post('search');
       // if(!$page){
       //     $offset = 0;
       // }else{
       //     $offset = $page;
      //  }
        
        //total rows count
        $totalRec = count($this->post->getRows());
        
        //pagination configuration
        $config['first_link']  = 'First';
       // $config['div']         = 'postList'; //parent div tag id
        $config['base_url']    = base_url().'index.php/posts/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['students'] = $this->post->getStudent($search);
        
        //load the view
        $this->load->view('ajax-pagination-data', $data, false);
    }
	
	
	
	public function ajax_search()
	{
		$search=  $this->input->post('search');
		$query = $this->StudentModel->getStudentAjax($search);
		echo json_encode ($query);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}