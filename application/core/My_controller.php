<?php 

	class My_controller extends CI_CONTROLLER{

		function __construct(){
			parent::__construct();
			if(!$this->session->userdata('user')){
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

	}