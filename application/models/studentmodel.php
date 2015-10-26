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
   $num_inserts = $this->db->insert('subscriber', $data);
	$num_inserts = $this->db->affected_rows();
	//echo $num_inserts;
	if ($num_inserts==1) {
		return TRUE;
	} else  if($num_inserts==null){
		//echo "faaaaaaaaaaail";
		return FALSE;
	}
   }
   
   
    public function getAllClassTypes()
   {
   $num_inserts = $this->db->insert('subscriber', $data);
	$num_inserts = $this->db->affected_rows();
	//echo $num_inserts;
	if ($num_inserts==1) {
		return TRUE;
	} else  if($num_inserts==null){
		//echo "faaaaaaaaaaail";
		return FALSE;
	}
   }
   
   
   
   
   
   
   	
	
   public function getStudentByName($text)
   {
     	// $this->db->like('name', $text);
     	$this->db->like('name', $text);
		 $this->db->select('id,name');
		 $query = $this->db->get('subscriber');
		 return $query->result();;
   }
    public function getStudents() {
       
       $this->db->select('id,name');
       $this->db->from('subscriber');
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
$row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `subscriber`')->row();
if ($row) {
    $maxid = $row->maxid; 
	return $maxid+1;
}	
	//echo $maxid = $this->db->query('SELECT MAX(id) AS `maxid` FROM `subscriber`')->row()->maxid;
		
	//$this->db->select_max('id as id');
	//$query = $this->db->get('subscriber')->row();
	//echo $query->id;	
	}
	
	
	
	function getStudent($search){
		$this->db->select('id,name');
		$whereCondition = array('name' =>$search);
		$this->db->like($whereCondition);
		$this->db->from('subscriber');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	function getStudentByRegNumber($search){
		$this->db->select('id,name');
		$whereCondition = array('id' =>$search);
		$this->db->like($whereCondition);
		$this->db->from('subscriber');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	
	
	
	
	
	
	
	
}