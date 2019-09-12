<div id="wizard1">
	<h3>Kıyafet/Güvenlik İlanı Oluştur</h3>
	<div class="form-group pt-3">
		<input id="name" type="text" placeholder="İlan Başlığını Belirleyin" name="">
	</div>
	<div class="row">
		<div class="form-group col-md-6">
			<select id="brand">
				<option disabled>Ürünün Markası</option>
				<? foreach(get_result('brands', array('brand_type' => 'clothing'), 'name asc') as $clothing){ ?>
					<option value="<?= $clothing->name ?>"><?= $clothing->name ?></option>
				<? } ?>
			</select>
		</div>
		<div class="form-group col-md-6">
			<select id="size">
				<option disabled>Ürünün Bedeni</option>
				<option selected value="Small">Small</option>
				<option selected value="Medium">Medium</option>
				<option selected value="Large">Large</option>
				<option selected value="XX Large">XX Large</option>
			</select>
		</div>
	</div>
	<div class="form-group pt-3">
		<select id="type">
			<option disabled>Ürün Türü</option>
			<? foreach(get_result('part_types', array('part_type' => 'clothing'), 'name asc') as $part_type){ ?>
					<option value="<?= $part_type->name ?>"><?= $part_type->name ?></option>
				<? } ?>
		</select>
	</div>
	<button class="col-md-12 btn btn-success mt-2" id="showWizard2">Devam Et 1/2</button>
</div>