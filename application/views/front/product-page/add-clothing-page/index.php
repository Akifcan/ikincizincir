<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <? 
            $this->load->view('front/includes/head'); 
        ?>
        <title>Bisiklet İlanı Oluştur | İkinci Zincir</title>
        <? $this->load->view('front/product-page/add-bicycle-page/includes/style'); ?>
    </head>
    <body style="background-color: #eadaec;">
        <div class="wrapper">
            <? 
                $this->load->view('front/includes/header'); 
                $this->load->view('front/product-page/add-clothing-page/content'); 
                $this->load->view('front/includes/footer'); 
                $this->load->view('front/includes/script');
                $this->load->view('front/product-page/add-clothing-page/includes/script'); 
            ?>            
        </div>
    </body>
</html>
