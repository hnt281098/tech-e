<?php
use Cake\Routing\Router;
    if(!empty($data)){
?>
<div class="sub-ttl">
    <a href="<?= Router::url(['controller'=>'articles', 'action'=>'articlesMostViewMore']) ?>">Xem nhiều nhất</a>
</div>
    <ul class='slides'>
    <?php foreach ($data as $value) {
        $image = explode("\n", $value['image']);
    ?>
            <li>
                <div class='theme-flexslider-container'>
                    <?php if(!empty($image[0])){
                        echo $this->Html->image('../uploads/articles/'.$image[0]);
                    }else{
                        echo $this->Html->image('news-default.jpg');
                    } ?>
                    <h4 class='font-16 text-left'><?= $this->Html->link($value['title'],
                                    ['controller'=>'articles',
                                     'action'=>'articlesDetails',
                                      'id'=>$value['id']
                                    ]) ?></h4>
                    <?php if(!empty($value['posting_date'])){ ?>
                        <p class='text-left primary-color'><?= $this->calculateDatetime($value['posting_date']); ?></p>
                    <?php } ?>
                </div>
            </li>
    <?php } ?>
    </ul>
<?php    
    }
?>