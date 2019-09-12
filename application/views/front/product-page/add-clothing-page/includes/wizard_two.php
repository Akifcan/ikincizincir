<div id="wizard2" class="pt-3">
			<div class="form-group">
				<input 
				value="<?= $user->username ?>" 
				type="text"  
				data-toggle="tooltip" 
				data-placement="top" title="Bu ilanın sahibi sizsiniz">
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<input id="phoneNumber" value="<?= $user->phone_number ?>" type="text"  
					data-toggle="tooltip" 
					data-placement="top" title="Alıcıların Size Ulaşacağı Numara">
					
					<input id="price" class="mt-3" type="text"  
					placeholder="Fiyat Belirleyin">

					<input 
						class="mt-3"
						data-toggle="tooltip" 
						data-placement="top" title="İlan Numaranız"
						type="text" 
						readonly value="<?= $this->session->userdata('product_number'); ?>">
				</div>
				<div class="form-group col-md-6">
					<textarea 
						id="meetLocation" 
						rows="4" 
						data-toggle="tooltip" 
						data-placement="top" title="Alıcı İle Buluşma Noktanız">
						<?= $user->meet_location ?>
					</textarea>
					<textarea 
						id="description" 
						rows="4" 
						data-toggle="tooltip" 
						data-placement="top" title="İlan Açıklaması">
					</textarea>
					<button class="btn btn-light" id="addHref">Link Ekle</button>
			</div>
		</div>
		<div id="dZUpload" class="dropzone">
			<div class="dz-default dz-message" data-toggle="tooltip" 
			data-placement="top" title="En Fazla 5 Fotoğraf - Kabul Edilen Türler: PNG|JPG|JPEG">
			<span class="dz-title">Resimlerinizi Buraya Sürükleyin</span>
		</div>
		<div class="form-group">
			<button class="btn btn-success" id="addProduct">İlanımı Oluştur</button>
			<button class="btn btn-warning" id="showWizard1">İlk Sayfaya Geri Dön</button>
		</div>
	</div>
</div>