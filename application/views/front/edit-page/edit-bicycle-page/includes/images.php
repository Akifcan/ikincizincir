<div class="col-md-6">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">

			<? $counter=0; foreach(get_product_images(0, $bicycle->product_number) as $bicycle_image){ $counter++; ?>
				<? if($counter == 1){ ?>
					<div class="carousel-item active">
						<img width="300" height="600" class="d-block w-100" 
						src="<?= base_url($bicycle_image->image_url) ?>" alt="<?= $bicycle->name ?>">
						<div class="carousel-caption d-none d-md-block">
							<h3 class="display-4 text-white bg-dark"><?= $counter ?>.Resim</h3>
							<p class="text-white lead bg-dark">
								<b><?= $bicycle->name ?></b> İlanına Ait <?= $counter ?>.Resim
							</p>
						<? 
						$this->load->view('front/edit-page/includes/image_panel', 
							array(
								'product' => $bicycle_image, 'form' => 'deactiveBicycleImage', 
							)
						) 
						?>

					</div>
				</div>
			<? } else { ?>
				<div class="carousel-item">
					<img width="300" height="600" class="d-block w-100" 
					src="<?= base_url($bicycle_image->image_url) ?>" alt="<?= $bicycle->name ?>">
					<div class="carousel-caption d-none d-md-block">
						<h3 class="display-4 text-white bg-dark"><?= $counter ?>.Resim</h3>
						<p class="text-white lead bg-dark"><b><?= $bicycle->name ?></b> İlanına Ait <?= $counter ?>.Resim</p>
					<? 
					$this->load->view('front/edit-page/includes/image_panel', array('product' => $bicycle_image, 'form' => 'deactiveBicycleImage')) 
					?>
				</div>
			</div>
		<? } 
	} ?>
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
<p class="text-info"><?= 5-get_table_count('bicycle_images', array('product_number' => $bicycle->product_number)); ?> Resim Daha Ekleyebilirsiniz.</p>
<div id="dZUpload" class="dropzone">
	<div class="dz-default dz-message" data-toggle="tooltip" 
	data-placement="top" title="En Fazla 5 Fotoğraf - Kabul Edilen Türler: PNG|JPG|JPEG">
	<span class="dz-title">Resimlerinizi Buraya Sürükleyin</span>
</div>
</div>
</div>

