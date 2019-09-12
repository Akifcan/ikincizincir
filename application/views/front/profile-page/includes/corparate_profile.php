	<div class="row">
		<div class="col-md-6">
			<h1><?= ucfirst($user->username) ?></h1>
			<p>
				<i class="fa fa-home fa-2x"></i>
				<?= $user->province ?> - <?= $user->city ?>
			</p>			
			<p>
				<i class="fa fa-location-arrow fa-2x"></i>
				<?= $user->meet_location ?>
			</p>			
			<p>
				<i class="fa fa-phone fa-2x"></i>
				<?= $user->phone_number ?>
			</p>			
		</div>
		<div class="col-md-6">
			<img src="https://placekitten.com/200/300" class="float-right">			
		</div>
	</div>

	<hr>

	<div class="row" align="center">
		<div class="col-md-10">
			<div class="row">
				<? foreach($products as $product){ ?>
					<? 
					$img_thumb;
					if($product->advert_type == 'bicycles'){
						$img_thumb = get_product_thumb(0, $product->product_number); 
					}else if($product->advert_type == 'spare-parts'){
						$img_thumb = get_product_thumb(1, $product->product_number); 					
					}else if($product->advert_type == 'clothings'){
						$img_thumb = get_product_thumb(2 ,  $product->product_number); 			
					}
					?>
					<div class="col-md-5">
						<div class="card" style="width: 18rem;">
							<img src="<?= base_url($img_thumb) ?>" class="card-img-top" alt="İkinci Zinir <?= $user->username ?>">
							<div class="card-body">
								<h5 class="card-title"><?= $product->name ?></h5>
								<p class="card-text"><?= word_limiter($product->description, 50) ?></p>
								<a target="_blank" href="<?= base_url("ilan/$product->slug/$product->advert_type") ?>" class="btn btn-primary">
									Detaylı Görüntüle
								</a>
							</div>
						</div>
					</div>
				<? } ?>
			</div>
		</div>
		<div class="col-md-2">
			<ul class="list-group-item">
				<li class="list-group-item">
					<a href="#">Facebook</a>
				</li>
				<li class="list-group-item">
					<a href="#">Twitter</a>
				</li>
			</ul>
		</div>
	</div>