
<div id="securitySettings" class="mt-2">
	<div id="messageSecurity"></div>
	<form id="securityForm">
		<div class="row">
			<div class="form-group col-md-6">
				<label>Hesap Adınız</label>
				<input
				value="<?= $user->username  ?>" 
				readonly
				type="text" 
				data-toggle="tooltip" 
				data-placement="top" title="Hesap Adını Değiştiremezsiniz">
			</div>
			<div class="form-group col-md-6">
				<label>E-Posta Adresiniz</label>
				<input 
				id="email"
				value="<?= $user->email ?>" 
				type="text">
			</div>
			<div class="form-group col-md-6">
				<button type="submit" class="btn btn-outline-success">Değişiklikleri Kaydet</button>
			</div>
		</div>
	</form>



	<div class="row">
		<div class="form-group col-md-6">
			<label>Eski Şifreniz</label>
			<input 
			id="oldPassword"
			maxlength="50" 
			type="password"> 
		</div>
		<div class="form-group col-md-6">
			<label>Yeni Şifreniz</label>
			<input 
			id="newPassword" 
			maxlength="50" 
			type="password">
		</div>
		<div class="form-group col-md-12">
			<button 
			type="button" 
			data-toggle="modal"
			data-target="#resetPasswordModal"
			class="btn btn-outline-success">Şifremi Değiştir</button>
			<button 
			type="button" 
			class="btn btn-outline-danger btn-sm float-right" 
			data-toggle="modal" 
			data-target="#deactiveAccountModal">Hesabımı Devre Dışı Bırak</button>
		</div>
	</div>
</div>