<?php 

class Profile_model extends CI_MODEL{

	function __construct(){
	}

	function union_products($user_id){
		return $this->db->query("SELECT name, product_number, slug, added_date, advert_type, description FROM bicycles where user_id=$user_id and is_active = 1 UNION  SELECT name, product_number, slug, added_date,advert_type, description FROM spare_parts where user_id=$user_id and is_active = 1 UNION  SELECT name, product_number, slug, added_date, advert_type, description FROM clothings where user_id=$user_id and is_active = 1")->result();

	}


}