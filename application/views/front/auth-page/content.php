    <div class="login-register-area ptb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#lg1">
                                        <h4> Giriş Yap </h4>
                                    </a>
                                    <a data-toggle="tab" href="#lg2">
                                        <h4> Kayıt Ol </h4>
                                    </a>
                                </div>
                                <div class="tab-content">
                                    <? 
                                        $this->load->view('front/auth-page/includes/login'); 
                                        $this->load->view('front/auth-page/includes/register'); 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>