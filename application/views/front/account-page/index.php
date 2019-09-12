<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <? 
            $this->load->view('front/includes/head'); 
            $this->load->view('front/account-page/includes/style');
        ?>
        <title> <?= $user->username ?> | İkinci Zincir</title>
    </head>
    <body>
        <div class="wrapper">
            <? 
                $this->load->view('front/includes/header'); 
                $this->load->view('front/account-page/content'); 
                $this->load->view('front/includes/footer'); 
                $this->load->view('front/includes/script');
                $this->load->view('front/account-page/includes/script');
            ?>            
        </div>
    </body>
</html>
