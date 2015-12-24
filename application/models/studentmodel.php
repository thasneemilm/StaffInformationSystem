<?php

class StudentModel extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this -> load -> database();
		$this->postTable = 'students';
	}

	public function addnewStudents($data) {
		/* $this -> db -> insert('students', $data);
		echo $this -> db -> affected_rows();
		if ($this -> db -> affected_rows() > 0) {
			// Code here after successful insert
			return TRUE;
			// to the controller
		} else {
			return FALSE;
		} */
		
		
		if($this->db->insert('students', $data))
			{
			//echo $insert_id = $this->db->insert_id();	// Code here after successful insert
			return insert_id;   // to the controller
			}
		else {
		echo$this->db->_error_message();
			//return FALSE;
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
		//$this->db->or_like('parentname',$search);
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
	
	
	function getStudentAdvance($branchId,$districtId,$serviceId,$designationId)
    {  
	  
	  
	 /*   $this->db->select('students_payments.*,students.*,paymentcatagory.*, users.username as user, students_payments.amount as amount, students_payments.date as pdate, students_payments.time as ptime', false);
        $this->db->from('students_payments as students_payments')
		 ->join('students as students','students.id = students_payments.studentId','left')
		  ->join('paymentcatagory as paymentcatagory','paymentcatagory.paymentcategoryid = students_payments.paymentCatagoryId','left')
		  ->join('users as users','users.id = students_payments.officer','left');
	
	
	
	 */
	
	
	
	
	
        $this->db->select('students.*, districts.dname as dname,designations.dgname as dgname,service.sname as sname,branch.bname as bname');
         $this->db->from('students as students')
		 ->join('districts as districts','districts.id = students.District','left')
		  ->join('branch as branch','branch.id = students.Branch','left')
		  ->join('service as service','service.id = students.Service','left')
		 ->join('designations as designations','designations.id = students.designation','left') ;
        
	 	if($branchId>0){
			$whereCondition = array('Branch' =>$branchId);
			 $this->db->like($whereCondition);
			}
		
       // $whereCondition = array('name' =>$search);
	    
		if($districtId>0){
			$whereCondition = array('District' =>$districtId);
			 $this->db->like($whereCondition);
			}
		
		
		if($serviceId>0){
			$whereCondition = array('Service' =>$serviceId);
			 $this->db->like($whereCondition);
			}
		
		
		if($designationId>0){
			$whereCondition = array('designation' =>$designationId);
			$this->db->like($whereCondition);
			}
		 
		 
		
		
		
		//$this->db->or_like('phonenumber',$search);
		//$this->db->or_like('parentname',$search);
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
	
	
	
	function getStudentAdvance2($search)
    {
        $this->db->select('students.*, districts.dname as dname,designations.dgname as dgname,service.sname as sname,branch.bname as bname');
         $this->db->from('students as students')
		 ->join('districts as districts','districts.id = students.District','left')
		  ->join('branch as branch','branch.id = students.Branch','left')
		  ->join('service as service','service.id = students.Service','left')
		 ->join('designations as designations','designations.id = students.designation','left') ;
        
        $whereCondition = array('name' =>$search);
	    $this->db->like($whereCondition);
		$this->db->or_like('phonenumber',$search);
		$this->db->or_like('address',$search);
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function getStudentForPayment($search)
    {
        $this->db->select('*');
        $this->db->from($this->postTable);
        
       // $whereCondition = array('name' =>$search);
	   // $this->db->like($whereCondition);
		$this->db->or_like('name',$search);
		//$this->db->or_like('parentname',$search);
		$this->db->limit(5);
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
	
	
	
	
	
	
	
	
	
   
    public function getSingleStudent($id = null) {
    $this->db->select()->from('students');
 
    // where condition if id is present
    if ($id != null) {
      $this->db->where('id', $id);
    }
    else {
      $this->db->order_by('id');
    }
 
    $query = $this->db->get();
 
    if ($id != null) {
      return $query->row_array(); // single row
    }
    else {
      return $query->result_array(); // array of result
    }
  }
   
   public function getSingleStudent2($id = null) {
   
     $this->db->where('id', $id);
     return $this->db->get('students');
  }
   
  public  function update($id, $student){
        $this->db->where('id', $id);
        $x = $this->db->update('students', $student);
		if($x == false)
			throw new Exception("Database Error");
	}
   
   
    public function remove($id) {
	
    $this->db->where('id', $id);
    $this->db->delete('students');
	
	}
 
   
   function getStudentsForPayment($params = array())
    {
        $this->db->select('*');
        $this->db->from('students');
        $query = $this->db->get();
        
        
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }
   
    
	function GetPaymentOfStudent($params = array())
    {
        $this->db->select('*');
        $this->db->from('students_payments');
        $query = $this->db->get();
        
        
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }
	
   
   
   public function insert_profile_image($studentId, $imagename)
    {
        $data = array(
             'imagename'        => $imagename,
            'studentId'         => $studentId
        );
        $this->db->insert('profileimages', $data);
       // return $this->db->insert_id();
    }
   
   
   public function getProfileImageName2($studentId){
	   // $this->db->where('studentId', $studentId);
		//$query = $this->db->get('profileimages');
		//return $query->result();
		
	return	$this->db->get_where('profileimages', array('studentId' => $studentId));
	       // ->row();
		
		
		
	   }
   
   
   function getProfileImageName($studentId)
    {
        $this->db->select('*');
        $this->db->from('profileimages');
        
        $whereCondition = array('studentId' =>$studentId);
	   // $this->db->like($whereCondition);
		//$this->db->or_like('name',$search);
		//$this->db->or_like('parentname',$search);
		//$this->db->limit(5);
		//$this->db->order_by("name", "asc");
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
   
   
   function getDesignation()
    {
        $this->db->select('*');
        $this->db->from('designations');
        $query = $this->db->get();
        
        
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }
   
   
    function getService()
    {
        $this->db->select('*');
        $this->db->from('service');
        $query = $this->db->get();
        
        
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }
   
   
   
   function getDistricts()
    {
        $this->db->select('*');
        $this->db->from('districts');
        $query = $this->db->get();
        
        
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }
   
   
   function getBranches()
    {
        $this->db->select('*');
        $this->db->from('branch');
        $query = $this->db->get();
        
        
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }
   
	
}
