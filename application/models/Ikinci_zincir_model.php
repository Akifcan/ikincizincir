<?php 

class Ikinci_zincir_model extends CI_MODEL{

	private $user_id;
	function __construct(){
		parent::__construct();
		if($this->session->userdata('user')){
			$this->user_id = $this->session->userdata('user')->id;
		}
	}

	function get_all($table_name){
		return $this->db->select('*')
		->from($table_name)
		->get()->result();
	}

	function search_product($table_name, $like=array()){
		return $this->db->select('*')
		->from($table_name)
		->like($like)
		->get()->result();
	}

	function get_all_products($table_name){
		return $this->db->select('*')
		->from($table_name)
		->where("$table_name.is_active", 1)
		->join('users', "users.id=$table_name.user_id")
		->get()->result();
	}

	function get_product($table_name, $where=array()){
		return $this->db->select('*')
		->from($table_name)
		->where($where)
		->join('users', "users.id=$table_name.user_id")
		->get()->row();
	}

	function get_all_with_join($table_name, $join_table_name, $join_column, $column, $limit=null){
		return $this->db->select('*')
		->from($table_name)
		->join($join_table_name, "$join_table_name.$join_column=$table_name.$column")
		->limit($limit)
		->get()->result();
	}

	function get_join($table_name, $where=array(), $join_table_name, $join_table_column, $column){
		return $this->db->select('*')
		->from($table_name)
		->where($where)
		->join($join_table_name, "$join_table_name.$join_table_column=$table_name.$column")
		->get()->row();
	}

	function get($table_name, $where=array()){
		return $this->db->select('*')
		->from($table_name)
		->where($where)
		->get()->row();
	}

	function add($table_name, $data=array()){
		return $this->db->insert($table_name, $data);
	}

	function union_products(){
		return $this->db->query("SELECT name, product_number, slug, added_date, advert_type FROM bicycles where user_id=$this->user_id UNION  SELECT name, product_number, slug, added_date,advert_type FROM spare_parts where user_id=$this->user_id UNION  SELECT name, product_number, slug, added_date, advert_type FROM clothings where user_id=$this->user_id")->result();

	}

	function products_log(){

		$products = $this->db->select('*')
		->from('product_log')
		->where('user_id', $this->user_id)
		->get()->result();

		$tables = ['bicycles', 'spare_parts', 'clothings'];

		$products_log  = array();
		foreach($tables as $table){
			foreach($products as $product){
				$product_log = $this->db->select('*')
				->from($table)
				->where('product_number', $product->product_number)
				->get()->result();
				if($product_log){
					array_push($products_log, $product_log);
				}
			}
		}
		return $products_log;
	}

	function to_look_at_products(){
		$products = $this->db->select('*')
							->from('to_look_at')
							->where('user_id', $this->user_id)
							->get()->result();

		$to_look_at_products = array();
		$tables = ['bicycles', 'spare_parts', 'clothings'];

		foreach($tables as $table){
			foreach($products as $product){
				$to_look_at_product =  $this->db->select('*')
										->from($table)
										->where('product_number', $product->product_number)
										->get()->result();
				if($to_look_at_product){
					array_push($to_look_at_products, $to_look_at_product);
				}
			}
		}
		return $to_look_at_products;

	}

	function update($where=array(), $table_name, $data=array()){
		return $this->db->where($where)->update($table_name, $data);
	}


	function get_with_result($table_name, $where=array()){
		return $this->db->select('*')
						->from($table_name)
						->where($where)
						->get()->result();
	}



}










