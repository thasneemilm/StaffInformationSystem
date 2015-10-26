<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Post extends CI_Model{
    
    function __construct() {
        $this->postTable = 'subscriber';
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
?>