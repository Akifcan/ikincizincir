<?php 

class Home extends CI_CONTROLLER{

	function __construct(){
		parent::__construct();
		$this->load->model('Ikinci_zincir_model');
	}

	function index(){
		$last_added_bicycles = $this->Ikinci_zincir_model->get_all_with_join('bicycles', 'users', 'id', 'user_id');
		$last_added_spare_parts = $this->Ikinci_zincir_model->get_all_with_join('spare_parts', 'users', 'id', 'user_id');
		$last_added_clothings = $this->Ikinci_zincir_model->get_all_with_join('clothings', 'users', 'id', 'user_id');


		$view_data = array(
			'last_added_bicycles' => $last_added_bicycles,
			'last_added_spare_parts' => $last_added_spare_parts,
			'last_added_clothings' => $last_added_clothings,
		);


		$this->load->view('front/home-page/index', $view_data);
	}

	function get_product_detail($table_name, $product_number){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$product_detail = $this->Ikinci_zincir_model->get_join(
					$table_name, array('product_number' => $product_number, "$table_name.is_active" => 1), 'users', 'id', 'user_id');
				$render_data = array('table' => $table_name, 'product_detail' => $product_detail);
				echo $this->load->view('front/renders/quick_show_render', $render_data, true);
		}
	}

}