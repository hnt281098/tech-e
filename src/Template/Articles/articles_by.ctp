<?php
    use Cake\Routing\Router;
    if(!empty($data)){
?>
<!-- Start page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <?php if(!empty($data['category'])){ ?>
            <h1><?= $data['category']['name'] ?></h1>
            <p>
                <a href="<?= Router::url(['controller'=>'pages', 'action'=>'index']) ?>">Trang chủ</a>
                &#8594;
                <a href="<?= Router::url(['controller'=>'categories', 'action'=>'categoriesList']) ?>">Danh mục</a>
                &#8594;
                <span><?= $data['category']['name'] ?></span>
            </p>
            <?php }elseif (!empty($data['user'])) { ?>
                <h1><?= $data['user']['fullname'] ?></h1>
            <?php } ?>
        </div>
    </div>
</div><!-- End page Title Section -->
<!-- Start Blog List Section -->
<div class="layer-stretch">
    <div class="layer-wrapper text-center">
        <div class="row">
            <?php if(!empty($data['articlesList'])){
                foreach($data['articlesList'] as $list){
                    foreach($list as $value){
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
                                    <a href="<?= Router::url(['controller'=>'users', 'action'=>'userDetails', 'id'=>$id]) ?>" class='pull-left blog-full-author'><i class='fa fa-user'></i><?= $fullname ?></a>
                                    <a href="<?= Router::url(['controller'=>'articles', 'action'=>'articlesDetails', 'id'=>$value['id']]) ?>" class='pull-right anchor-icon'>
                                        Xem thêm <i class='fa fa-arrow-right'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } }?>
                <?php if($data['amountArticles'] == 0){ ?>
                    <span class='notfound-tag-2'>Không có kết quả...</span>
                <?php } ?>
            <?php }else{ ?>
                <span class='notfound-tag-2'>Không có kết quả...</span>
            <?php } ?>
        </div>
            <?php if($data['amountArticles'] > 10){
                $this->paginator();
            }
            ?>
    </div>
</div>
<!-- End Blog List Section -->
<?php
    }
?>