<div id="contactSettings" class="mt-2">
	<div id="contactMessage"></div>
	<form id="contactForm">
		<div class="row">
			<div class="form-grup col-md-6">
				<label class="f-20">Telefon Numaranız</label>
				<input value="<?= $user->phone_number ?>" type="text" id="phoneNumber" placeholder="Telefon Numaranız">
				<? if($user->phone_number == null || $user->phone_number == ''){ ?>
					<p class="warning-text">Telefon Numaranız Belirtilmemiş</p>
				<? } ?>
			</div>
			<div class="form-grup col-md-6">
				<label class="f-20">Buluşma Noktanız</label>
				<textarea
				maxlength="2000"
				rows="10"
				data-toggle="tooltip" 
				data-placement="top" title="Satıcı İle Buluşma Noktanız" 
				id="meetLocation" 
				placeholder="Buluşma Noktanız"><?= $user->meet_location ?></textarea>
				<? if($user->meet_location == null || $user->meet_location == ''){ ?>
					<p class="warning-text">Buluşma Noktası Belirlememişsiniz</p>
				<? } ?>
				<p id="warningMeetLocation" class="warning-text display-none"></p>
			</div>
		</div>
		<div class="form-group mt-2">
			<button type="submit" class="btn btn-outline-success">Değişiklikleri Kaydet</button>
		</div>
	</form>
</div>