<? if($this->session->userdata('user')){ ?>
 <? if(!$product_detail->user_id == $this->session->userdata('user')->id){ ?>

 	<? if(!row_data_is_exists('reported_products', 
 	array('reporter' => $this->session->userdata('user')->id, 'product_number' => $product_detail->product_number))) { $this->load->view('front/product-page/product-detail-page/modal') ?>

 	<div>
 		<button 
 		class="btn btn-danger btn-sm reportButton" 
 		data-toggle="modal" data-target="#reportProductModal">
 		Bu ilanı rapor et
 	</button>
 </div>
<? } else { ?>
	<div>
		<button 
		class="btn btn-danger btn-sm reportButton" disabled>
		Bu ilanı raport etmişsiniz
	</button>
</div>
<? } ?>
<? } ?>
<? } ?>