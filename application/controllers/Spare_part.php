<?php 

class Spare_part extends MY_CONTROLLER{

	private $user_info;
	private $user_id;
	function __construct(){
		parent::__construct();
		$this->load->library('Validations');
		$this->load->model('Ikinci_zincir_model');
		$this->user_info = $this->session->userdata('user');
		$this->user_id = $this->session->userdata('user')->id;
	}

	function index(){
		$this->session->set_userdata('product_number', 'IZ'.rand(2000, 9999));
		$view_data = array('user' => $this->user_info);
		$this->load->view('front/product-page/add-spare-part-page/index', $view_data);

	}

	function add_spare_part(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_add_spare_part() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
			}else{
					
				$slug = slug($this->input->post('name').'-'.$this->input->post('id'));
				$add_spare_part = $this->Ikinci_zincir_model->add(
					'spare_parts',
					array(
						'user_id' => $this->user_info->id,
						'product_number' => $this->session->userdata('product_number'),
						'name' => $this->input->post('name', true),
						'product_type' => $this->input->post('product_type', true),
						'product_name' => $this->input->post('product_name', true),
						'part_type' => $this->input->post('part_type', true),
						'phone_number' => $this->input->post('phone_number', true),
						'meet_location' => $this->input->post('meet_location', true),
						'description' => $this->input->post('description', true),
						'price' => $this->input->post('price', true),
						'is_active' => 1,
						'slug' => $slug,
						'advert_type' => 'spare_parts',
					)
				);

				if($add_spare_part){
					echo json_encode(array(true, $slug, 'spare_parts'));
				}else{
					echo json_encode(array(false, array('danger', 'Beklenmedik bir hata oluştu lütfen tekrar deneyin')));
				}

			}
		}else{
			redirect(base_url($_SERVER['HTTP_REFERER']));
		}
	}

	function add_spare_part_image(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$config['upload_path'] = FCPATH.'/assets/images/spare-part-images';
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
				$add_spare_part_image = $this->Ikinci_zincir_model->add(
					'spare_part_images',
					array(
						'product_number' => $this->session->userdata('product_number'),
						'image_url' => 'assets/images/spare-part-images/'.$data['upload_data']['file_name'],
						'is_active' => 1,
					)
				);
				if($add_spare_part_image){
					echo json_encode(true);
				}
			}
		}else{
			redirect(base_url($_SERVER['HTTP_REFERER']));
		}
	}

	function edit_spare_part($slug=null, $product_number=null){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_add_spare_part() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
			}else{


				$product_is_exists = $this->Ikinci_zincir_model->get(
					'spare_parts',
					array(
						'user_id' => $this->user_id, 
						'product_number' => $this->session->userdata('product_number'),
					)
				);


				if($product_is_exists){
					$edit_update_status = $this->Ikinci_zincir_model->update(
						array('product_number' => $this->session->userdata('product_number')),
						'spare_parts',
						array('is_edited' => 1)
					);
					if($edit_update_status){

						$edit_product_is_exists = $this->Ikinci_zincir_model->get(
							'edited_spare_parts',
							array(
								'product_number' => $this->session->userdata('product_number'),
								'user_id' => $this->user_id,
							)
						);
						if($edit_product_is_exists){
							$edit_product = $this->Ikinci_zincir_model->update(
								array(
									'product_number'  => $this->session->userdata('product_number'),
									'user_id'  => $this->user_id,
								),
								'edited_spare_parts',
								array(
									'user_id' => $this->user_id,
									'product_number' => $this->session->userdata('product_number'),
									'slug' => slug($this->input->post('name', true)),
									'name' => $this->input->post('name', true),
									'product_type' => $this->input->post('product_type', true),
									'product_name' => $this->input->post('product_name', true),
									'part_type' => $this->input->post('part_type', true),
									'phone_number' => $this->input->post('phone_number', true),
									'meet_location' => $this->input->post('meet_location', true),
									'price' => $this->input->post('price', true),
									'description' => $this->input->post('description', true),
									'advert_type' => 'spare_parts',
									'is_active' => 1,
								)
							);
							if($edit_product){
								echo json_encode(array(true, message('success', 'İlanınız başarıyla güncellenmiştir')));
							}else{
								echo json_encode(array(true, message('danger', 'Beklenmedik bir hata oluştu lütfen tekrar deneyin')));
							}
						}else{
							$edit_product = $this->Ikinci_zincir_model->add(
								'edited_spare_parts',
								array(
									'user_id' => $this->user_id,
									'product_number' => $this->session->userdata('product_number'),
									'slug' => slug($this->input->post('name', true)),
									'name' => $this->input->post('name', true),
									'product_type' => $this->input->post('product_type', true),
									'product_name' => $this->input->post('product_name', true),
									'part_type' => $this->input->post('part_type', true),
									'phone_number' => $this->input->post('phone_number', true),
									'meet_location' => $this->input->post('meet_location', true),
									'price' => $this->input->post('price', true),
									'description' => $this->input->post('description', true),
									'advert_type' => 'spare_parts',
									'is_active' => 1,
								)
							);
							if($edit_product){
								echo json_encode(array(true, message('success', 'İlanınız başarıyla güncellenmiştir')));
							}else{
								echo json_encode(array(true, message('danger', 'Beklenmedik bir hata oluştu lütfen tekrar deneyin')));
							}
						}
					}

				}else{
					echo json_encode(array(false, 'Cant Found'));
				}

			}
		}else{

			$advert_is_exists = $this->Ikinci_zincir_model->get(
				'spare_parts',
				array(
					'product_number' => $product_number,
					'user_id' => $this->user_id
				)
			);


			if($advert_is_exists->is_edited == 1){
				$advert_is_exists = $this->Ikinci_zincir_model->get(
					'edited_spare_parts',
					array(
						'user_id' => $this->user_id,
						'product_number' => $product_number,
					)
				);
			}
			if($advert_is_exists){
				$this->session->set_userdata('product_slug', $slug);
				$this->session->set_userdata('product_number', $product_number);
				$view_data = array('spare_part' => $advert_is_exists);
				$this->load->view('front/edit-page/edit-spare-part-page/index', $view_data);
			}else{
				redirect(base_url($_SERVER['HTTP_REFERER']));
			}
		}
	}

	function deactive_image(){
		$image_is_exists = $this->Ikinci_zincir_model->get(
			'spare_part_images',
			array(
				'id' => $this->input->post('image_id', true),
				'product_number' => $this->input->post('product_number', true),
			)
		);
		if($image_is_exists){
			$deactive_image = $this->Ikinci_zincir_model->update(
				array('product_number' => $this->input->post('product_number', true)),
				'spare_part_images',
				array('is_active' => 0)
			);
			if($deactive_image){
				echo json_encode(true);
			}else{
				echo json_encode(false);
			}
		}
	}


}