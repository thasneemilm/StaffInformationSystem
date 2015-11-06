<?php

class PaymentModel extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this -> load -> database();
	}

	public function registerNewPaymentCatagory($data) {
		if ($this -> db -> insert('paymentcatagory', $data)) {
			return TRUE;
		} else {
		return FALSE;
		}

	}

	function getPaymentRows($params = array())
    {
        $this->db->select('*');
        $this->db->from('paymentcatagory');
        $query = $this->db->get();
        
        
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
		
    }

	

	

	
	 public function getSinglePayment($id = null) {
     $this->db->where('id', $id);
     return $this->db->get('paymentcatagory');
  }
	
	
	
	function update($id, $data) {
		$this -> db -> where('id', $id);
		$this -> db -> update('paymentcatagory', $data);
	}

	function delete($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete('paymentcatagory');
	}

	

	

	

}
