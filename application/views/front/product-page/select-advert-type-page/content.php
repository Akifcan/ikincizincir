<?php 
require_once(FCPATH.'/application/libraries/Redirect_header_link.php');
$redirect_header_link = new Redirect_header_link();
?>

<div class="blog-area pt-120 pb-130"> 
	<div class="container mt-5"> 
		<?= $this->session->flashdata('new_user'); ?>
		<div align="center" class="pt-5">
			<a href="<?= $redirect_header_link->redirect_to('bisiklet-ilani-olustur'); ?>">
				<button class="bicycleButton">
					<i class="fa fa-bicycle"></i>
					Bisiklet
				</button>
			</a>
			<a href="<?= $redirect_header_link->redirect_to('yedek-parca-ilani-olustur'); ?>">
				<button class="spareButton">
					<i class="fa fa-anchor"></i>
					Parça
				</button>
			</a>
			<a href="<?= $redirect_header_link->redirect_to('kiyafet-ilani-olustur'); ?>">
				<button class="wearButton">
					<i class="fa fa-eye"></i>
					Giyim
				</button>
			</a>
		</div>
		<div align="center" class="mt-2">
			<a href="javascript:void(0)">
				<button class="productButton">
					İlanlarım
				</button>
			</a>
			<a href="javascript:void(0)">
				<button class="productHistoryButton">
					İlan Geçmişim
				</button>
			</a>
			<a href="javascript:void(0)">
				<button class="contactSettingsButton">
					İletişim Ayarlarım
				</button>
			</a>
		</div>
	</div>
</div>