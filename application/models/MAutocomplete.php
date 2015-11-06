<?php  
class MAutocomplete extends CI_Model{  
    function lookup($keyword){  
        $this->db->select('*')->from('students');  
        $this->db->like('name',$keyword,'after');  
        $query = $this->db->get();      
        $this->db->limit(1);   
        return $query->result();  
    }  
}  