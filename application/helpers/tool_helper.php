<?

function message($type, $message){
	return "<div class='alert alert-$type'>$message</div>";
}

function flash_message($type, $message){
	$ci = & get_instance();
	return $ci->session->set_flashdata('status', "<div class='alert alert-$type'>$message</div>");
}

function create_log($table_number, $data=array()){
		//0 Auth Log
	$log_tables = ['auth_log', 'account_log'];
	$ci = & get_instance();
	return $ci->db->insert($log_tables[$table_number], $data);
}

function get_all($table_name, $limit=null){
	$ci = & get_instance();
	return $ci->db->select('*')
	->from($table_name)
	->limit($limit)
	->get()->result();
}

function get_result($table_name, $where=array(), $order_by='id asc'){
	$ci = & get_instance();
	return $ci->db->select('*')
	->from($table_name)
	->where($where)
	->order_by($order_by)
	->get()->result();
}

function get($table_name, $where=array()){
	$ci = & get_instance();
	return $ci->db->select('*')
	->from($table_name)
	->where($where)
	->get()->row();
}

function row_data_is_exists($table_name, $where=array()){
	$ci = & get_instance();
	$result = $ci->db->select('*')
				  ->from($table_name)
				  ->where($where)
				  ->get()->row();
	if($result){
		return true;
	}else{
		return false;
	}
}

function slug($text){
	$find = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/");
	$degis = array("G","U","S","I","O","C","g","u","s","i","o","c");
	$text = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$text);
	$text = preg_replace($find,$degis,$text);
	$text = preg_replace("/ +/"," ",$text);
	$text = preg_replace("/ /","-",$text);
	$text = preg_replace("/\s/","",$text);
	$text = strtolower($text);
	$text = preg_replace("/^-/","",$text);
	$text = preg_replace("/-$/","",$text);
	return $text;
}

function get_product_thumb($table_index, $product_number){
	//0 Bicycle Images Table
	//1 Spare Part Images Table
	//2 Clothing Images Table
	$tables = ['bicycle_images', 'spare_part_images', 'clothing_images'];
	$ci = & get_instance();
	$thumb = $ci->db->select('image_url')
	->from($tables[$table_index])
	->where('product_number', $product_number)
	->where('is_active', 1)
	->get()->row();
	return $thumb->image_url;
}

function get_product_images($table_index, $product_number){
		//0 Bicycle Images Table
	//1 Spare Part Images Table
	//2 Clothing Images Table
	$ci = & get_instance();
	$tables = ['bicycle_images', 'spare_part_images', 'clothing_images'];
	$images = $ci->db->select('*')
	->from($tables[$table_index])
	->where('product_number', $product_number)
	->where('is_active', 1)
	->get()->result();
	return $images;

}

function get_table_count($table_name, $where=null){
	$ci = & get_instance();
	if($where){
		return $ci->db->select('*')
				->from($table_name)
				->where($where)
				->count_all_results();
	}else{
			return $ci->db->select('*')
					->from($table_name)
				->count_all_results();

	}
}


