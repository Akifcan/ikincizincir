<div class="blog-area pt-120 pb-130"> 
	<div class="container mt-5"> 
		<h1><?= $bicycle->name ?></h1>
		<div class="row">
			<? 
				$this->load->view('front/edit-page/edit-bicycle-page/includes/advert_info'); 
				$this->load->view('front/edit-page/edit-bicycle-page/includes/images'); 
			?>
		</div>
	</div>
</div>