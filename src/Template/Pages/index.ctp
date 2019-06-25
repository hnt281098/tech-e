<?php 
    use Cake\Routing\Router;
?>
<!-- Start Blog List Section -->
<div class="layer-stretch">
    <div class="layer-wrapper">
        <div class="row">
            <div id="resultArticles" class="col-lg-8 text-center">
              <?php if(!empty($data['articlesList'])){
                        foreach($data['articlesList'] as $value){ 
                            $image = explode('; ', $value['image']);
                ?>
                                    <div class='theme-material-card blog-full-block'>
                                        <div class='row'>
                                            <div class='col-sm-4'>
                                                <div class='blog-full-date'><?= $this->calculateDatetime($value['posting_date']); ?></div>
                                                <div class='theme-img theme-img-scalerotate'>
                                                    <img src='<?= $image[0] ?>' alt=''>
                                                </div>
                                            </div>
                                            <div class='col-sm-8'>
                                                <div class='blog-full-ttl'>
                                                    <h3>
                                                    <?= $this->Html->link($value['title'],
                                                        [
                                                            'controller'=>'articles',
                                                            'action'=>'articlesDetails',
                                                            'id'=>$value['id']
                                                        ]
                                                    ); ?>
                                                    </h3>
                                                </div>
                                                <div class='blog-full-description'><?= $value['description'] ?></div>
                                                <div class='blog-full-ftr'>
                                                    <?php
                                                        foreach ($data['userList'] as $value2) {
                                                            if($value['user_id'] == $value2['id']){
                                                                $fullname = $value2['fullname'];
                                                                $id = $value2['id'];
                                                                break;
                                                            }
                                                        }
                                                    ?>
                                                    <a href="<?= Router::url(['controller'=>'users', 'action'=>'userDetails', 'id'=>$id]) ?>" class='pull-left blog-full-author'>
                                                        <i class='fa fa-user'></i>
                                                        <?= $fullname ?>
                                                    </a>
                                                    <a href="<?= Router::url(['controller'=>'articles', 'action'=>'articlesDetails', 'id'=>$value['id']]) ?>" class='pull-right anchor-icon'>
                                                        Xem thêm <i class='fa fa-arrow-right'></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php } ?>
                    <?php if($data['amountArticles'] > 10){
                        $this->paginator();
                    } ?>
                <?php } ?>
            </div>
            <!-- Right Bar -->
            <div class="col-lg-4">
                <div class="theme-material-card text-center">
                    <?= $this->element('search'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="sub-ttl">Apple</div>
                    <?= $this->requestAction('/articles/standard/apple/1'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="sub-ttl">Samsung</div>
                    <?= $this->requestAction('/articles/standard/samsung/1'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="flexslider theme-flexslider">
                        <?= $this->requestAction('/articles/articles-most-view'); ?>
                    </div>
                </div>
                <div class="theme-material-card">
                    <?= $this->requestAction('/searches/top-searches') ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Blog List Section -->