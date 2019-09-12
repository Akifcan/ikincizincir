<div class="col-md-6 mt-3">
	<form id="editBicycleForm">
		<div class="form-group">
			<label class="text-dark" id="name">İlan Adı</label>
			<input type="text" id="name" value="<?= $bicycle->name ?>">
		</div>
		<div class="form-group">
			<label class="text-dark">Bisiklet Tipi</label>
			<select id="bicycleType">
				<option disabled>Seçin</option>
				<option value="editedType" selected>tip</option>
			</select>
		</div>
		<div class="form-group">
			<label class="text-dark">Marka</label>
			<select id="brand">
				<option disabled>Seçin</option>
				<option value="editedBrand" selected>Brand</option>
			</select>
		</div>
		<div class="form-group">
			<label class="text-dark">Model</label>
			<select id="model">
				<option disabled>Seçin</option>
				<option value="editedModel" selected>model</option>
			</select>
		</div>
		<div class="form-group">
			<label class="text-dark">Jant</label>
			<select id="jant">
				<option disabled>Seçin</option>
				<option value="editedjant" selected>jant</option>
			</select>
			
		</div>
		<div class="form-group">
			<label class="text-dark">Kadro</label>
			<select id="cadre">
				<option disabled>Seçin</option>
				<option value="editedcadre" selected>kadre</option>
			</select>
		</div>

		<div class="form-group">
			<label class="text-dark">Kadro Türü</label>
			<select id="cadreType">
				<option disabled>Seçin</option>
				<option value="editedcadre" selected>cadre</option>
			</select>
		</div>

		<div class="form-group">
			<label class="text-dark">Ön Fren</label>
			<select id="frontBrake">
				<option disabled>Seçin</option>
				<option value="editedfr" selected>brake</option>
			</select>
		</div>
		<div class="form-group">
			<label class="text-dark">Arka Fren</label>
			<select id="rearBrake">
				<option disabled>Seçin</option>
				<option value="editedrear" selected>editedrear</option>
			</select>
		</div>

		<div class="form-group">
			<label class="text-dark">Model Yılı</label>
			<select id="year">
				<option disabled>Seçin</option>
				<option value="editedyear" selected>Brand</option>
			</select>
		</div>
		<div class="form-group">
			<label class="text-dark">Durumu</label>
			<select id="status">
				<option disabled>Seçin</option>
				<option value="editedstatus" selected>Brand</option>
			</select>
		</div>
		<div class="form-group">
			<label class="text-dark">Telefon Numarası</label>
			<input type="text" value="<?= $bicycle->phone_number ?>" id="phoneNumber">
		</div>
		<div class="form-group">
			<label class="text-dark">Fiyat</label>
			<input type="text" value="<?= $bicycle->price ?>" id="price">
		</div>
		<div class="form-group">
			<label class="text-dark">Buluşma Noktası</label>
			<textarea id="meetLocation"><?= $bicycle->meet_location ?></textarea>
		</div>
		<div class="form-group">
			<label class="text-dark">İlan Açıklaması</label>
			<textarea id="description"><?= $bicycle->description ?></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info">İlanımı Güncelle</button>
			<button type="button" class="btn btn-danger">İlanımı Kaldır</button>
		</div>
		
	</form>
</div>