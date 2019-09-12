<div class="blog-area pt-150 pb-110">
    <div class="container">
        <div class="section-title text-center mb-60">
            <h2>Son Eklenen Bisiklet İlanları</h2>
        </div>
        <div class="row">
            <? foreach(get_all('bicycles') as $bicycle){ ?>
                <? $product_thumb = get_product_thumb(0, $bicycle->product_number) ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-hm-wrapper mb-40">
                        <div class="blog-img">
                            <a href="<?= base_url("ilan/$bicycle->slug/$bicycle->advert_type") ?>"><img src="<?= base_url($product_thumb) ?>" alt="image"></a>
                            <div class="blog-date">
                                <h4><?= $bicycle->brand ?> <?= $bicycle->model ?></h4>
                            </div>
                        </div>
                        <div class="blog-hm-content">
                            <h3><a href="<?= base_url("ilan/$bicycle->slug/$bicycle->advert_type") ?>"><?= $bicycle->name ?></a></h3>
                            <p><?= $bicycle->description ?></p>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
</div>