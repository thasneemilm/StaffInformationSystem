<?php

class coursemodel extends CI_Model
{
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}
	
   
   public function getAllCourses() {
		$this -> db -> select('id as id, name as name');
		$q = $this -> db -> get_where('course');
		if ($q -> num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
				//echo $row->product_id;
			}

			return $data;
		}

		return FALSE;

	}
	
   	
   public function getStudentByName($text)
   {
     	// $this->db->like('name', $text);
		 $this->db->select('id,name');
		 $query = $this->db->get('student');
		 return $query->result();;
   }
    public function getStudents() {
       
       $this->db->select('id,name');
       $this->db->from('student');
       $query = $this->db->get();
	   return $query->result_array();
		
    }
	
	public function registerForCourse($data)
	{
	$this->db->insert('courseregistration', $data); 
	}
	
	
	
}