<div id="wizard1">
	<h3>Yedek Parça İlanı Oluştur</h3>

	<div class="form-group pt-3">
		<input id="name" type="text" placeholder="İlan Başlığını Belirleyin">
	</div>

	<div class="form-group pt-3">
		<select id="productType">
			<option selected disabled>Ürün Türünü Seçin</option>
			<? foreach(get_result('part_types', array('part_type' => 'spare_part'), 'name asc') as $clothing){ ?>
				<option value="<?= $clothing->name ?>"><?= $clothing->name ?></option>
			<? } ?>
		</select>
	</div>

	<div class="row">
		<div class="form-group pt-3 col-md-6">
			<select id="productName">
				<option selected disabled>Ürün Adı</option>
				<? foreach(get_result('brands', array('brand_type' => 'spare_part'), 'name asc') as $clothing){ ?>
					<option value="<?= $clothing->name ?>"><?= $clothing->name ?></option>
				<? } ?>
			</select>
		</div>
		<div class="form-group pt-3 col-md-6">
			<select id="partType">
				<option selected disabled>Malzeme Türü</option>
				<option selected value="testPartType"></option>
			</select>
		</div>
	</div>
	<button class="col-md-12 btn btn-success mt-2" id="showWizard2">Devam Et 1/2</button>
</div>