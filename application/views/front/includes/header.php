<header>
    <div class="header-area transparent-bar ptb-55">
        <div class="container">
            <div class="row">
                <? 
                    $this->load->view('front/includes/header-components/navbar'); 
                    $this->load->view('front/includes/header-components/mobile_navbar'); 
                ?>
            </div>
        </div>
        <? $this->load->view('front/includes/header-components/user'); ?>
    </div>
</header>