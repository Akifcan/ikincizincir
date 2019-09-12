<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <? 
            $this->load->view('front/includes/head'); 
            $this->load->view('front/product-page/select-advert-type-page/includes/style');
        ?>
        <title>İkinci Zincir</title>
    </head>
    <body>
        <div class="wrapper">
            <? 
                $this->load->view('front/includes/header'); 
                $this->load->view('front/product-page/select-advert-type-page/content'); 
                $this->load->view('front/includes/footer'); 
                $this->load->view('front/includes/script');
                $this->load->view('front/product-page/select-advert-type-page/includes/script');
            ?>            
        </div>
    </body>
</html>
