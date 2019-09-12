<?php 

class Auth extends CI_CONTROLLER{


	private $user_info;
	function __construct(){
		parent::__construct();
		$this->load->library('Validations');
		$this->load->model('Auth_model');
		if($this->session->userdata('user')){
			$this->user_info = $this->session->userdata('user');
		}
	}

	function index(){
		$this->load->view('front/auth-page/index');
	}

	function register_corparate(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_corparate_register() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
			}else{
				$create_user = $this->Auth_model->create_user(
					array(
						'username' => $this->input->post('username', true),
						'email' => $this->input->post('email', true),
						'password' => $this->input->post('password', true),
						'province' => $this->input->post('province', true),
						'city' => $this->input->post('city', true),
						'phone_number' => $this->input->post('phone_number', true),
						'profile_slug' => slug($this->input->post('username', true)),
						'corparate_email' => slug($this->input->post('username')).'@ikincizincir.com',
						'meet_location' => $this->input->post('meet_location', true),
						'type' => 1,
						'is_active' => 1,
					)
				);
				if($create_user){
					$user = $this->Auth_model->get_user(array('id' => $this->db->insert_id()));
					$this->session->set_userdata('user', $user);
					$this->session->set_flashdata('new_user', message('success', "Hoşgeldiniz <b>$user->username</b>. Belirlediğiniz e-posta ve şifre ile İkinci Zincir'e giriş yapabilirsiniz."));
					echo json_encode(array(true));
				}
			}
		}else{
			$this->load->view('front/auth-page/corparate-register-page/index');
		}
	}

	function register(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_register() == FALSE){
				echo json_encode(array(false, message('info', validation_errors())));
			}else{
				$create_user = $this->Auth_model->create_user(
					array(
						'username' => $this->input->post('username', true),
						'email' => $this->input->post('email', true),
						'password' => do_hash($this->input->post('password', true), 'md5'),
						'is_active' => 1,
					)
				);
				if($create_user){
					$user = $this->Auth_model->get_user(
						array('id' => $this->Auth_model->get_last_id())
					);
					$this->session->set_userdata('user', $user);
					create_log(0, array(
						'user_id' => $this->db->insert_id(),
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'status' => 'Registiration Success',
					));  
					echo json_encode(array(true));
				}
			}
		}else{	
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function login(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->validations->rules_for_login() == FALSE){
				create_log(0, array(
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'status' => 'Validation Error',
					'error_message' => validation_errors(),
				)); 
				echo json_encode(array(false, message('info', validation_errors())));
			}else{
				$user_exists = $this->Auth_model->get_user(
					array(
						'email' => $this->input->post('email', true),
						'password' => do_hash($this->input->post('password', true),'md5'),
						'is_active' => 1,
					)
				);

				if($user_exists){						
					$this->session->set_userdata('user', $user_exists);
					create_log(0, array(
						'user_id' => $user_exists->id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'status' => 'Login',
					)); 
					echo json_encode(array(true)); 
				}else{
					create_log(0, array(
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'status' => 'Login Failed',
						'error_message' => 'Not Found User',
					));  
					echo json_encode(array('not_exists', message('danger', 'Böyle bir kullanıcı bulunamadı')));
				}
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function logout(){
		create_log(0, array(
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'status' => 'Logout',
		)); 
		$this->session->sess_destroy('user');
		redirect(base_url('giris'));
	}


}