<div id="wizard1">
	<h3>Bisiklet İlanı Oluştur</h3>
	<div class="form-group pt-3">
		<input id="name" type="text" placeholder="İlan Başlığını Belirleyin" name="">
	</div>
	<div class="form-group pt-3">
		<select id="bicycleType">
			<option disabled>Bisikletinizin Türü</option>
			<option selected value="Dağ Bisikleti">Yol Bisikleti</option>
			<option selected value="Şehir Bisikleti">Yol Bisikleti</option>
			<option selected value="Yol Bisikleti">Yol Bisikleti</option>
			<option selected value="Katlanır Bisiklet">Yol Bisikleti</option>
		</select>
	</div>
	<div class="row">
		<div class="form-group pt-3 col-md-6">
			<select id="bicycleBrand">
				<option disabled>Bisikletinizin Markası</option>
				<? foreach(get_all('bicycle_brands') as $brand){ ?>
					<option value="<?= $brand->name ?>"><?= $brand->name ?></option>
				<? } ?>
			</select>
		</div>
		<div class="form-group pt-3 col-md-6">
			<select id="bicycleModel">
				<option disabled>Bisikletinizin Modeli</option>
				<option selected value="testModel">Test</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="form-group pt-3 col-md-4">
			<select id="jant">
				<option disabled>Jant Boyu</option>
				<option value="26">26</option>
				<option value="27.5">27</option>
				<option value="29">29</option>
			</select>
		</div>
		<div class="form-group pt-3 col-md-4">
			<select id="cadre">
				<option disabled>Kadro Boyu</option>
				<option value="38-41 165 170CM">38-41 165 170CM</option>
				<option value="41-43 170 175CM">41-43 170 175CM</option>
				<option value="43-46 - 175 180CM">43-46 - 175 180CM</option>
				<option value="46-48 180 185CM">46-48 180 185CM</option>
				<option value="48-53 - 175 180CM">48-53 - 175 180CM</option>
				<option value="53-56 - 190-195">53-56 - 190-195</option>
			</select>
		</div>
		<div class="form-group pt-3 col-md-4">
			<select id="cadreType">
				<option disabled>Kadro Türü</option>
				<option value="Aliminyum">Aliminyum</option>
				<option value="Çelik">Çelik</option>
				<option value="Karbon">Karbon</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="form-group pt-3 col-md-6">
			<select id="frontBrake">
				<option disabled>Ön Fren</option>
				<option value="V-FREN">V-FREN</option>
				<option value="U-FREN">U-FREN</option>
				<option value="MEKANİK DİSK">MEKANİK DİSK</option>
				<option value="HİDORLİK DİSK">HİDROLİK DİSK</option>
			</select>
		</div>
		<div class="form-group pt-3 col-md-6">
			<select id="rearBrake">
				<option disabled>Arka Fren</option>
				<option value="V-FREN">V-FREN</option>
				<option value="U-FREN">U-FREN</option>
				<option value="MEKANİK DİSK">MEKANİK DİSK</option>
				<option value="HİDORLİK DİSK">HİDROLİK DİSK</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="form-group pt-3 col-md-6">
			<select id="year">
				<option disabled>Model Yılı</option>
				<? for($i=2020; $i>=1900; $i--){ ?>
					<option selected><?= $i ?></option>
				<? } ?>
			</select>
		</div>
		<div class="form-group pt-3 col-md-6">
			<select id="status">
				<option disabled>Durumu</option>
				<option value="1.El">1.El</option>
				<option value="2.El">2.El</option>
			</select>
		</div>
	</div>
	<button class="col-md-12 btn btn-success mt-2" id="showWizard2">Devam Et 1/2</button>
</div>