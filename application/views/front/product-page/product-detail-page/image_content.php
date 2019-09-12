
<?php 
$images = get_product_images($table_index, $product_detail->product_number);
?>
<div class="col-lg-6">
    <div class="product-details-img-content">
        <div class="product-details-tab mr-40">
            <div class="product-details-large tab-content">
                <? $counter=0; foreach($images as $image){ $counter++; ?>
                    <? if($counter==1){ ?>
                        <div class="tab-pane active" id="pro-details<?= $counter  ?> ">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="<?= base_url($image->image_url) ?>">
                                    <img src="<?= base_url($image->image_url)?>" alt="">
                                </a>
                            </div>
                        </div>
                    <? }else{ ?>
                        <div class="tab-pane" id="pro-details<?= $counter ?>">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="<?= base_url($image->image_url) ?>">
                                    <img src="<?= base_url($image->image_url) ?>" alt="">
                                </a>
                            </div>  
                        </div>
                    <? } ?>
                <? } ?>
            </div>
            <div class="product-details-small nav mt-12 product-dec-slider owl-carousel">
                <? $counter=0; foreach($images as $img_thumb){ $counter++; ?>
                    <? if($counter==1){ ?>
                        <a class="active" href="#pro-details<?= $counter ?>">
                            <img src="<?= base_url($img_thumb->image_url) ?>" alt="">
                        </a>
                    <? }else{ ?>
                        <a href="#pro-details<?= $counter ?>">
                            <img src="<?= base_url($img_thumb->image_url) ?>" alt="">
                        </a>
                    <? } ?>
                <? } ?>
            </div>
        </div>
    </div>
</div>