<div class="blog-area pt-120 pb-130"> 
	<div class="container mt-5">
		<? 
			if($user->type == 0){ //Personal
				$this->load->view('front/profile-page/includes/personal_profile'); 
			}else{
				$this->load->view('front/profile-page/includes/corparate_profile'); 
			}

		?>
	</div>
</div>