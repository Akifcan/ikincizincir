<?php 

class Validations{

	private $ci;
	function __construct(){
		$this->ci = & get_instance();
	}

	function rules_for_register(){
		$this->ci->form_validation->set_rules('username', 'Kullanıcı Adı', 
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('password', 'Şifre', 
			'required|xss_clean|trim|max_length[50]');
		$this->ci->form_validation->set_rules('email', 'E-Posta Adresi', 
			'required|xss_clean|valid_email|is_unique[users.email]|max_length[50]');

		$this->ci->form_validation->set_message('required', '%s alanı zorunludur');
		$this->ci->form_validation->set_message('max_length', '%s alanı en fazla 50 karakter');
		$this->ci->form_validation->set_message('is_unique', '%s zaten kayıt edilmiş');
		$this->ci->form_validation->set_message('valid_email', '%s adresini hatalı girdiniz');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_corparate_register(){
		$this->ci->form_validation->set_rules('username', 'Kullanıcı Adı', 
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('password', 'Şifre', 
			'required|xss_clean|trim|max_length[50]');
		$this->ci->form_validation->set_rules('email', 'E-Posta Adresi', 
			'required|xss_clean|valid_email|is_unique[users.email]|max_length[50]');
		$this->ci->form_validation->set_rules('province', 'İl', 'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('city', 'İlçe', 'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('phone_number', 'Telefon Numarası', 'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('meet_location', 'Adresiniz', 'required|xss_clean|min_length[10]|max_length[2000]');


		$this->ci->form_validation->set_message('required', '%s alanı zorunludur');
		$this->ci->form_validation->set_message('max_length', '%s alanı en fazla 50 karakter');
		$this->ci->form_validation->set_message('is_unique', '%s zaten kayıt edilmiş');
		$this->ci->form_validation->set_message('valid_email', '%s adresini hatalı girdiniz');
		$this->ci->form_validation->set_message('min_length', '%s alanı için en az 10 karakter girmelisiniz');


		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_login(){
		$this->ci->form_validation->set_rules('email', 'E-Posta', 'required|valid_email|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('password', 'Şifre', 'required|max_length[50]|trim|xss_clean');

		$this->ci->form_validation->set_message('required', '%s alanı doldurulmalıdır');
		$this->ci->form_validation->set_message('valid_email', '%s adresini yanlış yazdınız');
		$this->ci->form_validation->set_message('max_length', '%s alanı en fazla 50 karakter olmalıdır');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}

	}

	function rules_for_edit_contact(){
		$this->ci->form_validation->set_rules('phone_number', 'Telefon Numarası', 'required|max_length[13]|min_length[13]|xss_clean|trim');
		$this->ci->form_validation->set_rules('meet_location', 'Buluşma Noktası', 'required|max_length[2000]|min_length[10]|xss_clean');

		$this->ci->form_validation->set_message('required', '%s alanı doldurulmalıdır');


		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_edit_security(){
		$this->ci->form_validation->set_rules('email', 'E-Posta Adresi', 'required|max_length[50]|valid_email|xss_clean');

		$this->ci->form_validation->set_message('required', '%s alanı doldurulmalıdır');
		$this->ci->form_validation->set_message('max_length', '%s alanı en fazla 50 karakter olabilir');
		$this->ci->form_validation->set_message('valid_email', '%sni yanlış girdiniz');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_reset_password(){
		$this->ci->form_validation->set_rules('old_password', 'Eski Şifre', 'required|xss_clean|trim');
		$this->ci->form_validation->set_rules('new_password', 'Yeni Şifre','required|xss_clean|trim');

		$this->ci->form_validation->set_message('required', '%s alanı doldurulmalıdır');
		$this->ci->form_validation->set_message('max_length', 'Şifreniz en fazla 50 karakter olaiblir');
		$this->ci->form_validation->set_message('trim', 'Şifrenizde boşluk karakteri kullanmayın');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_add_bicycle(){
		$this->ci->form_validation->set_rules('name', 'İlan Başlığı',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('bicycle_type', 'Bisiklet Adı',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('bicycle_brand', 'Bisiklet Modeli',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('bicycle_type', 'Bisiklet Türü',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('status', 'Bisiklet Durumu',
			'required|xss_clean|max_length[50]');

		$this->ci->form_validation->set_rules('jant', 'Jant',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('cadre', 'Kadro',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('cadre_type', 'Kadro Türü',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('front_brake', 'Ön Fren',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('rear_brake', 'Arka Fren',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('year', 'Yıl',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('price', 'Fiyat',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('phone_number', 'Telefon Numarası',
			'required|xss_clean|max_length[50]|min_length[10]');
		$this->ci->form_validation->set_rules('meet_location', 'Buluşma Noktası',
			'required|xss_clean|min_length[10]');
		$this->ci->form_validation->set_rules('description', 'İlan Açıklaması',
			'required|xss_clean|max_length[2000]|min_length[10]');


		$this->ci->form_validation->set_message('required', '%s alanı doldurulmalıdır');
		$this->ci->form_validation->set_message('min_length', '%s alanı için daha ayrıntılı açıklama yazın');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_add_spare_part(){
		$this->ci->form_validation->set_rules('name', 'İlan Başlığı', 'required|max_length[50]');
		$this->ci->form_validation->set_rules('product_type', 'Ürün Tipi', 'required|max_length[50]');
		$this->ci->form_validation->set_rules('product_name', 'Ürün Adı', 'required|max_length[50]');
		$this->ci->form_validation->set_rules('part_type', 'Parça', 'required|max_length[50]');
		$this->ci->form_validation->set_rules('phone_number', 'Telefon Numarası', 'required|max_length[50]|min_length[10]');
		$this->ci->form_validation->set_rules('meet_location', 'Buluşma Noktası', 'required|max_length[2000]|min_length[10]');
		$this->ci->form_validation->set_rules('description', 'İlan Açıklaması', 'required|max_length[2000]|min_length[10]');
		$this->ci->form_validation->set_rules('price', 'Fiyat', 'required|max_length[50]');

		$this->ci->form_validation->set_message('required', '%s alanı doldurulmalıdır');
		$this->ci->form_validation->set_message('min_length', '%s alanı için daha ayrıntılı açıklama yazın');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_add_clothing(){
		$this->ci->form_validation->set_rules('name', 'İlan Başlığı', 'required|max_length[50]|xss_clean');
		$this->ci->form_validation->set_rules('brand', 'Marka', 'required|max_length[50]|xss_clean');
		$this->ci->form_validation->set_rules('size', 'Beden', 'required|max_length[50]|xss_clean');
		$this->ci->form_validation->set_rules('type', 'Ürün Tipi', 'required|max_length[50]|xss_clean');

		$this->ci->form_validation->set_rules('phone_number', 'Telefon Numarası', 'required|max_length[50]|min_length[10]|xss_clean');
		$this->ci->form_validation->set_rules('meet_location', 'Buluşma Noktası', 'required|max_length[2000]|min_length[10]|xss_clean');
		$this->ci->form_validation->set_rules('description', 'İlan Açıklaması', 'required|max_length[2000]|min_length[10]|xss_clean');
		$this->ci->form_validation->set_rules('price', 'Fiyat', 'required|max_length[50]|xss_clean');

		$this->ci->form_validation->set_message('required', '%s alanı doldurulmalıdır');
		$this->ci->form_validation->set_message('min_length', '%s alanı için daha ayrıntılı açıklama yazın');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_to_look_at(){
		$this->ci->form_validation->set_rules('product_number', 'Ürün Numarası', 'required|xss_clean');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}

	}

	function rules_for_edit_bicycle(){
		$this->ci->form_validation->set_rules('name', 'İlan Başlığı',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('brand', 'Bisiklet Modeli',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('bicyle_type', 'Bisiklet Türü',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('status', 'Bisiklet Durumu',
			'required|xss_clean|max_length[50]');

		$this->ci->form_validation->set_rules('jant', 'Jant',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('cadre', 'Kadro',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('cadre_type', 'Kadro Türü',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('front_brake', 'Ön Fren',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('rear_brake', 'Arka Fren',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('year', 'Yıl',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('price', 'Fiyat',
			'required|xss_clean|max_length[50]');
		$this->ci->form_validation->set_rules('phone_number', 'Telefon Numarası',
			'required|xss_clean|max_length[50]|min_length[10]');
		$this->ci->form_validation->set_rules('meet_location', 'Buluşma Noktası',
			'required|xss_clean|min_length[10]');
		$this->ci->form_validation->set_rules('description', 'İlan Açıklaması',
			'required|xss_clean|max_length[50]|min_length[10]');


		$this->ci->form_validation->set_message('required', '%s alanı doldurulmalıdır');
		$this->ci->form_validation->set_message('min_length', '%s alanı için daha ayrıntılı açıklama yazın');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}

	function rules_for_report_product(){
		$this->ci->form_validation->set_rules('table_name', 'table name', 'xss_clean|required|max_length[50]');
		$this->ci->form_validation->set_rules('product_number', 'product number', 'xss_clean|required|max_length[50]');
		$this->ci->form_validation->set_rules('report_reason', 'Rapor Sebebi ', 'xss_clean|required|max_length[50]');

		if($this->ci->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}

	}


}