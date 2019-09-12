<div class="shop-wrapper fluid-padding-2 pt-120 pb-150">
    <div class="container-fluid">
       <div class="row">
        <div class="col-lg-3">
           <div class="product-sidebar-area pr-60">
             <? 
             $this->load->view('front/product-page/products-page/includes/search_product', array('table_name' => $table_name)); 
             $this->load->view('front/product-page/products-page/includes/categories'); 
             $this->load->view('front/product-page/products-page/includes/sort_by_price'); 
             ?>
         </div>
     </div>
     <div class="col-lg-9">
        <? 
           if($products){
                $this->load->view('front/product-page/products-page/includes/product_list'); 
                $this->load->view('front/product-page/products-page/includes/pagination'); 
            }else{
                $this->load->view('front/product-page/products-page/includes/no_added_yet'); 
            }
        ?>
    </div>
</div>
</div>
</div>