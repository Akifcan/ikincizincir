<? if($product_detail->is_edited == 1){ ?>
	<div class="modal fade" id="showAdvertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $product_detail->name ?> isimli ilanın eklenen ilk hali.</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<? 
				if($table_name == 'bicycles'){ 
					$this->load->view('front/product-page/product-detail-page/first_version_of_bicycle');
				}else if($table_name == 'spare_parts'){
					$this->load->view('front/product-page/product-detail-page/first_version_of_spare_part');
				}
				?>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
				</div>
			</div>
		</div>
	</div>

	<div class="alert alert-info">Bu ilan daha sonradan düzenlenmiştir. 
		<a href="#" data-toggle="modal" data-target="#showAdvertModal">İlanın İlk Halini Görüntüle</a>
	</div>
	<? } ?>