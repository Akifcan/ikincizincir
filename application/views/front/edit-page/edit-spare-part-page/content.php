<div class="blog-area pt-120 pb-130"> 
	<div class="container mt-5"> 
		<h1><?= $spare_part->name ?></h1>
		<div class="row">
			<? 
				$this->load->view('front/edit-page/edit-spare-part-page/includes/advert_info'); 
				$this->load->view('front/edit-page/edit-spare-part-page/includes/images'); 
			?>
		</div>
	</div>
</div>