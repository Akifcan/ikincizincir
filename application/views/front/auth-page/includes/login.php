<div id="lg1" class="tab-pane active">
    <div id="messageLogin"></div>
    <?= $this->session->flashdata('status'); ?>
    <div class="login-form-container">
        <div class="login-form">
            <form id="loginForm">
                <input type="text" id="email" placeholder="E-Posta Adresi">
                <input type="password" id='password' placeholder="Şifre">
                <div class="button-box">
                    <div class="login-toggle-btn">
                        <input type="checkbox">
                        <label>Beni Hatırla</label>
                        <a href="#">Şifremi Unuttum</a>
                    </div>
                    <button type="submit" class="btn-style cr-btn"><span>Giriş Yap</span></button>
                </div>
            </form>
        </div>
    </div>
</div>