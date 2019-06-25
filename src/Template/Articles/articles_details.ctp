<?php
use Cake\Routing\Router;
    if(!empty($data)){
        foreach ($data['articleDetails'] as $value);
        foreach ($data['authorDetails'] as $value2);
        $image = explode('; ', $value['image']);
        $commentPage = 1;
        
?>
<!-- Start Blog Section -->
<div class='layer-stretch'>
    <div class='layer-wrapper'>
        <div class='row'>
            <div class='col-lg-8 text-center'>
                <div class='theme-material-card'>
                    <div class='theme-img blog-picture'>
                        <?= $this->Html->image($image[0]); ?>
                    </div>
                    <h2 class='blog-ttl'><?= $value['title'] ?></h2>
                    <ul class='blog-detail'>
                        <li><i class='fa fa-user-o'></i><?= $value2['fullname'] ?></li>
                        <li><i class='fa fa-calendar-o'></i><?= $value['posting_date']->format('d M Y') ?></li>
                        <li><i class='fa fa-comment-o'></i><?= $data['amountComment'] ?></li>
                    </ul>
                    <div class='blog-post'>
                        <p class='paragraph-medium paragraph-black'><?= $value['description'] ?></p>
                            <?php $content = explode("\n", $value['content']); ?>
                            <?php foreach($content as $con){ ?>
                                <p class='paragraph-medium paragraph-black'><?= $con ?></p>
                            <?php } ?>
                            <?php if(count($image) > 1){ ?>
                                <div class='row'>
                                    <?php foreach($image as $img){ ?>
                                        <div class='col-md-4'>
                                            <div class='theme-img'>
                                                <?= $this->Html->image($img); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        
                    </div>
                    <div class='row blog-meta'>
                        <!-- <div class='col-sm-7 blog-tag'>
                            <p>Tags : </p>
                            <ul>
                                <li><a href='#'>Health, </a></li>
                                <li><a href='#'>Wellness, </a></li>
                                <li><a href='#'>Science </a></li>
                            </ul>
                        </div> -->
                        
                            <p>Nguồn : <?= $this->Html->link($value['source'], $value['source'], ['target'=>'_blank']) ?></p>
                        
                    </div>
                </div> 
                <div class='theme-material-card'>
                    <div class='sub-ttl'>Bình luận (<?= $data['amountComment'] ?>)</div>
                    <div id='listComment'>
                        <ul class='comment-list'>
                            <?php
                                
                                foreach ($data['commentDetails'] as $value3){
                                    foreach($data['userList'] as $value4){
                                        if($value3['user_id'] == $value4['id']){
                                            $avatar = $value4['avatar'];
                                            $fullname = $value4['fullname'];
                                            break;
                                        }
                                    }
                            ?>
                                    <li>
                                        <div class='row'>
                                            <div class='col-2 hidden-xs-down pr-0 comment-img'>
                                                <div class='theme-img'>
                                                    <?= $this->Html->image($avatar); ?>
                                                </div>
                                            </div>
                                            <div class='col-10 comment-detail text-left'>
                                                <div class='comment-meta'>

                                                    <span><?= $fullname ?></span>
                                                    <span><?= $value3['comment_date']->format('d M Y') ?></span>
                                                </div>
                                                <div class='comment-post'><?= $value3['content'] ?></div>
                                                <ul class='comment-action'>
                                                    <li><a><i class='fa fa-thumbs-up'></i>Like</a></li>
                                                    <li><a><i class='fa fa-thumbs-down'></i>Dislike</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                        <?php } ?>            
                        </ul>
                    </div>
                    <?php 
                        if($data['amountComment'] > 5){ 

                            // $this->paginator(); ?>
                            <ul class="theme-pagination"><li class="first"><a onclick="pre(<?= $value['id'].','. $commentPage+1?>)">&lt;&lt;</a></li><li class="prev"><a rel="prev" href="/tech-e/articles/details/1">&lt;</a></li></ul>
                        <?php } 
                    ?>
                </div>
                <div class='theme-material-card'>
                    <div id='comment' class='sub-ttl layer-ttl-white'>Để lại một bình luận</div>
                    <?= $this->Form->create(
                        'comment', 
                        ['url'=>['controller'=>'comments', 'action'=>'writeComment', 'articleid'=>$value['id']]]
                    ); ?>
                    <div class='row comment-form'>
                        <div class='col-sm-12'>
                                <div class='mdl-textfield mdl-js-textfield form-input'>
                                <?= $this->Form->textarea(
                                    'contentComment', 
                                    ['class'=>'mdl-textfield__input', 'rows'=>4]
                                ); ?>
                                    <label class='mdl-textfield__label' for='contentComment'>
                                        Viết bình luận của bạn ...
                                    </label>
                                </div>
                        </div>
                        <div class='col-sm-12'>
                            <div class='form-submit'>
                                <?= $this->Form->button('Bình luận', ['class'=>'mdl-button mdl-js-button mdl-js-ripple-effect button button-primary']); ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="theme-material-card text-center">
                    <?= $this->element('search'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="sub-ttl">Liên quan</div>
                    <?= $this->requestAction('/articles/standard/connection/'.$value['id']); ?>
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
</div>
<?php } ?>


<script> 
            function pre(articleId, page) {
                $.ajax({
                    url: '/tech-e/comments/viewByArticle',
                    dataType: 'json',
                    type: 'GET',
                    data: {
                        articleId : articleId,
                        pageNumber : page,
                    },
                    cache: false,
                    
                    success: function (response) {
                        console.log(response);
                        alert("OK");
                        

                    },
                    error: function (response) {
                        alert("NGU");
                    }
                });
            }
</script> 