	<? 
	$product_first_version = get($table_name, array('product_number' => $product_detail->product_number)); 
	?>


	<div class="modal-body">
		<div class="row">
			<table class="table-striped col-md-6">
				<tr>
					<th class="w-50">İlan Adı</th>
					<td class="w-50"><?= $product_first_version->name ?></td>
				</tr>
				<tr>
					<th class="w-50">Bisiklet Tipi</th>
					<td class="w-50"><?= $product_first_version->bicycle_type ?></td>
				</tr>
				<tr>
					<th class="w-50">Marka</th>
					<td class="w-50"><?= $product_first_version->brand ?></td>
				</tr>
				<tr>
					<th class="w-50">Model</th>
					<td class="w-50"><?= $product_first_version->model ?></td>

				</tr>
				<tr>
					<th class="w-50">Jant</th>
					<td class="w-50"><?= $product_first_version->jant ?></td>
				</tr>
				<tr>
					<th class="w-50">Kadro Boyu</th>
					<td class="w-50"><?= $product_first_version->cadre ?></td>
				</tr>
				<tr>
					<th class="w-50">Ön Fren</th>
					<td class="w-50"><?= $product_first_version->front_brake ?></td>
				</tr>
				<tr>
					<th class="w-50">Arka Fren</th>
					<td class="w-50"><?= $product_first_version->rear_brake ?></td>
				</tr>
				<tr>
					<th class="w-50">Yıl</th>
					<td class="w-50"><?= $product_first_version->year ?></td>
				</tr>
				<tr>
					<th class="w-50">Durumu</th>
					<td class="w-50"><?= $product_first_version->status ?></td>
				</tr>
				<tr>
					<th class="w-50">Telefon Numarası</th>
					<td class="w-50"><?= $product_first_version->phone_number ?></td>
				</tr>
				<tr>
					<th class="w-50">Buluşma Noktası</th>
					<td class="w-50"><?= $product_first_version->meet_location ?></td>
				</tr>
				<tr>
					<th class="w-50">Fiyat</th>
					<td class="w-50"><?= $product_first_version->price ?></td>
				</tr>
				<tr>
					<th class="w-50">İlan Açıklaması</th>
					<td class="w-50"><?= $product_first_version->description ?></td>
				</tr>
				<tr>
					<th class="w-50">Eklenme Tarihi</th>
					<td class="w-50"><?= $product_first_version->added_date ?></td>
				</tr>
			</table>
			<div class="col-md-6">
				<div id="carouselExampleIndicators" class="carousel slide ml-3" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img width="300" height="300" class="d-block w-100" src="https://placekitten.com/200/300" alt="First slide">
						</div>
						<div class="carousel-item">
							<img width="300" height="300" class="d-block w-100" src="https://placekitten.com/250/300" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img width="300" height="300" class="d-block w-100" src="https://placekitten.com/250/350" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>	
		</div>
	</div>