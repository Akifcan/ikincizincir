<footer>
    <div class="footer-top pt-210 pb-98 theme-bg">
        <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-widget mb-30">
                    <div class="footer-logo">
                        <a href="<?= base_url('/') ?>">
                            <h1 class="text-white">İkinci  Zincir</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-widget mb-30">
                    <div class="footer-widget-title">
                        <h3>Son Eklenen Bisikletler</h3>
                    </div>
                    <div class="food-widget-content pr-30">
                        <? foreach(get_all('bicycles', 5) as $bicycle){ ?>
                            <div class="single-tweet">
                                <p><a href="<?= base_url("ilan/$bicycle->slug/$bicycle->advert_type") ?>"><?= ucfirst($bicycle->name) ?></a></p>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-widget mb-30">
                    <div class="footer-widget-title">
                        <h3>Son Eklenen Yedek Parçalar</h3>
                    </div>
                    <div class="food-widget-content pr-30">
                        <? foreach(get_all('spare_parts', 5) as $spare_part){ ?>
                            <div class="single-tweet">
                                <p><a href="<?= base_url("ilan/$spare_part->slug/$spare_part->advert_type") ?>"><?= ucfirst($spare_part->name) ?></a></p>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</footer>