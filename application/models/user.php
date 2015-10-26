<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('username, password');
   $this -> db -> from('users');
   $this -> db -> where('username = ' . "'" . $username . "'");
   $this -> db -> where('password = ' . "'" . $password . "'");
   $this -> db -> limit(1);
	 
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 public function getUserEmailById($userId)
	{
		$this->db->where('email');
		$this->db->where('id', $userId);
  		$this->db->from('users');
	    $qyery = $this->db->get();
		if ($qyery!=null) {
			return $qyery;
		}
		return null;
	}
 
 
 
 
 
 
 
 
 
 
 
}
?>