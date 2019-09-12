<? 
require_once(FCPATH.'/application/libraries/Redirect_header_link.php');
$redirect_header_link = new Redirect_header_link();
?>


<div class="header-cart-wrapper">
    <div class="header-cart">
        <? if(!$this->session->userdata('user')){ ?>
            <a href="<?= $redirect_header_link->redirect_to('giris') ?>">
                <button class="icon-cart">
                    <i class="ti-user"></i>
                    <span class="count-price-add">Giriş</span>
                </button>
            </a>
        <? } else {  ?>
            <button class="icon-cart">
                <i class="ti-user"></i>
                <span class="count-price-add"><?= $this->session->userdata('user')->username ?></span>
            </button>
            <div class="shopping-cart-content">
                <div class="shopping-cart-btn">
                    <a class="btn-style cr-btn" href="<?= $redirect_header_link->redirect_to('hesap') ?>">Profil Ayarları</a>
                </div>
                <div class="shopping-cart-btn">
                    <a class="btn-style cr-btn" href="<?= base_url('ilanlarim') ?>">İlanlarım</a>
                </div>
                <div class="shopping-cart-btn">
                    <a class="btn-style cr-btn" href="<?= $redirect_header_link->redirect_to('cikis') ?>">Çıkış Yap</a>
                </div>
            </div>
        <? } ?>
    </div>
</div>