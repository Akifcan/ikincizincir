<?php 

require_once(FCPATH.'/application/libraries/File_manager_lib.php');
class Bicycle extends CI_CONTROLLER{
	private $file_manager;
	private $user_id;
	private $user_info;
	function __construct(){
		parent::__construct();
		$this->load->library('Validations');
		$this->load->model('Bicycle_model');
		$this->load->model('Ikinci_zincir_model');
		$this->user_info = $this->session->userdata('user');
		$this->user_id = $this->session->userdata('user')->id;
		$this->file_manager = new File_manager_lib();
	}

	function index(){
		$this->session->set_userdata('product_number', 'IZ'.rand(1, 99999));
		$view_data = array('user' => $this->user_info);
		$this->load->view('front/product-page/add-bicycle-page/index', $view_data);
	}

	function add_bicycle(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_add_bicycle() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
			}else{
				$slug = slug($this->input->post('name').'-'.$this->input->post('id'));
				$add_bicycle = $this->Bicycle_model->add_bicycle(
					array(
						'user_id' => $this->user_info->id,
						'product_number' => $this->session->userdata('product_number'),
						'name' => $this->input->post('name', true),
						'brand' => $this->input->post('bicycle_brand', true),
						'model' => $this->input->post('bicycle_model', true),
						'price' => $this->input->post('price', true),
						'bicycle_type' => $this->input->post('bicycle_type', true),
						'jant' => $this->input->post('jant', true),
						'cadre' => $this->input->post('cadre', true),
						'cadre_type' => $this->input->post('cadre_type', true),
						'front_brake' => $this->input->post('front_brake', true),
						'rear_brake' => $this->input->post('rear_brake', true),
						'year' => $this->input->post('year', true),
						'phone_number' => $this->input->post('phone_number', true),
						'meet_location' => $this->input->post('meet_location', true),
						'status' => $this->input->post('status'),
						'description' => $this->input->post('description', true),
						'is_active' => 1,
						'slug' => $slug,
						'advert_type' => 'bicycles',
					)
				);
				if($add_bicycle){
					echo json_encode(array(true, $slug, 'bicycles'));
				}else{
					echo json_encode(array(false, message('danger', 'Beklenmedik bir hata oluştu lütfen tekrar deneyin')));
				}
			}
		}else{
			redirect(base_url($_SERVER['HTTP_REFERER']));
		}
	}


	function add_bicycle_image(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$file_name = $this->session->userdata('product_number').time('Y-M-D');

			$config['upload_path'] = FCPATH.'/assets/images/bicycle-images';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']  = '5000';
			$config['file_name'] = $file_name;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
			else{

				$data = array('upload_data' => $this->upload->data());
				$add_product_image = $this->Bicycle_model->add_bicycle_image(
					array(
						'product_number' => $this->session->userdata('product_number'),
						'image_url' => 'assets/images/bicycle-images/'.$data['upload_data']['file_name'],
						'is_active' => 1,
					)
				);
				if($add_product_image){
					echo json_encode(true);
				}
			}
		}else{
			redirect(base_url($_SERVER['HTTP_REFERER']));
		}
	}


	function edit_bicycle($slug=null, $product_number=null){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_edit_bicycle() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
			}else{
				$product_is_exists = $this->Bicycle_model->get(
					array(
						'user_id' => $this->user_id, 
						'product_number' => $this->session->userdata('product_number'),
					)
				);
				if($product_is_exists){
					$edit_update_status = $this->Bicycle_model->update(
						array('product_number' => $this->session->userdata('product_number')),
						array('is_edited' => 1)
					);
					if($edit_update_status){

						$edit_product_is_exists = $this->Ikinci_zincir_model->get(
							'edited_bicycles',
							array(
								'product_number' => $this->session->userdata('product_number'),
								'user_id' => $this->user_id
							)
						);	

						$edit_product;
						if($edit_product_is_exists){
							$edit_product = $this->Ikinci_zincir_model->update(
								array(
									'product_number' => $this->session->userdata('product_number'),
									'user_id' => $this->user_id,
								),
								'edited_bicycles',
								array(
									'user_id' => $this->user_id,
									'product_number' => $this->session->userdata('product_number'),
									'slug' => $this->input->post('name'),
									'name' => $this->input->post('name', true),
									'bicycle_type' => $this->input->post('bicyle_type', true),
									'brand' => $this->input->post('brand', true),
									'model' => $this->input->post('model', true),
									'jant' => $this->input->post('jant', true),
									'cadre' => $this->input->post('cadre', true),
									'cadre_type' => $this->input->post('cadre_type', true),
									'front_brake' => $this->input->post('front_brake', true),
									'rear_brake' => $this->input->post('rear_brake', true),
									'year' => $this->input->post('year', true),
									'status' => $this->input->post('status', true),
									'phone_number' => $this->input->post('phone_number', true),
									'meet_location' => $this->input->post('meet_location', true),
									'price' => $this->input->post('price', true),
									'description' => $this->input->post('description', true),
									'advert_type' => 'bicycles',
									'is_active' => 1,
								)
							);
						}else{
							$edit_product = $this->Bicycle_model->add_edited_table(
								array(
									'user_id' => $this->user_id,
									'product_number' => $this->session->userdata('product_number'),
									'slug' => $this->input->post('name'),
									'name' => $this->input->post('name', true),
									'bicycle_type' => $this->input->post('bicyle_type', true),
									'brand' => $this->input->post('brand', true),
									'model' => $this->input->post('model', true),
									'jant' => $this->input->post('jant', true),
									'cadre' => $this->input->post('cadre', true),
									'cadre_type' => $this->input->post('cadre_type', true),
									'front_brake' => $this->input->post('front_brake', true),
									'rear_brake' => $this->input->post('rear_brake', true),
									'year' => $this->input->post('year', true),
									'status' => $this->input->post('status', true),
									'phone_number' => $this->input->post('phone_number', true),
									'meet_location' => $this->input->post('meet_location', true),
									'price' => $this->input->post('price', true),
									'description' => $this->input->post('description', true),
									'advert_type' => 'bicycles',
									'is_active' => 1,
									'is_edited' => 1,
								)
							);
						}

						if($edit_product){
							echo json_encode(array(true, message('success', 'İlanınız başarıyla güncellenmiştir')));
						}else{
							echo json_encode(array(true, message('danger', 'Beklenmedik bir hata oluştu lütfen tekrar deneyin')));
						}
					}

				}else{
					echo json_encode(array(false, 'Cant Found'));
				}

			}
		}else{
			$advert_is_exists = $this->Bicycle_model->get(
				array(
					'product_number' => $product_number,
					'user_id' => $this->user_id
				)
			);


			if($advert_is_exists->is_edited == 1){
				$advert_is_exists = $this->Ikinci_zincir_model->get(
					'edited_bicycles',
					array('product_number' => $product_number, 'user_id' => $this->user_id)
				);
			}

			if($advert_is_exists){
				$this->session->set_userdata('product_slug', $slug);
				$this->session->set_userdata('product_number', $product_number);
				$view_data = array('bicycle' => $advert_is_exists);
				$this->load->view('front/edit-page/edit-bicycle-page/index', $view_data);
			}else{
				redirect(base_url($_SERVER['HTTP_REFERER']));
			}
		}
	}

	function bicycle_image_is_exists($product_number, $image_id){
		$image_is_exists = $this->Bicycle_model->get_image_table(
			array(
				'product_number' => $product_number,
				'id' => $image_id
			)
		);
		if($image_is_exists){
			return true;
		}else{
			return false;
		}
	}

	function edit_image(){
		//
	}
	function deactive_image(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$product_number = $this->input->post('product_number', true);
			$image_id = $this->input->post('image_id', true);
			if($this->bicycle_image_is_exists($product_number, $image_id)){
				if($this->Bicycle_model->update_image_table(
					array('id' => $image_id),
					array('is_active' => 0)
				)){
					echo json_encode(true);
				}else{
					echo json_encode(false);
				}
			}
		}else{
			redirect(base_url($_SERVER['HTTP_REFERER']));
		}
	}
	function add_bicycle_image2(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$file_name = $this->file_manager->create_image_name($this->session->userdata('product_number'));
			$config['upload_path'] = FCPATH.'/assets/images/bicycle-images';
			$config['allowed_types'] = 'jpeg|gif|jpg|png';
			$config['max_size']  = '5000';
			$config['file_name'] = $file_name;


			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				echo json_encode(false);
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				$add_image = $this->Bicycle_model->add_bicycle_image(
					array(
						'product_number' => $this->session->userdata('product_number'),
						'is_active' => 1,
						'image_url' => 'assets/images/bicycle-images/'.$data['upload_data']['file_name'],
						'image_type' => $data['upload_data']['file_type'],
					)
				);
				if($add_image){
					echo json_encode(true);
				}else{
					echo json_encode(false);
				}
			}
		}
	}
}