
<div id="lg2" class="tab-pane active">
    <? $this->load->view('front/auth-page/corparate-register-page/includes/cards'); ?>

    <div id="messageRegisterCorparete"></div>
    <div class="login-form-container">
        <div class="login-form">
            <form id="registerCorparate">
                <input type="text" id="username" name="username" placeholder="Dükkan Adı">
                <input type="password" name="password"  id="password" placeholder="Şifrenizi Belirleyin">
                <input type="email" name="email" id="email" placeholder="E-Posta Adresiniz">
                <input type="text" name="email" id="phoneNumber" placeholder="Telefon Numaranız">
                <textarea rows="5" placeholder="adresiniz" id="meetLocation"></textarea>
                <select id="province" class="form-control">
                        <option selected disabled>Şehriniz</option>
                    <? foreach(get_all('province') as $province){ ?>
                        <option value="<?= $province->id ?>"><?= $province->ad ?></option>
                    <? } ?>
                </select>
                <select class="mt-4 form-control" id="city">
                </select>
                <div class="button-box mt-4">
                    <button type="submit" class="btn-style cr-btn"><span>Kayıt</span></button>
                </div>
            </form>
        </div>
    </div>
</div>