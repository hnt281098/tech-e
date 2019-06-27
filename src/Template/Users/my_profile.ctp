<?php use Cake\Routing\Router; ?>
<!-- Start Page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1>Thông tin cá nhân</h1>
            <p><a href="<?= Router::url(['controller'=>'pages', 'action'=>'index', 'plugin'=>false]) ?>">Trang chủ</a> &#8594; <span><?= $data['user']['fullname'] ?></span></p>
        </div>
    </div>
</div><!-- End Page Title Section -->
<!-- Start My Profile Section -->
<div id="profile-page" class="layer-stretch">
    <div class="layer-wrapper">
        <div class="theme-material-card text-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-user-o"></i>
                        <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z, ]*" id="fullname" value="<?= $data['user']['fullname'] ?>" readonly>
                        <label class="mdl-textfield__label" for="fullname">Họ tên</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-envelope-o"></i>
                        <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email" readonly value="<?= $data['user']['email'] ?>">
                        <label class="mdl-textfield__label" for="email">Email</label>
                    </div>
                    <div class="doctor-details-extra text-left p-0 pt-4">
                        <a href="<?= Router::url(['controller'=>'users', 'action'=>'articlesByUser', 'id'=>$data['user']['id']]) ?>">
                            <p class="text-center">
                                <i class="fa fa-newspaper-o"></i>
                                <?= $data['amountArticle'] ?> bài viết
                            </p>
                        </a>
                        <p class="text-center"><i class="fa fa-eye"></i><?= $data['amountView'] ?> lượt xem</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-calendar"></i>
                        <input class="mdl-textfield__input" type="text" id="birthday" value="<?= $data['user']['birthday']->format('d - m - Y') ?>" readonly>
                        <label class="mdl-textfield__label" for="birthday">Ngày sinh</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-user-o"></i>
                        <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z, ]*" id="gender" value="<?= $data['user']['gender'] ?>" readonly>
                        <label class="mdl-textfield__label" for="gender">Giới tính</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class='theme-img theme-img-scalerotate'>
                        <?php if(!empty($data['user']['avatar'])){
                            echo $this->Html->image($data['user']['avatar']);
                        }else{
                            echo $this->Html->image('avatar-default.jpg');
                        } ?>
                    </div>
                </div>
            </div>
            <!-- <div class="form-submit">
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary">Save</button>
            </div> -->
        </div>  
    </div>
</div><!-- End My Profile Section -->