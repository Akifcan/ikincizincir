<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <? 
            $this->load->view('front/includes/head'); 
            $this->load->view('front/product-page/product-detail-page/style'); 
        ?>
        <title>Bisiklet İlanı Oluştur | İkinci Zincir</title>
    </head>
    <body style="background-color: #eadaec;">
        <div class="wrapper">
            <? 
                $this->load->view('front/includes/header'); 
                $this->load->view('front/product-page/product-detail-page/content'); 
                $this->load->view('front/includes/footer'); 
                $this->load->view('front/includes/script');
                $this->load->view('front/product-page/product-detail-page/script'); 
            ?>            
        </div>
    </body>
</html>
