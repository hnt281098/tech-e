<?php
use Cake\Routing\Router;
    if(!empty($data)){
        foreach ($data['articleDetails'] as $value);
        $image = explode("\n", $value['image']);
        $commentPage = 1;
        $totalCommentPage = (integer)($data['amountComment']/5);
        if($data['amountComment']%5 != 0){
            $totalCommentPage += 1;
        }
?>
<!-- Start Blog Section -->
<script>
    window.onload = function(){
        goCommentPage(<?= $value['id'] ?>, 1);
    };
</script>
<?php if(!empty($currentUser)){ ?>
        <script>var statusComment = true;</script>
<?php }else{ ?>
        <script>var statusComment = false;</script>
<?php } ?>
<div class='layer-stretch'>
    <div class='layer-wrapper'>
        <div class='row'>
            <div class='col-lg-8 text-center'>
                <div class='theme-material-card'>
                    <div class='theme-img blog-picture'>
                        <?php if(!empty($image[0])){
                            echo $this->Html->image('../uploads/articles/'.$image[0]);
                        }else{
                            echo $this->Html->image('news-default.jpg');
                        } ?>
                    </div>
                    <h2 class='blog-ttl'><?= $value['title'] ?></h2>
                    <ul class='blog-detail'>
                        <li><i class='fa fa-user-o'></i><?= $value['user']['fullname'] ?></li>
                        <?php if(!empty($value['posting_date'])){ ?>
                            <li><i class='fa fa-calendar-o'></i><?= $value['posting_date']->format('d M Y') ?></li>
                        <?php } ?>
                        <!-- <li><i class='fa fa-comment-o'></i><?= $data['amountComment'] ?></li> -->
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
                                                <?php if(!empty($img)){
                                                    echo $this->Html->image('../uploads/articles/'.$img);
                                                }else{
                                                    echo $this->Html->image('news-default.jpg');
                                                } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        
                    </div>
                    <div class='row blog-meta'>
                            <p>Nguồn : <?= $this->Html->link($value['source'], $value['source'], ['target'=>'_blank']) ?></p>
                    </div>
                </div> 
                <div class='theme-material-card'>
                    <div id='commentList'></div>
                    <?php if($data['amountComment'] > 5){ ?>
                            <ul class="theme-pagination">
                                <!-- <li><a href="#" class="active">1</a></li> -->
                                <?php while ($commentPage <= $totalCommentPage) { ?>
                                    <li><a id="commentPage<?= $commentPage ?>" onclick="goCommentPage(<?= $value['id'] ?>, <?= $commentPage ?>)"><?= $commentPage; ?></a></li>
                                <?php $commentPage += 1; } ?>
                            </ul>
                    <?php } ?>
                </div>
                <div class='theme-material-card'>
                    <div id='comment' class='sub-ttl layer-ttl-white'>Để lại một bình luận</div>
                    <div class='row comment-form'>
                        <div class='col-sm-12'>
                                <div class='mdl-textfield mdl-js-textfield form-input'>
                                <?= $this->Form->textarea(
                                    'contentComment', 
                                    ['class'=>'mdl-textfield__input', 'rows'=>4, 'id' => 'contentComment', 'placeholder'=>'Viết bình luận của bạn...']
                                ); ?>
                                </div>
                        </div>
                        <div class='col-sm-12'>
                            <div class='form-submit'>
                                <button id="btnComment" class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary" onclick="writeComment(<?= $value['id'] ?>)">Bình luận</button>
                            </div>
                        </div>
                    </div>
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
                        <?= $this->requestAction('/articles/most-view'); ?>
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
    
    function goCommentPage(articleId, commentPage) {
        $('#commentList').html('<?= $this->Html->image('loading.gif'); ?>');
        if(<?= $data['amountComment'] ?> > 5){
            $('a').removeClass("active");
            document.getElementById('commentPage' + commentPage).classList.add("active");
        };
        $.ajax({
            url: '<?= Router::url(['controller' => 'comments', 'action' => 'commentList']) ?>',
            type: 'GET',
            data: {
                articleId : articleId,
                commentPage : commentPage,
            },
            
            success: function (response) {
                setTimeout(function(){
                    $('#commentList').html(response);
                }, 1000);
            },
            error: function (response) {
                alert("Lỗi...");
            }
        });
    };

    function writeComment(articleId) {
        if(statusComment){
            $topCommentList = $('#commentList').offset().top;
            $("body,html").animate({scrollTop: ($topCommentList - 100)}, "slow");
            var content = $('#contentComment').val();
            if(content != ""){
                $.ajax({
                    url: '<?= Router::url(['controller' => 'comments', 'action' => 'writeComment']) ?>',
                    type: 'GET',
                    data: {
                        articleId : articleId,
                        content : content
                    },
                    
                    success: function (response) {
                        goCommentPage(articleId, 1);
                        $('#contentComment').val("");
                    },
                    error: function (response) {
                        alert("Lỗi comment...");
                    }
                });
            }else{
                alert('Bạn chưa nhập bình luận...');
            }
        }else{
            alert('Bạn chưa đăng nhập...');
            window.location = '<?= Router::url(['controller' => 'users', 'action' => 'login', 'plugin'=>'Backend']) ?>';
        }
    };

    function block(cmtId, userId) {
        var type = $('#block' + cmtId).val();
        var url = '';
        var id = 0;
        if(type == 'cmt'){
            url = '<?= $this->Url->build([
                        'controller' => 'comments',
                        'action' => 'blockComment',
                    ]); ?>';
            id = cmtId;
        }else if(type == 'user'){
            url = "<?= Router::url(['controller' => 'Users', 'action' => 'blockUser', 'plugin'=>'Backend']) ?>";
            id = userId;
        }
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            cache: false,
            data: {
                id: id,
            },

            success: function (response) {
                alert("Khóa thành công");
                goCommentPage(<?= $value['id'] ?>, 1);
            },
            error: function (response) {    
                alert("Lỗi");
            }
        });
    };
</script>