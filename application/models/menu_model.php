<?php

class menu_model extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this -> load -> database();
	}

	public function menus($menu_id) {
		$this -> db -> select("*");
		$this -> db -> from("menu_parents");
		$this -> db -> where('id', $menu_id);
		$q = $this -> db -> get();

		$final = array();
		if ($q -> num_rows() > 0) {
			foreach ($q->result() as $row) {

				$this -> db -> select("*");
				$this -> db -> from("menu_children");
				$this -> db -> where("parent_id", $row -> id);
				$q = $this -> db -> get();
				if ($q -> num_rows() > 0) {
					$row -> children = $q -> result();
				}
				array_push($final, $row);
			}
		}
		return $final;
	}

	

}
