<?php

class studentmodel extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this -> load -> database();
		$this->postTable = 'students';
	}

	public function addnewStudents($data) {
		$this -> db -> insert('students', $data);
		if ($this -> db -> affected_rows() > 0) {
			// Code here after successful insert
			return TRUE;
			// to the controller
		} else {
			return FALSE;
		}
	}

	public function getAllClassTypes() {
		$num_inserts = $this -> db -> insert('students', $data);
		$num_inserts = $this -> db -> affected_rows();
		//echo $num_inserts;
		if ($num_inserts == 1) {
			return TRUE;
		} else if ($num_inserts == null) {
			//echo "faaaaaaaaaaail";
			return FALSE;
		}
	}

	public function getStudentByName($text) {
		// $this->db->like('name', $text);
		$this -> db -> like('name', $text);
		$this -> db -> select('id,name');
		$query = $this -> db -> get('students');
		return $query -> result();
		;
	}

	public function getStudents() {

		$this -> db -> select('id,name');
		$this -> db -> from('students');
		$query = $this -> db -> get();
		return $query -> result_array();

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

	public function getNextRegisterNumber() {

		$maxid = 0;
		$row = $this -> db -> query('SELECT MAX(id) AS `maxid` FROM `students`') -> row();
		if ($row) {
			$maxid = $row -> maxid;
			return $maxid + 1;
		}
		//echo $maxid = $this->db->query('SELECT MAX(id) AS `maxid` FROM `subscriber`')->row()->maxid;

		//$this->db->select_max('id as id');
		//$query = $this->db->get('subscriber')->row();
		//echo $query->id;
	}

	function getStudent2($search) {
		$this -> db -> select('id,name');
		$whereCondition = array('name' => $search);
		$this -> db -> like($whereCondition);
		$this -> db -> from('students');
		$this -> db -> limit(5);
		$query = $this -> db -> get();
		return $query -> result();
	}

	function getStudentByRegNumber($search) {
		$this -> db -> select('id,name');
		$whereCondition = array('id' => $search);
		$this -> db -> like($whereCondition);
		$this -> db -> from('students');
		$query = $this -> db -> get();
		return $query -> result();
	}
    
	
	 // get skills with paging
    function get_student_list($limit = 10,$offset = 0){
    			
        return $this->db->select('*')
         ->from('students')
         ->limit($limit)
		 ->offset($offset)
         ->get();
    }
	
	public function record_student_count() {
        return $this->db->count_all("students");
    }
	
	public function fetch_students($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("students");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   
   function getStudentAjax($search){
		$this->db->select("*");
		$whereCondition = array('name' =>$search);
		$this->db->where($whereCondition);
		$this->db->from('students');
		$query = $this->db->get();
		return $query->result();
	}
   
   function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->postTable);
        //$this->db->order_by('created','desc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        //return ($query->num_rows() > 0)?$query->result_array():FALSE;
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }
	
	
	function getStudent($search)
    {
        $this->db->select('*');
        $this->db->from($this->postTable);
        
        $whereCondition = array('name' =>$search);
	    $this->db->like($whereCondition);
		$this->db->or_like('phonenumber',$search);
		$this->db->or_like('parentname',$search);
		$this->db->limit(10);
		$this->db->order_by("name", "asc");
        $query = $this->db->get();
        
        //return ($query->num_rows() > 0)?$query->result_array():FALSE;
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }
   
   
   
   
   
   
   
   
	
}
