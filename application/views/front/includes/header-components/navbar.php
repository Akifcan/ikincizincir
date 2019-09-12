<?php 

    require_once(FCPATH.'/application/libraries/Redirect_header_link.php');
    $redirect_header_link = new Redirect_header_link();

 ?>
<div class="col-lg-4 col-md-4 col-4">
    <div class="logo-small-device">
    </div>
    <? if($this->uri->segment(1) == ''){ ?>
        <a href="<?= $redirect_header_link->redirect_to('ilan-turu-sec') ?>">
            <button class="mt-2 btn btn-success">İlan Oluştur</button>
        </a>
    <? } ?>
</div>
<div class="col-lg-8 col-md-8 col-8">
    <div class="header-contact-menu-wrapper pl-45">
        <div class="header-contact">
            <p>
                Kurumsal üyelikler ücretsizdir. Şimdi kurumsal üye
                <a href="<?= base_url('kurumsal-uye') ?>">olun.</a>
            </p>
        </div>
        <div class="menu-wrapper text-center">
            <button class="menu-toggle">
                <img class="s-open" alt="" src="<?= base_url('assets/front/assets/') ?>img/icon-img/menu.png">
                <img class="s-close" alt="" src="<?= base_url('assets/front/assets/') ?>img/icon-img/menu-close.png">
            </button>
            <div class="main-menu">
                <nav>
                    <ul>
                        <li><a href="<?= base_url() ?>">Ana Sayfa</a></li>
                        <? foreach(get_all('navigation') as $nav){ ?>
                            <li><a href="#"><?= $nav->menu_name ?></a>
                                <? if($nav->navigation_bottom == '1'){ ?>
                                    <ul>

                                        <? 
                                        foreach(get_result('navigation_bottom', array('nav_id' => $nav->id)) as $nav_bottom) { ?>
                                            <li><a href="<?= base_url($nav_bottom->slug) ?>"><?= $nav_bottom->name ?></a></li>
                                        <? } ?>
                                    <? } ?>
                                </ul>

                            </li>
                        <? } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-cart cart-small-device">
        <button class="icon-cart">
            <i class="ti-shopping-cart"></i>
            <span class="count-price-add">Giriş</span>
        </button>
        <div class="shopping-cart-content">
            <ul>
                <li class="single-shopping-cart">
                    <div class="shopping-cart-img">
                        <a href="#"><img alt="" src="<?= base_url('assets/front/assets/') ?>img/cart/cart-1.jpg"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h3><a href="#">Gloriori GSX 250 R </a></h3>
                        <span>Price: $275</span>
                        <span>Qty: 01</span>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                    </div>
                </li>
                <li class="single-shopping-cart">
                    <div class="shopping-cart-img">
                        <a href="#"><img alt="" src="<?= base_url('assets/front/assets/') ?>img/cart/cart-2.jpg"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h3><a href="#">Demonissi Gori</a></h3>
                        <span>Price: $275</span>
                        <span class="qty">Qty: 01</span>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                    </div>
                </li>
                <li class="single-shopping-cart">
                    <div class="shopping-cart-img">
                        <a href="#"><img alt="" src="<?= base_url('assets/front/assets/') ?>img/cart/cart-3.jpg"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h3><a href="#">Demonissi Gori</a></h3>
                        <span>Price: $275</span>
                        <span class="qty">Qty: 01</span>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                    </div>
                </li>
            </ul>
            <div class="shopping-cart-total">
                <h4>total: <span>$550.00</span></h4>
            </div>
            <div class="shopping-cart-btn">
                <a class="btn-style cr-btn" href="#">checkout</a>
            </div>
        </div>
    </div>
</div>