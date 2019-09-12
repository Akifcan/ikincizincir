<div class="col-md-6">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<? $counter=0; foreach(get_product_images(1, $spare_part->product_number) as $product_image){ $counter++; ?>
				<? if($counter == 1){ ?>
					<div class="carousel-item active">
						<img 
						width="300" height="600" 
						class="d-block w-100" 
						src="<?= base_url($product_image->image_url) ?>" alt="<?= $spare_part->name ?>">
						<div class="carousel-caption d-none d-md-block">
							<h3 class="display-4 text-white bg-dark">1.Resim</h3>
							<p class="text-white lead bg-dark"><b>İlan</b> Ait 1.Resim</p>
							<? 
							$this->load->view('front/edit-page/includes/image_panel', 
								array('product' => $spare_part, 'form' => 'deactiveSparePartImage')
							) 
							?>
						</div>
					</div>
				<? } else { ?>
					<div class="carousel-item">
						<img width="300" height="600" class="d-block w-100" 
						src="<?= base_url($product_image->image_url) ?>" 
						alt="<?= $spare_part->name ?>">
						<div class="carousel-caption d-none d-md-block">
							<h3 class="display-4 text-white bg-dark">1.Resim</h3>
							<p class="text-white lead bg-dark"><b>İlan</b> Ait 1.Resim</p>
						</div>
					</div>
				<? } ?>
			<? } ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div id="dZUpload" class="dropzone">
		<div class="dz-default dz-message" data-toggle="tooltip" 
		data-placement="top" title="En Fazla 5 Fotoğraf - Kabul Edilen Türler: PNG|JPG|JPEG">
		<span class="dz-title">Resimlerinizi Buraya Sürükleyin</span>
	</div>
</div>
</div>