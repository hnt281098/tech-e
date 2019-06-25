<?php 
    use Cake\Routing\Router;
    if(!empty($info)){
        foreach ($info as $value);
    }
?>
<!-- Start Footer Section -->
    <footer id="footer">
        <div class="layer-stretch">
            <!-- Start main Footer Section -->
            <div class="row layer-wrapper">
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Thông tin cơ bản</p></div>
                    <div class="footer-container footer-a">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-phone"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">+84 <?= $value['phone'] ?></p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-envelope"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white"><?= $value['mail'] ?></p>
                                </div>
                            </div>
                        </div>
                        <ul class="social-list social-list-colored footer-social">
                            <li>
                                <a href="<?= $value['facebook'] ?>" target="_blank" id="footer-facebook" class="fa fa-facebook"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-facebook">Facebook</span>
                            </li>
                            <li>
                                <a href="<?= $value['instagram'] ?>" target="_blank" id="footer-instagram" class="fa fa-instagram"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-instagram">Instagram</span>
                            </li>
                            <li>
                                <a href="<?= $value['youtube'] ?>" target="_blank" id="footer-youtube" class="fa fa-youtube"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-youtube">Youtube</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Danh mục</p></div>
                    <div class="footer-container footer-b">
                        <div class="tbl">
                            <div class="tbl-row">
                                <ul class="tbl-cell">
                                    <?php
                                        if(!empty($cateLv1)){
                                            foreach ($cateLv1 as $value2){
                                    ?>
                                                <li>
                                                    <a href="<?= Router::url(['controller'=>'articles', 'action'=>'articlesBy', 'by'=>'category', 'id'=>$value2['id']]) ?>">
                                                        <?= $value2['name'] ?>
                                                    </a>
                                                </li>
                                    <?php
                                            }
                                        }
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Phản hồi</p></div>
                    <div class="footer-container footer-c">
                        <div class="footer-subscribe" id="feedback">
                            <?= $this->Form->create('feedback', ['url'=>['controller'=>'feedbacks', 'action'=>'sendFeedback']]) ?>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <?= $this->Form->textarea(
                                    'content',
                                    ['class'=>'mdl-textfield__input', 'rows'=>4]
                                ) ?>
                                <label class="mdl-textfield__label" for="content">Nội dung phản hồi</label>
                                <span class="mdl-textfield__error">Please Enter Valid Email!</span>
                            </div>
                            <div class="footer-subscribe-button">
                                <?= $this->Form->button(
                                    'Gửi', 
                                    ['class'=>'mdl-button mdl-js-button mdl-js-ripple-effect button button-primary']
                                ) ?>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End main Footer Section -->
        <!-- Start Copyright Section -->
        <div id="copyright">
            <div class="layer-stretch">
                <div class="paragraph-medium paragraph-white">2019 @ HNT & TPT</div>
            </div>
        </div><!-- End of Copyright Section -->
    </footer><!-- End of Footer Section -->