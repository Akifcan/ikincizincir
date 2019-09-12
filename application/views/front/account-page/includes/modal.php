<div class="modal fade" id="deactiveAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hesabımı Devre Dışı Bırak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Sayın <b><?= $user->username ?></b> hesabınızı devre dışı bırakmak istediğinize emin misinz? Hesabınızı istediğiniz zaman bize ulaşarak aktifleştirebilirsiniz.</p>
			</div>
			<form method="POST" action="<?= base_url('Account/deactive_account') ?>">
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
					<button type="submit" class="btn btn-primary">Hesabımı Devre Dışı Bırak</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Şifremi Güncelle</h5>
				<button type="button" class="closeResetPasswordModal" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="messageResetPassword"></div>
			<div class="modal-body">
				<p>Sayın <b><?= $user->username ?></b> şifrenizi güncelleme işlemini onaylıyor musunuz?</p>
			</div>
				<div class="modal-footer">
					<button type="button" class="closeResetPasswordModal" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
					<button type="button" id="resetPassword" class="btn btn-primary">Şifremi Onayla</button>
				</div>
		</div>
	</div>
</div>

