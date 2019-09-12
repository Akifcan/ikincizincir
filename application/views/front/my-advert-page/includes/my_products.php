<table class="table table-striped">
	<thead>
		<th></th>
		<th>İlan Adı</th>
		<th>İlan Numarası</th>
		<th>Verilme Tarihi</th>
		<th>Görüntüle</th>
	</thead>
	<tbody>
		<? foreach($products as $product){ ?>
			<tr>
				<td><? $this->load->view('front/my-advert-page/includes/advert_types', array('type' => 'my_products', 'product' => $product)) ?></td>
				<td><?= $product->name ?></td>
				<td><b><?= $product->product_number ?></b></td>
				<td><?= $product->added_date ?></td>
				<td>
					<a href="">
						<button class="btn btn-success">Görüntüle</button>
					</a>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>