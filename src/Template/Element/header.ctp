<?php 
use Cake\Routing\Router;
    if(!empty($info)){
        foreach ($info as $value);
    }
?>
<!-- Start Header -->
<header id="header">
    <!-- Start Header Top Section -->
    <div id="hdr-top-wrapper">
        <div class="layer-stretch hdr-top">
            <div class="hdr-top-block hidden-xs">
                <div id="hdr-social">
                    <ul class='social-list social-list-sm'>
                        <li><a class='width-auto font-13'>Theo dõi chúng tôi : </a></li>
                        <li><a href='<?= $value['facebook']?>' target='_blank' id='hdr-facebook' ><i class='fa fa-facebook' ></i></a><span class='mdl-tooltip mdl-tooltip--bottom' data-mdl-for='hdr-facebook'>Facebook</span></li>
                        <li><a href='<?= $value['instagram'] ?>' target='_blank' id='hdr-instagram' ><i class='fa fa-instagram' ></i></a><span class='mdl-tooltip mdl-tooltip--bottom' data-mdl-for='hdr-instagram'>Instagram</span></li>
                        <li><a href='<?= $value['youtube'] ?>' target='_blank' id='hdr-youtube' ><i class='fa fa-youtube' ></i></a><span class='mdl-tooltip mdl-tooltip--bottom' data-mdl-for='hdr-youtube'>Youtube</span></li>
                    </ul>
                </div>
            </div>
            <div class="hdr-top-line hidden-xs"></div>
            <div class="hdr-top-block hdr-number">
                <div class='font-13'>
                    <i class='fa fa-mobile font-20 tbl-cell'> </i> <span class='hidden-xs tbl-cell'>Liên hệ chúng tôi : </span> <span class='tbl-cell'> +84 <?= $value['phone'] ?></span>
                </div>
            </div>
            <div class="hdr-top-line"></div>
            <div class="hdr-top-block">
                <?php if(!empty($currentUser)){ ?>
                    <div class="theme-dropdown">
                        <a id="profile-menu" class="mdl-button mdl-js-button mdl-js-ripple-effect font-13"><i class="fa fa-user-o color-black"></i> <?= $currentUser['fullname'] ?></a>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect metarial-menu" data-mdl-for="profile-menu">
                            <?php if($currentUser['role_id'] == 4){ ?>
                                <li class="mdl-menu__item">
                                    <a href="<?= Router::url(['controller'=>'articles', 'action'=>'writeArticle']) ?>"><i class="fa fa-edit"></i> Đăng bài</a>
                                </li>
                                <li class="mdl-menu__item">
                                    <a href="<?= Router::url(['controller'=>'articles', 'action'=>'manageArticle']) ?>"><i class="fa fa-edit"></i> Quản lí bài đăng</a>
                                </li>
                            <?php }elseif ($currentUser['role_id'] == 1) { ?>
                                <li class="mdl-menu__item">
                                    <a href="<?= Router::url(['controller'=>'pages', 'action'=>'index', 'plugin'=>'Backend']) ?>"><i class="fa fa-edit"></i> Quản trị</a>
                                </li>
                            <?php }elseif ($currentUser['role_id'] == 2) { ?>
                                <li class="mdl-menu__item">
                                    <a href="<?= Router::url(['controller'=>'pages', 'action'=>'index', 'plugin'=>'Backend']) ?>"><i class="fa fa-edit"></i> Duyệt bài</a>
                                </li>
                            <?php } ?>
                            <li class="mdl-menu__item">
                                <a href="<?= Router::url(['controller'=>'users', 'action'=>'myProfile']) ?>"><i class="fa fa-sign-in"></i> Cá nhân</a>
                            </li>
                            <li class="mdl-menu__item">
                                <a href="<?= Router::url(['controller'=>'users', 'action'=>'logout', 'plugin'=>'Backend']) ?>"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                <?php }else{ ?>
                    <div class="theme-dropdown">
                        <a id="profile-menu" class="mdl-button mdl-js-button mdl-js-ripple-effect font-13"><i class="fa fa-user-o color-black"></i> Tài khoản</a>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect metarial-menu" data-mdl-for="profile-menu">
                            <li class="mdl-menu__item">
                                <a href="<?= Router::url(['controller'=>'users', 'action'=>'login', 'plugin'=>'Backend']) ?>"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                            </li>
                            <li class="mdl-menu__item">
                                <a href="<?= Router::url(['controller'=>'users', 'action'=>'register', 'plugin' => 'Backend']) ?>"><i class="fa fa-user-o"></i> Đăng kí</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
                <div class="theme-dropdown">
                    <a id="support-menu" class="mdl-button mdl-js-button mdl-js-ripple-effect font-13"><i class="fa fa-support"></i> Hỗ trợ</a>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect metarial-menu" data-mdl-for="support-menu">
                        <li class="mdl-menu__item">
                            <a href="<?= Router::url(['controller'=>'informations', 'action'=>'about']) ?>"><i class="fa fa-info"></i> Thông tin</a>
                        </li>
                        <li class="mdl-menu__item">
                            <a href="#feedback"><i class="fa fa-mail-reply"></i> Phản hồi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- End Header Top Section -->
    <!-- Start Main Header Section -->
    <div id="hdr-wrapper">
        <div class="layer-stretch hdr">
            <div class="tbl">
                <div class="tbl-row">
                    <!-- Start Header Logo Section -->
                    <div class="tbl-cell hdr-logo">
                        <a href='<?= Router::url(['controller'=>'pages', 'action'=>'index', 'plugin'=>false]) ?>'>
                            <?= $this->Html->image($value['logo']); ?>
                        </a>
                    </div><!-- End Header Logo Section -->
                    <div class="tbl-cell hdr-menu">
                        <?php if(!empty($cateLv1)){ ?>
                            <ul class='menu'>
                                <?php foreach ($cateLv1 as $valueLv1) { ?>
                                    <li>
                                        <a href="<?= Router::url(['controller'=>'categories', 'action'=>'articlesByCategory', 'id'=>$valueLv1['id']]) ?>"
                                            id='menu-home' 
                                            class='mdl-button mdl-js-button mdl-js-ripple-effect'>
                                                <?= $valueLv1['name'] ?>
                                        </a>
                                        <?php if(!empty($cateLv2)){ ?>
                                            <ul class='menu-dropdown'>
                                            <?php foreach($cateLv2 as $valueLv2){
                                                if($valueLv2['parent_id'] == $valueLv1['id']){ ?>
                                                    <li>
                                                        <a href='<?= Router::url(['controller'=>'categories', 'action'=>'articlesByCategory', 'id'=>$valueLv2['id']]) ?>'><?= $valueLv2['name'] ?></a>
                                                    </li>
                                                <?php }
                                            } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                        <!-- <div id="menu-bar"><a><i class="fa fa-bars"></i></a></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Main Header Section -->
</header>
<!-- End header -->