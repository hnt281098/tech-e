<?php use Cake\Routing\Router;
if(!empty($data)){
    foreach($data as $value){ 
        $image = explode('; ', $value['image']);
?>
            <div class='theme-material-card blog-full-block'>
                <div class='row'>
                    <div class='col-sm-4'>
                        <div class='blog-full-date'><?= $this->calculateDatetime($value['posting_date']); ?></div>
                        <div class='theme-img theme-img-scalerotate'>
                            <?php if(!empty($image[0])){
                                echo $this->Html->image($image[0]);
                            }else{
                                echo $this->Html->image('news-default.jpg');
                            } ?>
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
                            <a href="<?= Router::url(['controller'=>'users', 'action'=>'userDetails', 'id'=>$value['user']['id']]) ?>" class='pull-left blog-full-author'>
                                <i class='fa fa-user'></i>
                                <?= $value['user']['fullname'] ?>
                            </a>
                            <a href="<?= Router::url(['controller'=>'articles', 'action'=>'articlesDetails', 'id'=>$value['id']]) ?>" class='pull-right anchor-icon'>
                                Xem thêm <i class='fa fa-arrow-right'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>
<?php } ?>