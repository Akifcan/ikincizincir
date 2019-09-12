<?php 

	class Profile extends MY_CONTROLLER{

		function __construct(){
			parent::__construct();
			$this->load->model('Profile_model');
			$this->load->model('Auth_model');
		}

		function index($profile_slug){
			$user = $this->Auth_model->get_user(array('profile_slug' => $profile_slug));
			$products;
			if($user){
				$products = $this->Profile_model->union_products($user->id);
			}

			$view_data = array('products' => $products, 'user' => $user);
			$this->load->view('front/profile-page/index', $view_data);
		}

	}