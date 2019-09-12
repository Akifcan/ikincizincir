<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <? $this->load->view('front/includes/head'); ?>
        <title>Hoş Geldiniz :) | İkinci Zincir</title>
    </head>
    <body>
        <div class="wrapper">
            <? 
                $this->load->view('front/includes/header');
                $this->load->view('front/auth-page/corparate-register-page/content');
                $this->load->view('front/includes/footer'); 
                $this->load->view('front/includes/script');
                $this->load->view('front/auth-page/corparate-register-page/includes/script');
            ?>            
        </div>
    </body>
</html>
