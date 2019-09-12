<?php 

	class Account_model extends CI_MODEL{

		private $table_name;
		function __construct(){
			parent::__construct();
			$this->table_name = 'users';
		}

		function update($where=array(), $data=array()){
			return $this->db->where($where)->update($this->table_name, $data);
		}

	}