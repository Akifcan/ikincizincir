<div class="col-md-6 mt-3">
	<form id="editSparePartForm">
		<div class="form-group">
			<label class="text-dark" id="name">İlan Adı</label>
			<input type="text" id="name" value="<?= $spare_part->name ?>">
		</div>
		<div class="form-group">
			<label class="text-dark">Ürün Tipi</label>
			<select id="productType">
				<option disabled>Seçin</option>
				<option value="productType" selected>tip</option>
			</select>
		</div>
		<div class="form-group">
			<label class="text-dark">Ürün Adı</label>
			<input type="text" value="<?= $spare_part->product_name ?>" id="productName">			
		</div>
		<div class="form-group">
			<label class="text-dark">Parça Tipi</label>
			<select id="partType">
				<option disabled>Seçin</option>
				<option value="partType" selected>model</option>
			</select>
		</div>
		<div class="form-group">
			<label class="text-dark">Telefon Numarası</label>
			<input type="text" value="<?= $spare_part->phone_number ?>" id="phoneNumber">
		</div>
		<div class="form-group">
			<label class="text-dark">Fiyat</label>
			<input type="text" value="<?= $spare_part->price ?>" id="price">
		</div>
		<div class="form-group">
			<label class="text-dark">Buluşma Noktası</label>
			<textarea id="meetLocation"><?= $spare_part->meet_location ?></textarea>
		</div>
		<div class="form-group">
			<label class="text-dark">İlan Açıklaması</label>
			<textarea id="description"><?= $spare_part->description ?></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info">İlanımı Güncelle</button>
			<button type="button" class="btn btn-danger">İlanımı Kaldır</button>
		</div>
		
	</form>
</div>