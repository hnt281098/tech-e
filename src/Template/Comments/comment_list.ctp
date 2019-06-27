<ul class='comment-list'>
<?php
    foreach ($data as $value){
?>
        <li>
            <div class='row'>
                <div class='col-2 hidden-xs-down pr-0 comment-img'>
                    <div class='theme-img'>
                        <?= $this->Html->image($value['user']['avatar']); ?>
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