<?php 

	class Bicycle_model extends CI_MODEL{

		private $table_name;
		private $image_table_name;
		private $edited_table_name;
		function __construct(){
			parent::__construct();
			$this->table_name = 'bicycles';
			$this->image_table_name = 'bicycle_images';
			$this->edited_table_name = 'edited_bicycles';
		}

		function add_bicycle($data=array()){
			return $this->db->insert($this->table_name, $data);
		}

		function add_bicycle_image($data=array()){
			return $this->db->insert($this->image_table_name, $data);
		}

		function add_edited_table($data=array()){
			return $this->db->insert($this->edited_table_name, $data);
		}

		function get($where=array()){
			return $this->db->select('*')
							->from($this->table_name)
							->where($where)
							->get()->row();
		}

		function get_all_bicycle(){
			return $this->db->select('*')
							->from($this->table_name)
							->where("$this->table_name.is_active", 1)
							->join('users', "users.id=$this->table_name.user_id")
							->get()->result();
		}

		function get_image_table($where=array()){
			return $this->db->select('*')
							->from($this->image_table_name)
							->where($where)
							->get()->row();
		}

		function update($where=array(), $data=array()){
			return $this->db->where($where)->update($this->table_name, $data);
		}

		function update_image_table($where=array(), $data=array()){
			return $this->db->where($where)->update($this->image_table_name, $data);
		}

	}
