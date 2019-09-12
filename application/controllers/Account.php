<?php 

class Account extends MY_CONTROLLER{

	private $user_info;
	private $user_id;
	private $error_message = 'Beklenmedik bir hata oluştu lütfen tekrar deneyin';
	private $success_message = 'Bilgileriniz güncellenmiştir';
	function __construct(){
		parent::__construct();
		$this->load->library('Validations');
		$this->load->model('Account_model');
		$this->load->model('Auth_model');
		$this->load->model('Ikinci_zincir_model');
		$this->user_info = $this->session->userdata('user');
		$this->user_id = $this->session->userdata('user')->id;
	}

	function update_session(){
		$new_user_info = $this->Auth_model->get_user(
			array(
				'id' => $this->user_info->id
			) 
		);
		$this->session->set_userdata('user', $new_user_info);
	}

	function index(){
		$view_data = array('user' => $this->user_info);
		$this->load->view('front/account-page/index', $view_data);
	}

	function edit_contact(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_edit_contact() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
				create_log(1, array(
					'user_id'  => $this->user_info->id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'status' => 'Validation Error',
					'error_message' => validation_errors(),
				));
			}else{
				$edit_contact = $this->Account_model->update(
					array(
						'id' => $this->user_info->id,
					),
					array(
						'phone_number' => $this->input->post('phone_number', true),
						'meet_location' => $this->input->post('meet_location', true),
					)
				);

				if($edit_contact){
					echo json_encode(array(true, message('info', $this->success_message)));
					$this->update_session();
					create_log(1, array(
						'user_id'  => $this->user_info->id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'status' => 'Success Edit Contact',
					));
				}else{
					echo json_encode(array(false, message('danger', $this->error_message)));
					create_log(1, array(
						'user_id'  => $this->user_info->id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'status' => 'Unsuccess Edit Contact',
						'error_message' => $this->error_message
					));
				}

			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function edit_security(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_edit_security() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
				create_log(1, array(
					'user_id'  => $this->user_info->id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'status' => 'Validation Error',
					'error_message' => validation_errors(),
				));
			}else{
				$edit_secruity = $this->Account_model->update(
					array('id' => $this->user_info->id),
					array('email' => $this->input->post('email', true))
				);

				if($edit_secruity){
					echo json_encode(array(true, message('info', $this->success_message)));
					$this->update_session();
					create_log(1, array(
						'user_id'  => $this->user_info->id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'status' => 'Success Edit Security',
					));
				}else{
					echo json_encode(array(true, message('info', $this->error_message)));
					create_log(1, array(
						'user_id'  => $this->user_info->id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'status' => 'Unsuccess Edit Security',
						'error_message' => $this->error_message,
					));
				}
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function deactive_account(){
		$deactive_account = $this->Account_model->update(
			array('id' => $this->user_info->id),
			array('is_active' => 0)
		);	

		if($deactive_account){
			flash_message('info', 'Hesabınız Devre Dışı Bırakılmıştır. Bize ulaşarak hesabınzı aktifleştirebilirsiniz');
			redirect(base_url('giris'));
		}
	}

	function reset_password(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_reset_password() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
				create_log(1, array(
					'user_id'  => $this->user_info->id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'status' => 'Unsuccess Edit Password',
					'error_message' => validation_errors(),
				));
			}else{
				$password_is_true = $this->Auth_model->get_user(
					array(
						'id' => $this->user_info->id,
						'password' => do_hash($this->input->post('old_password', true), 'md5') 
					)
				);

				if($password_is_true){
					$update_password = $this->Account_model->update(
						array('id' => $this->user_info->id),
						array('password' => do_hash($this->input->post('new_password'), 'md5'))
					);
					if($update_password){
						echo json_encode(array(true, message('success', 'Şifreniz başarıyla güncellenmiştir')));
						$this->update_session();
						create_log(1, array(
							'user_id'  => $this->user_info->id,
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'status' => 'Success Edit Password',
						));
					}
				}else{
						echo json_encode(array(true, message('danger', 'Eski şifrenizi hatalı girdiniz')));
						create_log(1, array(
							'user_id'  => $this->user_info->id,
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'status' => 'UnSuccess Edit Password',
							'error_message' => 'Eski şifrenizi yanlış girdiniz',	
						));
					}
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function my_products(){
		$products = $this->Ikinci_zincir_model->union_products();
		$products_log = $this->Ikinci_zincir_model->products_log();	
		$to_look_at_products = $this->Ikinci_zincir_model->to_look_at_products();
		$view_data = array(
			'products' => $products, 
			'products_log' => $products_log,
			'to_look_at_products' => $to_look_at_products,
		);
		$this->load->view('front/my-advert-page/index', $view_data);

	}

}














