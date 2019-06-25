<?php 
    use Cake\Routing\Router;
?>
<!-- Start Page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1>Đăng kí</h1>
            <p><a href="<?= Router::url(['controller'=>'pages', 'action'=>'index']) ?>">Trang chủ</a> &#8594; <span>Đăng kí</span></p>
        </div>
    </div>
</div><!-- End Page Title Section -->
<!-- Start Register Section -->
<div class="layer-stretch">
    <div class="layer-wrapper">
        <div class="form-container">
            <?= $this->Form->create('register', ['url'=>['controller'=>'users', 'action'=>'register']]) ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-envelope-o"></i>
                <?= $this->Form->text('mail', ['class'=>'mdl-textfield__input', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$', 'required']) ?>
                <label class="mdl-textfield__label" for="mail">Mail <em> *</em></label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-user-o"></i>
                <?= $this->Form->text('username', ['class'=>'mdl-textfield__input', 'pattern'=>'[A-Z,a-z,0-9]*', 'required']) ?>
                <label class="mdl-textfield__label" for="username">Tên đăng nhập <em> *</em></label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-user-o"></i>
                <?= $this->Form->text('fullname', ['class'=>'mdl-textfield__input', 'required']) ?>
                <label class="mdl-textfield__label" for="fullname">Họ và tên <em> *</em></label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-calendar"></i>
                <?= $this->Form->input('birthday', ['class'=>'mdl-textfield__input', 'type'=>'date', 'label'=>'Ngày sinh *']) ?>
                <!-- <label class="mdl-textfield__label" for="birthday">Ngày sinh <em> *</em></label> -->
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-key"></i>
                <?= $this->Form->password('password', ['class'=>'mdl-textfield__input', 'pattern'=>'[A-Z,a-z,0-9]*', 'required']) ?>
                <label class="mdl-textfield__label" for="password">Mật khẩu <em> *</em></label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-key"></i>
                <?= $this->Form->password('retype_password', ['class'=>'mdl-textfield__input', 'pattern'=>'[A-Z,a-z,0-9]*', 'required']) ?>
                <label class="mdl-textfield__label" for="retype_password">Nhập lại mật khẩu <em> *</em></label>
            </div>
            <div class="login-condition">Bạn đồng ý với chúng tôi về <br /><a href="<?= Router::url(['controller'=>'informations', 'action'=>'termsConditions']) ?>">điều khoản &#38; điều kiện</a></div>
            <div class="form-submit">
                <?= $this->Form->button(
                    'Tạo tài khoản', ['class'=>'mdl-button mdl-js-button mdl-js-ripple-effect button button-primary'])
                ?>
            </div>
            <?= $this->Form->end() ?>
            <div class="or-using"></div>
            <div class="social-login">
                <a href="#" class="social-facebook"><i class="fa fa-facebook"></i>Facebook</a>
                <a href="#" class="social-google"><i class="fa fa-google"></i>Google</a>
            </div>
            <div class="login-link">
                <span class="paragraph-small">Bạn đã có tài khoản?</span>
                <a href="/news_website/users/login" class="">Đăng nhập ngay</a>
            </div>
        </div>

    </div>
</div><!-- End Register Section