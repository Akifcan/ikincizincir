<div class="blog-area pt-120 pb-130"> 
	<div class="container mt-5"> 
		<h1>İlanlarım</h1>
		<hr>
		<? $this->load->view('front/my-advert-page/includes/my_products'); ?>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<h3>Göz Atılan İlanlar</h3>
				<table class="table table-striped">
					<thead>
						<th></th>
						<th>İlan Adı</th>
						<th>İlan Numarası</th>
						<th>Görüntüle</th>
					</thead>
					<tbody>
						<? foreach($products_log as $product_log){ ?>
							<td>
								<? 
									$this->load->view('front/my-advert-page/includes/advert_types', 
									array('product_log' => $product_log, 'type' => 'product_log')) 
								?>
								
							</td>
							<td><?= $product_log[0]->name ?></td>
							<td><b><?= $product_log[0]->product_number ?></b></td>
							<td>
								<a href="">
									<button class="btn btn-success">Görüntüle</button>
								</a>
							</td>
						</tr>
					<? } ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<h3>Baklıcak İlanlar</h3>
			<table class="table table-striped">
				<thead>
					<th></th>
					<th>İlan Adı</th>
					<th>İlan Numarası</th>
					<th>Görüntüle</th>
				</thead>
				<tbody>
					<? foreach($to_look_at_products as $to_look_at_product){ ?>
						<tr>
							<td><? $this->load->view('front/my-advert-page/includes/advert_types', 
							array('type' => 'to_look_at', 'product' => $to_look_at_product)) ?></td>
							<td><?= $to_look_at_product[0]->name ?></td>
							<td><b><?= $to_look_at_product[0]->product_number ?></b></td>
							<td>
								<a href="">
									<button class="btn btn-success">Görüntüle</button>
								</a>
							</td>
						</tr>
					<? } ?>
				</tbody>
			</table>

		</div>
	</div>
</div>
</div>