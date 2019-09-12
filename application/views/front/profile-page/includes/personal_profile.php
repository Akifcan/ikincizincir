 
		<div class="row" align="center">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<img width="200" height="300" src="https://placekitten.com/200/300" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?= $user->username ?></h5>
						<p class="card-text">Bireysel Hesap.</p>
						<p  class="card-text"
							data-toggle="tooltip" data-placement="top" title="Telefon Numarası">
							<i class="fa fa-phone"></i>
							&nbsp; <?= $user->phone_number ?>
						</p>
						<a 
							data-toggle="tooltip" data-placement="top" title="Numarayı Ara"
							href="#" 
							class="btn btn-primary">
							<i class="fa fa-phone"></i>
						</a>
						<a 
							data-toggle="tooltip" data-placement="top" title="Whatsapp İle Mesaj Gönder"
							href="#" 
							class="btn btn-success">
							<i class="fa fa-whatsapp"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<h3 class="float-left">Verdiği İlanlar</h3>
				<table class="table table-striped mt-2">
					<thead>
						<th>İlan Başlığı</th>
						<th>Verilme Tarihi</th>
						<th><b>İlan Numarası</b></th>
						<th>Görüntüle</th>
					</thead>
					<tbody>
						<? foreach($products as $product){ ?>
							<tr>
								<td><?= $product->name ?></td>
								<td><?= $product->added_date ?></td>
								<td><?= $product->product_number ?></td>
								<td>
									<a target="_blank" href="<?= base_url("ilan/$product->slug/$product->advert_type") ?>">
										<button class="btn btn-success">
											<i class="fa fa-eye"></i>
										</button>	
									</a>
								</td>
							</tr>
						<? } ?>
					</tbody>
				</table>
			</div>
		</div>
	