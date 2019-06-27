<?php 
    use Cake\Routing\Router;
?>
<!-- Start Page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1>Thông tin</h1>
            <p><a href="<?= Router::url(['controller'=>'pages', 'action'=>'index', 'plugin'=>false]) ?>">Trang chủ</a> &#8594; <span>Thông tin</span></p>
        </div>
    </div>
</div><!-- End Page Title Section -->
<?php
    if(!empty($info)){
        foreach ($info as $value) {
?>
<!-- Start About First Section  -->
<div class="layer-stretch">
    <div class="layer-wrapper">
        <div class="layer-container row">
            <div class="col-md-5 hm-service-left">
                <img class="" src="<?= $value['thumbnail1'] ?>" alt="">
            </div>
            <div class="col-md-7 hm-service-right">
                <p class="paragraph-medium paragraph-black"><?= $value['introduce'] ?></p>
            </div>
        </div>
    </div>
</div><!-- End About First Page  -->
<!-- Start About Second Section  -->
<div class="parallax-background parallax-background-2" style="background-image: url(../img/<?=$value['background']?>);">
    <div class="layer-stretch">
        <div class="layer-wrapper">
            <div class="layer-ttl layer-ttl-white">
                <h3>Tổng quan</h3>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="hm-about-block">
                        <div class="tbl-cell hm-about-icon"><i class="fa fa-newspaper-o"></i></div>
                        <div class="tbl-cell hm-about-number">
                            <span class="counter"><?= $data['amountArticle'] ?></span>
                            <p>Tin tức</p>
                        </div>
                    </div>
                    <div class="hm-about-block">
                        <div class="tbl-cell hm-about-icon"><i class="fa fa-users"></i></div>
                        <div class="tbl-cell hm-about-number">
                            <span class="counter"><?= $data['amountUser'] ?></span>
                            <p>Người dùng</p>
                        </div>
                    </div>
                    <div class="hm-about-block">
                        <div class="tbl-cell hm-about-icon"><i class="fa fa-eye"></i></div>
                        <div class="tbl-cell hm-about-number">
                            <span class="counter"><?= $data['amountView'] ?></span>
                            <p>Lượt xem</p>
                        </div>
                    </div>
                    <div class="hm-about-block">
                        <div class="tbl-cell hm-about-icon"><i class="fa fa-comment"></i></div>
                        <div class="tbl-cell hm-about-number">
                            <span class="counter"><?= $data['amountComment'] ?></span>
                            <p>Bình luận</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img class="" src="<?= $value['thumbnail2'] ?>" alt="">
                </div>
                <div class="row about-mission-vission text-center">
                    <div class="col-md-6 about-mission">
                        <span>Nhiệm vụ</span>
                        <p class="paragraph-medium paragraph-white">Partem volumus cum an, eam vitae civibus ne, doctus repudiare posidonium eu duo. Mei partem similique eu. At per facer iudicabit, soluta accommodare delicatissimi et nam, semper senserit aliquando ex nec. Cu tollit aliquip sea, pri vivendo vivendum ad. Cu electram mnesarchum eos, ius id iusto assueverit repudiandae.</p>
                    </div>
                    <div class="col-md-6 about-vission">
                        <span>Tầm nhìn</span>
                        <p class="paragraph-medium paragraph-white">Partem volumus cum an, eam vitae civibus ne, doctus repudiare posidonium eu duo. Mei partem similique eu. At per facer iudicabit, soluta accommodare delicatissimi et nam, semper senserit aliquando ex nec. Cu tollit aliquip sea, pri vivendo vivendum ad. Cu electram mnesarchum eos, ius id iusto assueverit repudiandae.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End About Second Section  -->
<!-- Start Doctor Section -->
<div class="layer-stretch">
    <div class="layer-wrapper layer-bottom-10 text-center">
        <div class="layer-ttl">
            <h3>Chúng tôi</h3>
        </div>
        <div class="row">
            <?php
                foreach ($data['team'] as $value2) {
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="theme-block theme-block-hover">
                        <div class="theme-block-picture">
                            <?php if(!empty($value2['avatar'])){
                                echo $this->Html->image($value2['avatar']);
                            }else{
                                echo $this->Html->image('avatar-default.jpg');
                            } ?>
                        </div>
                        <div class="doctor-name">
                            <h4><a><?= $value2['fullname'] ?></a></h4>
                        </div>
                        <div class="doctor-details">
                            <div class="doctor-specility">
                                <p>Quản trị</p>
                            </div>
                            <div class="doctor-details-extra">
                                <div class="doctor-details-extra-3">
                                    <p><i class="fa fa-envelope"></i><?= $value2['mail'] ?></p>
                                    <p><i class="fa fa-user-circle"></i><?= $value2['fullname'] ?></p>
                                    <p><i class="fa fa-calendar"></i><?= $this->calculateAge($value2['birthday']) ?> tuổi</p>
                                </div>
                            </div>
                            <div class="doctor-social">
                                <ul class="social-list social-list-bordered social-list-rounded">
                                    <li><a href="<?= $value2['facebook'] ?>" target="_blank" class="fa fa-facebook"></a></li>
                                    <li><a href="<?= $value2['instagram'] ?>" target="_blank" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div><!-- End Doctor Section -->
<!-- Start Testimonial Section -->  
<div id="testimonial" class="parallax-background parallax-background-2" style="background-image: url(../img/<?=$value['background']?>);">
    <div class="layer-stretch">
        <div class="layer-wrapper">
            <div class="layer-ttl layer-ttl-white">
                <h3>Phản hồi</h3>
            </div>
            <div class="layer-container">
                <div id="testimonial-slider" class="owl-carousel owl-theme theme-owl-dot">
                    <?php
                        foreach ($data['feedback'] as $value3) {
                    ?>
                        <div class="testimonial-block">
                            <?php if(!empty($value3['user']['avatar'])){
                                echo $this->Html->image($value3['user']['avatar']);
                            }else{
                                echo $this->Html->image('avatar-default.jpg');
                            } ?>
                            <div class="paragraph-medium paragraph-white">
                                <i class="fa fa-quote-left"></i>
                                <?= $value3['content'] ?>
                            </div>
                            <a><?= $value3['user']['fullname'] ?></a>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Testimonial Section -->
<?php
        }
    }
?>