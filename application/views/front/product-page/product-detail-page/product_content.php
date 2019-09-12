<div class="col-lg-6">
    <? 
    $this->load->view('front/product-page/product-detail-page/advert_owner_panel'); 
    $this->load->view('front/product-page/product-detail-page/product_is_edited'); 
    ?>
    <div class="product-details-content">
        <h2><?= $product_detail->name ?></h2>
        <div class="product-price">
            <span><i class="fa fa-turkish-lira"></i><?= $product_detail->price ?></span>
        </div>
        <div class="product-overview">
            <h5 class="pd-sub-title">İlan Açıklaması</h5>
            <p><?= $product_detail->description ?></p>
        </div>
        <div class="product-overview">
            <h5 class="pd-sub-title">Buluşma Noktası</h5>
            <p><?= $product_detail->meet_location ?></p>
        </div>
        <div class="product-color">
            <h5 class="pd-sub-title">Ürün Rengi</h5>
            <ul>
                <li class="red">b</li>
            </ul>
        </div>
        <? $this->load->view('front/product-page/product-detail-page/contact_owner'); ?>
        <? 
        if($table_name == 'bicycles'){ 

            $this->load->view('front/product-page/product-detail-page/features_for_bicycle', array('bicycle' => $product_detail));


        } else if($table_name == 'spare_parts'){

            $this->load->view('front/product-page/product-detail-page/features_for_spare_part', array('spare_part' => $product_detail));

        } else if($table_name == 'clothings'){

            $this->load->view('front/product-page/product-detail-page/features_for_clothing', array('clothing' => $product_detail));

        }
        ?>
        <div class="product-categories">
            <h5 class="pd-sub-title">İlan Sahibi</h5>
            <ul>
                <li>
                    <a href="<?= base_url("profil/$product_detail->profile_slug") ?>"><?= $product_detail->username ?></a>
                </li>
                <li>
                    <a href="tel:<?= $product_detail->phone_number ?>"><?= $product_detail->phone_number ?></a>
                </li>
                <li>
                    <a href="tel:<?= $product_detail->phone_number ?>"><button class="btn btn-success"><i class="fa fa-phone"></i>&nbsp;Ara</button></a>
                </li>
            </ul>
        </div>
        <? $this->load->view('front/product-page/product-detail-page/report_product'); ?>
    </div>
</div>