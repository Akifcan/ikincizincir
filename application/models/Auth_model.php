<?php 

	class Auth_model extends CI_MODEL{

		private $table_name;
		function __construct(){
			parent::__construct();
			$this->table_name = 'users';
		}

		function get_user($where=array()){
			return $this->db->select('*')
							->from($this->table_name)
							->where($where)
							->get()->row();
		}

		function create_user($data=array()){
			return $this->db->insert($this->table_name, $data);
		}

		function get_last_id(){
			return $this->db->insert_id();
		}

	}