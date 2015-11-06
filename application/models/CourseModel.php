<?php

class CourseModel extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this -> load -> database();
	}

	public function registerNewCourse($data) {
		if ($this -> db -> insert('course', $data)) {
			return TRUE;
		}

	}

	public function getAllCourses() {
		$this -> db -> select('id as id, name as name ,description as description');
		$q = $this -> db -> get_where('course');
		//$this->db->order_by("name", "des");
		if ($q -> num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
				//echo $row->product_id;
			}

			return $data;
		}

		return FALSE;

	}

	public function registerForCourse($data) {
		$this -> db -> insert('courseregistration', $data);
	}

	public function getCourseById($id) {
		$this -> db -> select('*');
		$this -> db -> from('course');
		$this -> db -> where('id', $id);
		$query = $this -> db -> get();
		$result = $query -> result();
		return $result;
	}

	
	 public function getSingleCourse($id = null) {
	
     $this->db->where('id', $id);
	 return $this->db->get('course');
	 }
	
	
	
	function updateCourse($id, $data) {
		$this -> db -> where('id', $id);
		$this -> db -> update('course', $data);
	}

	function deleteCourse($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete('course');
	}

	function getCourse($cousre) {
		$this -> db -> select('id,name');
		$whereCondition = array('name' => $cousre);
		$this -> db -> like($whereCondition);
		$this -> db -> from('course');
		$this -> db -> limit(5);
		$query = $this -> db -> get();
		return $query -> result();
	}

	public function isRegisteredForTheCourse($studentzId, $courseId) {
		$this -> db -> select('studentid,courseid');
		$whereCondition = array('studentid' => $studentzId, 'courseid' => $courseId);
		$this -> db -> like($whereCondition);
		$this -> db -> from('courseregistration');
		$query = $this -> db -> get();
		$rowcount = $query -> num_rows();
		if ($rowcount > 0) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	function getAllTypeOfClasses() {
		$this -> db -> select('id,name');
		$this -> db -> from('classtypes');
		$query = $this -> db -> get();
		return $query -> result();
	}

}
