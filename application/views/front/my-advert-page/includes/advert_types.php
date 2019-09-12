<? if($type == 'product_log'){ ?>

	<? if($product_log[0]->advert_type == 'bicycles'){ ?>
		<button class="btn btn-info" 
		data-toggle="tooltip" 
		title="Bisiklet İlanı"><i class="fa fa-bicycle"></i>
	</button>
<? }else if($product_log[0]->advert_type == 'spare_parts'){ ?>
	<button class="btn btn-warning" 
	data-toggle="tooltip" 
	title="Yedek Parça İlanı"><i class="fa fa-anchor"></i>
</button>
<? } else if($product_log[0]->advert_type == 'clothings'){ ?>
	<button class="btn btn-warning" 
	data-toggle="tooltip" 
	title="Kıyafet/Güvenlik Ekipmanı İlanı"><i class="fa fa-tshirt"></i>
</button>
<? } ?>

<? } else if($type == 'my_products'){ ?>
	
	<? if($product->advert_type == 'bicycles'){ ?>
		<button class="btn btn-info" 
		data-toggle="tooltip" 
		title="Bisiklet İlanı"><i class="fa fa-bicycle"></i>
	</button>
<? }else if($product->advert_type == 'spare_parts'){ ?>
	<button class="btn btn-warning" 
	data-toggle="tooltip" 
	title="Yedek Parça İlanı"><i class="fa fa-anchor"></i>
</button>
<? } else if($product->advert_type == 'clothings'){ ?>
	<button class="btn btn-warning" 
	data-toggle="tooltip" 
	title="Kıyafet/Güvenlik Ekipmanı İlanı"><i class="fa fa-tshirt"></i>
</button>
<? } ?>

<? } else if($type == 'to_look_at'){ ?>
	<? if($product[0]->advert_type == 'bicycles'){ ?>
		<button class="btn btn-info" 
		data-toggle="tooltip" 
		title="Bisiklet İlanı"><i class="fa fa-bicycle"></i>
	</button>
<? }else if($product[0]->advert_type == 'spare_parts'){ ?>
	<button class="btn btn-warning" 
	data-toggle="tooltip" 
	title="Yedek Parça İlanı"><i class="fa fa-anchor"></i>
</button>
<? } else if($product[0]->advert_type == 'clothings'){ ?>
	<button class="btn btn-warning" 
	data-toggle="tooltip" 
	title="Kıyafet/Güvenlik Ekipmanı İlanı"><i class="fa fa-tshirt"></i>
</button>
<? } ?>

<? } ?>
