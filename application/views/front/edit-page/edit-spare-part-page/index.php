<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <? 
    $this->load->view('front/includes/head'); 
    $this->load->view('front/edit-page/includes/style');
    ?>
    <title>Ilan Düzenle | İkinci Zincir</title>
</head>
<body style="background-color: #eadaec;">
    <div class="wrapper">
        <? 
        $this->load->view('front/includes/header'); 
        $this->load->view('front/edit-page/edit-spare-part-page/content');
        $this->load->view('front/includes/footer'); 
        $this->load->view('front/includes/script');
        $this->load->view('front/edit-page/includes/script');
        $this->load->view('front/edit-page/edit-spare-part-page/includes/script');
        ?>            
    </div>
</body>
</html>
