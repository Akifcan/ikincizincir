<div class="grid-list-product-wrapper tab-content mt-5">
    <div id="new-product" class="product-grid product-view tab-pane active">
        <div class="row">
<? foreach($products as $product){ ?>
<div class="product-width col-md-6 col-xl-4 col-lg-6 allProduct">
    <div class="product-wrapper mb-35">
        <?
        $img_thumb = get_product_thumb($table_index, $product->product_number);
        ?>
        <div class="product-img">
            <a href="product-details.html">
                <img width="370" height="488" src="<?= base_url($img_thumb) ?>" alt="">
            </a>
            <div class="product-item-dec">
                <? 
                if($_GET['ilan'] == 'bisikletler'){ 
                    $this->load->view('front/product-page/products-page/includes/bicycle_short_desc', array('product' => $product)); 
                } else if($_GET['ilan'] == 'yedek-parca'){
                    $this->load->view('front/product-page/products-page/includes/spare_part_short_desc', array('product' => $product)); 
                } else if($_GET['ilan'] == 'giyim-ve-guvenlik'){
                    $this->load->view('front/product-page/products-page/includes/clothing_short_desc', array('product' => $product)); 
                }
                ?>
            </div>
            <div class="product-action">
                <a class="action-cart-2" title="Göz Atılacaklara Ekle" href="#">
                    <i class=" ti-heart"></i>
                </a>
                <a class="action-reload" title="Hızlı Görüntüle" data-toggle="modal" data-target="#exampleModal" href="#">
                    <i class=" ti-zoom-in"></i>
                </a>
            </div>
            <div class="product-content-wrapper bg-dark">
                <div class="product-title-spreed">
                    <h4 class="text-white"><a href="product-details.html"><?= $product->name ?></a></h4>
                    <span>Kullanıcı Adı</span>
                </div>
                <div class="product-price">
                    <span class="text-white"><i class="fa fa-turkish-lira"></i><?= $product->price ?></span>
                </div>
            </div>
        </div>
        <div class="product-list-details">
            <h2><a href="product-details.html"><?= $product->name ?></a></h2>
            <div class="product-price">
                <span><i class="fa fa-turkish-lira"></i><?= $product->price ?></span>
            </div>
            <p><?= $product->description ?></p>
            <div class="shop-list-cart">
                <a href="cart.html"><i class="ti-shopping-cart"></i>İlanı Görüntüle</a>
            </div>
        </div>
    </div>
</div>
<? } ?>
</div></div></div>