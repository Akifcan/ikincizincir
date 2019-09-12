<?php 


class Products extends CI_CONTROLLER{

	private $user_info;
	private $user_id;
	function __construct(){
		parent::__construct();
		$this->load->model('Bicycle_model');
		$this->load->model('Ikinci_zincir_model');
		$this->load->library('Validations');
		$this->user_info = $this->session->userdata('user');
		if($this->user_info){
			$this->user_id = $this->session->userdata('user')->id;
		}
	}

	function index(){

		if(!isset($_GET['ilan'])){
			redirect(base_url('ilanlar?ilan=bisikletler'));
		} 

		$products;
		$table_index;
		$table_name;
		$categories = $this->Ikinci_zincir_model->get_all('categories');
		if($_GET['ilan'] == 'bisikletler'){
			$products = $this->Bicycle_model->get_all_bicycle();
			$table_index = 0;
			$table_name = 'bicycles';
		}else if($_GET['ilan'] == 'yedek-parca'){
			$products = $this->Ikinci_zincir_model->get_all_products('spare_parts');
			$table_index = 1;
			$table_name = 'spare_parts';
		}else if($_GET['ilan'] == 'giyim-ve-guvenlik'){
			$products = $this->Ikinci_zincir_model->get_all_products('clothings');
			$table_index = 2;
			$table_name = 'clothings';
		}
		$view_data = array(
			'products' => $products, 
			'table_index' => $table_index, 
			'table_name' => $table_name,
			'categories' => $categories,
		);
		$this->load->view('front/product-page/products-page/index', $view_data);
	}

	function search_product(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$table_name = $this->input->post('table_name');
			$searched_product = $this->input->post('searched_product');

			$table_index;

			if($table_name == 'bicycles'){
				$table_index = 0;
			}else if($table_name == 'spare_parts'){
				$table_index = 1;
			}else if($table_name == 'clothings'){
				$table_index = 2;
			}

			$search_product = $this->Ikinci_zincir_model->search_product($table_name, array('name' => $searched_product));
			$render_data = array('products' => $search_product, 'table_index' => $table_index, 'table_name' => $table_name);
			echo $this->load->view('front/renders/products_render', $render_data, true);

		}
	}

	function product_detail($slug, $table_name){

		$table_index;
		$product_detail = $this->Ikinci_zincir_model->get_product($table_name, array('slug' => $slug));
		$product_number = $product_detail->product_number;
		if($table_name == 'bicycles'){
			$table_index = 0;
			if($product_detail->is_edited == 1){
				$product_detail = $this->Ikinci_zincir_model->get_product('edited_bicycles', array('product_number' => $product_number));
			}
		}else if($table_name == 'spare_parts'){
			$table_index = 1;
			if($product_detail->is_edited == 1){
				$product_detail = $this->Ikinci_zincir_model->get_product('edited_spare_parts', array('product_number' => $product_number));
			}
		}else if($table_name == 'clothings'){
			$table_index = 2;
		}
		$this->Ikinci_zincir_model->add('product_log', 
			array('user_id' => $this->user_id, 'product_number' => $product_detail->product_number));



		if($product_detail){
			$view_data = array(
				'product_detail' => $product_detail, 
				'table_name' => $table_name,
				'table_index' => $table_index,
			);
			$this->load->view('front/product-page/product-detail-page/index', $view_data);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}

	}

	function to_look_at(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_to_look_at() == FALSE){
				echo validation_errors();
			}else{

				$product_number = $this->input->post('product_number', true);

				$is_exists_to_look_at = $this->Ikinci_zincir_model->get(
					'to_look_at',  
					array(
						'user_id' => $this->user_id,
						'product_number' => $product_number,
					)
				);

				if($is_exists_to_look_at){
					echo json_encode(false);
				}else{
					$add_to_look_at = $this->Ikinci_zincir_model->add('to_look_at',
						array(
							'user_id' => $this->user_id ,
							'product_number' => $this->input->post('product_number', true),
						)
					);
					if($add_to_look_at){
						echo json_encode(true);
					}
				}
			}
		}
	}

	function deactive_product(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$table_name = $this->input->post('table_name', true);
			$product_number = $this->input->post('product_number', true);

			$deactive_product = $this->Ikinci_zincir_model->update(
				array('product_number' => $product_number),
				$table_name,
				array('is_active' => 0)
			);
			if($deactive_product){
				echo json_encode(true);
			}else{
				echo json_encode(false);
			}
		}
	}

	function report_product(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$product_number = base64_decode($this->input->post('product_number', true));
			$table_name = base64_decode($this->input->post('table_name', true));
			$report_reason = $this->input->post('report_reason', true);

			if($this->validations->rules_for_report_product() == FALSE){
				echo json_encode(array(false, message('info', 'Lütfen rapor sebebini seçiniz')));
			}else{
				$product_is_exists = $this->Ikinci_zincir_model->get(
					$table_name,
					array('product_number' => $product_number)
				);

				if($product_is_exists){
					$report_product = $this->Ikinci_zincir_model->add(
						'reported_products',
						array(
							'product_number' => $product_number,
							'reporter' => $this->user_id,
							'report_reason' => $report_reason,
						)
					);
					if($report_product){
						echo json_encode(array('true', 'Talebiniz alınmıştır. İlgileneceğiz'));
					}
				}
			}


		}
	}

	
}