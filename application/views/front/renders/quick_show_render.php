<?php 

$table_index;
if($table == 'bicycles'){
    $table_index = 0;
}else if($table == 'spare_parts'){
    $table_index = 1;
}else if($table == 'clothings'){
    $table_index = 2;
}

?>          


<button id="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span class="icofont icofont-close" aria-hidden="true"></span>
</button>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="qwick-view-left">
                <div class="quick-view-learg-img">
                    <div class="quick-view-tab-content tab-content">
                        <? $images = get_product_images($table_index, array('product_number' => $product_detail->product_number)); ?>
                            <? $counter=0; foreach($images as $image){ $counter++; ?>
                                <? if($counter==1){ ?>
                                    <div class="tab-pane active show fade" id="modal<?= $counter  ?>" role="tabpanel">
                                        <img src="<?= base_url($image->image_url) ?>" alt="">
                                    </div>
                                <? }else { ?>
                                <div class="tab-pane fade" id="modal<?= $counter  ?>" role="tabpanel">
                                    <img src="<?= base_url($image->image_url) ?>.jpg" alt="">
                                </div>
                                <? } ?>
                            <? } ?>
                    </div>
                </div>
                <div class="quick-view-list nav" role="tablist">
                    <? $counter=0; foreach($images as $image_thumb){ $counter++; ?>
                        <? if($counter==1){ ?>
                    <a class="active" href="#modal<?= $image_thumb->image_url  ?>" data-toggle="tab" role="tab">
                        <img width="112" height="110" src="<?= base_url($image_thumb->image_url)?>" alt="">
                    </a>
                    <? } ?>
                    <a href="#modal<?= $counter  ?>" data-toggle="tab" role="tab">
                        <img width="112" height="110" src="<?= base_url($image_thumb->image_url) ?>" alt="">
                    </a>
                    <? } ?>
                </div>
            </div>
            <div class="qwick-view-right">
                <div class="qwick-view-content">
                    <h3><?= $product_detail->name ?></h3>
                    <div class="price">
                        <span class="new"><i class="fa fa-turkish-lira"></i><?= $product_detail->price ?></span>
                    </div>
                    <p><?= $product_detail->description ?></p>
                    <div class="quickview-plus-minus">
                        <div class="quickview-btn-cart">
                            <a class="btn-style" href="#">Detaylı Görüntüle</a>
                        </div>
                        <div class="quickview-btn-wishlist">
                            <a class="btn-hover" href="#"><i class="icofont icofont-heart-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


