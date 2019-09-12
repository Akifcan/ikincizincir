<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <? $this->load->view('front/includes/head'); ?>
        <? $this->load->view('front/home-page/includes/style'); ?>
        <title>İkinci Zincir | Bisikletler ve Etkinlikler</title>
    </head>
    <body>
        <div class="wrapper">
            <? 
                $this->load->view('front/includes/header'); 
                $this->load->view('front/home-page/includes/banner');
                $this->load->view('front/home-page/includes/last_added_club');
                $this->load->view('front/includes/footer'); 
                $this->load->view('front/home-page/includes/modals/bicycle_detail_modal'); 
                $this->load->view('front/includes/script');
                $this->load->view('front/home-page/includes/script');
            ?>            
        </div>
    </body>
</html>
