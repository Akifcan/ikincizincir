<?php 

	class Ikinci_zincir extends CI_CONTROLLER{

		function __construct(){
			parent::__construct();
			$this->load->model('Ikinci_zincir_model');
		}

		function get_city(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$cities = $this->Ikinci_zincir_model->get_with_result(
					'cities',
					array('il_id' => $this->input->post('province_id', true))
				);
				if($cities){
					$render_data = array('render_type' => 'cities', 'data' => $cities);
					echo $this->load->view('front/renders/select_render', $render_data, true);
				}
			}
		}

	}