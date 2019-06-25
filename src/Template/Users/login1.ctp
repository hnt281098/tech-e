<?php use Cake\Routing\Router; ?>
<!-- Start page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1>Đăng nhập</h1>
            <p><a href="<?= Router::url(['controller'=>'pages', 'action'=>'index']) ?>">Trang chủ</a> &#8594; <span>Đăng nhập</span></p>
        </div>
    </div>
</div><!-- End page Title Section -->
<!-- Start Login Section -->
<div id="login-page" class="layer-stretch">
    <div class="layer-wrapper">
        <div class="form-container">
        	<?= $this->Form->create(); ?>
        	<fieldset>
        		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-envelope-o"></i>
                    <?= $this->Form->text('username', ['class' => 'mdl-textfield__input', 'required']); ?>
                    <label class="mdl-textfield__label" for="email">Tên đăng nhập <em> *</em></label>
                    <span class="mdl-textfield__error">Vui lòng nhập email!</span>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-key"></i>
                    <?= $this->Form->password('password', ['class' => 'mdl-textfield__input', 'required']); ?>
                    <label class="mdl-textfield__label" for="password">Mật khẩu <em> *</em></label>
                    <span class="mdl-textfield__error">Vui lòng nhập mật khẩu!</span>
                    <div class="forgot-pass"><a href="/news_website/users/forgot-password">Quên mật khẩu?</a></div>
                </div>
        	</fieldset>
            
            <div class="form-submit">
                <?php echo $this->Form->button('Đăng nhập', [
                	'class' => 'mdl-button mdl-js-button mdl-js-ripple-effect button button-primary']); ?>
            </div>
            <?= $this->Form->end(); ?>
            <div class="or-using"></div>
            <div class="social-login">
                <a href="#" class="social-facebook"><i class="fa fa-facebook"></i>Facebook</a>
                <a href="#" class="social-google"><i class="fa fa-google"></i>Google</a>
            </div>
            <div class="login-link">
                <span class="paragraph-small">Bạn chưa có tài khoản?</span>
                <a href="/news_website/users/register" class="">Đăng kí ngay</a>
            </div>
        </div>
    </div>
</div><!-- End Login Section -->