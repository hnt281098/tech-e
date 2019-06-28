<?php
    use Cake\Routing\Router;
    if(!empty($data)){
        foreach ($data['user'] as $value);
?>
<!-- Start Page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1><?= $value['fullname'] ?></h1>
        </div>
    </div>
</div><!-- End Page Title Section -->
<!-- Start Doctor List Section -->
<div id="doctor-page" class="layer-stretch">
    <div class="layer-wrapper layer-bottom-10">
        <div class="theme-material-card">
            <div class="row">
                <div class="col-sm-4">
                    <div class="theme-img theme-img-scalerotate">
                        <?php if(!empty($value['avatar'])){
                            echo $this->Html->image($value['avatar']);
                        }else{
                            echo $this->Html->image('avatar-default.jpg');
                        } ?>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="doctorp-name">
                        <h3><?= $value['fullname'] ?></h3>
                        <!-- <p>Vị trí: Biên tập</p> -->
                        <p>Tuổi: <?= $this->calculateAge($value['birthday']) ?></p>
                        <p>Mail: <?= $value['email'] ?></p>
                        <div class="doctorp-social">
                            <ul class="social-list social-list-bordered">
                                <li>
                                    <a href="<?= $value['facebook'] ?>" target='_blank' id="sample-facebook-6" class="fa fa-facebook rounded"></a>
                                    <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="sample-facebook-6">Facebook</span>
                                </li>
                                <li>
                                    <a href="<?= $value['instagram'] ?>" target='_blank' id="sample-instagram-6" class="fa fa-instagram rounded"></a>
                                    <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="sample-instagram-6">Instagram</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="doctor-details-extra text-left p-0 pt-4">
                        <a href="<?= Router::url(['controller'=>'users', 'action'=>'articlesByUser', 'id'=>$value['id']]) ?>">
                            <p class="text-center">
                                <i class="fa fa-newspaper-o"></i>
                                <?= $data['amountArticle'] ?> bài viết
                            </p>
                        </a>
                        <p class="text-center"><i class="fa fa-eye"></i><?= $data['amountView'] ?> lượt xem</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="theme-material-card">
                        <div class="sub-ttl">Gần nhất</div>
                        <?= $this->requestAction('/articles/standard/user_recently/'.$value['id']); ?>   
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="theme-material-card">
                        <div class="sub-ttl">Nhiều lượt xem nhất</div>
                        <?= $this->requestAction('/articles/standard/user_most_view/'.$value['id']); ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Doctor List Section -->
<?php
    }
?>