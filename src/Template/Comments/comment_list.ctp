<div class='sub-ttl'>Bình luận (<?= $amountComment ?>)</div>
<ul class='comment-list'>
<?php
    foreach ($data as $value){
?>
        <li>
            <div class='row'>
                <div class='col-2 hidden-xs-down pr-0 comment-img'>
                    <div class='theme-img'>
                        <?php if(!empty($value['user']['avatar'])){
                            echo $this->Html->image('../uploads/avatar/' . $value['user']['avatar']);
                        }else{
                            echo $this->Html->image('avatar-default.jpg');
                        } ?>
                    </div>
                </div>
                <div class='col-10 comment-detail text-left'>
                    <div class='comment-meta'>

                        <span><?= $value['user']['fullname'] ?></span>
                        <span><?= $value['comment_date']->format('d M Y') ?></span>
                    </div>
                    <div class='comment-post'><?= $value['content'] ?></div>
                </div>
            </div>
        </li>
<?php } ?>            
</ul>