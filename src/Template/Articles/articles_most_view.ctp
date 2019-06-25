<div class="sub-ttl">Xem nhiều</div>
<?php
    if(!empty($data)){
?>
    <ul class='slides'>
    <?php foreach ($data as $value) {
        $image = explode('; ', $value['image']);
    ?>
            <li>
                <div class='theme-flexslider-container'>
                    <img src='<?= $image[0] ?>' alt='' />
                    <h4 class='font-16 text-left'><?= $this->Html->link($value['title'],
                                    ['controller'=>'articles',
                                     'action'=>'articlesDetails',
                                      'id'=>$value['id']
                                    ]) ?></h4>
                    <p class='text-left primary-color'><?= $this->calculateDatetime($value['posting_date']); ?></p>
                </div>
            </li>
    <?php } ?>
    </ul>
<?php    
    }
?>