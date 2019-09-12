<?php 

class Clothing extends MY_CONTROLLER{

	private $user_info;
	function __construct(){
		parent::__construct();
		$this->load->library('Validations');
		$this->load->model('Ikinci_zincir_model');
		$this->user_info = $this->session->userdata('user');
	}

	function index(){
		$this->session->set_userdata('product_number', 'IZ'.rand(4000, 9999));
		$view_data = array('user' => $this->user_info);
		$this->load->view('front/product-page/add-clothing-page/index', $view_data);
	}

	function add_clothing(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_add_clothing() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
			}else{
				$slug = slug($this->input->post('name').'-'.$this->input->post('id'));
				$add_clothing = $this->Ikinci_zincir_model->add(
					'clothings',
					array(
						'user_id' => $this->user_info->id,
						'product_number' => $this->session->userdata('product_number'),
						'name' => $this->input->post('name', true),
						'brand' => $this->input->post('brand', true),
						'size' => $this->input->post('size', true),
						'type' => $this->input->post('type', true),
						'phone_number' => $this->input->post('phone_number', true),
						'price' => $this->input->post('price', true),
						'description' => $this->input->post('description', true),
						'meet_location' => $this->input->post('meet_location', true),
						'is_active' => 1,
						'slug' => $slug,
						'advert_type' => 'clothings',
					)
				);

				if($add_clothing){
					echo json_encode(array(true, $slug, 'clothings'));
				}
			}
		}else{
			redirect(base_url($_SERVER['HTTP_REFERER']));
		}
	}

	function add_clothing_image(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$config['upload_path'] = FCPATH.'assets/images/clothing-images';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']  = '5000';
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				$add_clothing_image = $this->Ikinci_zincir_model->add(
					'clothing_images',
					array(
						'product_number' => $this->session->userdata('product_number'),
						'image_url' => 'assets/images/clothing-images/'.$data['upload_data']['file_name'],
						'is_active' => 1,
					)
				);
				if($add_clothing_image){
					echo json_encode(true);
				}
			}
		}else{
			redirect(base_url($_SERVER['HTTP_REFERER']));
		}
	}

}