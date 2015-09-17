<?php

class studentmodel extends CI_Model
{
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}
	
   public function addnewStudents($data)
   {
      $this->db->insert('student', $data); 
   }
   
   	
   public function getStudentByName($text)
   {
     	// $this->db->like('name', $text);
     	$this->db->like('name', $text);
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
	
	public function getNextRegisterNumber()
	{
	
	
	$maxid = 0;
$row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `student`')->row();
if ($row) {
    $maxid = $row->maxid; 
	return $maxid+1;
}	
	//echo $maxid = $this->db->query('SELECT MAX(id) AS `maxid` FROM `student`')->row()->maxid;
		
	//$this->db->select_max('id as id');
	//$query = $this->db->get('student')->row();
	//echo $query->id;	
	}
	
	
}