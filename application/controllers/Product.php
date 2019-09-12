<?php 

	class Product extends MY_CONTROLLER{

		function __construct(){
			parent::__construct();
		}

		function index(){
			$this->load->view('front/product-page/select-advert-type-page/index');
		}

	}