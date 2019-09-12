<?php 
    
    require_once(FCPATH.'/application/libraries/Redirect_header_link.php');
    $redirect_header_link = new Redirect_header_link();

 ?>

<div class="grid-list-product-wrapper tab-content mt-5">
    <div id="new-product" class="product-grid product-view tab-pane active">
        <div class="row">

            <?  foreach($products as $product){ ?>
                <div class="product-width col-md-6 col-xl-4 col-lg-6" id="allProduct">
                    <div class="product-wrapper mb-35">
                        <?
                            // $img_thumb = $this->db->select('*')
                            //                       ->from($table_name)
                            //                       ->where('product_number', $product->product_number)
                            //                       ->get()->row();
                            // print_r($img_thumb);
                              $img_thumb = get_product_thumb($table_index, $product->product_number);

                         ?>
                        <div class="product-img">
                            <a href="<?= $redirect_header_link->redirect_to("ilan/$product->slug/$table_name") ?>">
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
                                <? if(!$product->user_id == $this->session->userdata('user')->id){ ?>
                                    <a  class="action-cart-2 text-white toLookAt" 
                                        productNumber="<?= $product->product_number ?>" 
                                        title="Göz Atılacaklara Ekle" 
                                        href="javascript:void(0)">
                                        <i class=" ti-heart"></i>
                                    </a>
                                <? } ?>
                                <a class="text-white action-reload" title="Hızlı Görüntüle" data-toggle="modal" data-target="#exampleModal" href="#">
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
                <div id="renderProducts">

                </div>
        </div>
    </div>
</div>