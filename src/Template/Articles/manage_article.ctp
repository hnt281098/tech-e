<?php  
    use Cake\Routing\Router;
    $articlePageApproved = 1;
    $totalArticlePageApproved = (integer)($data['amountArticlesApproved'] / 10);
    if($data['amountArticlesApproved'] % 10 != 0){
        $totalArticlePageApproved += 1;
    }
    $articlePagePending = 1;
    $totalArticlePagePending = (integer)($data['amountArticlesPending'] / 10);
    if($data['amountArticlesPending'] % 10 != 0){
        $totalArticlePagePending += 1;
    }
?>
<script>
    window.onload = function(){
        articlesApproved(<?= $articlePageApproved ?>);
        articlesPending(<?= $articlePageApproved ?>);
    };
</script>
<div class="layer-stretch">
    <div class="layer-wrapper text-center">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="theme-material-card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#approved" role="tab" data-toggle="tab" aria-selected="true">Đã duyệt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pending" role="tab" data-toggle="tab" aria-selected="false">Đang chờ duyệt</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="approved">
                            <div class="p-2">
                                <p class="font-20" style="color: red">Đã duyệt</p>
                                <div id="articlesApproved"></div>
                                <?php if($data['amountArticlesApproved'] > 10){ ?>
                                        <ul class="theme-pagination">
                                            <?php while ($articlePageApproved <= $totalArticlePageApproved) { ?>
                                                <li><a id="articlePageApproved<?= $articlePageApproved ?>" onclick="articlesApproved(<?= $articlePageApproved ?>)"><?= $articlePageApproved; ?></a></li>
                                            <?php $articlePageApproved += 1; } ?>
                                        </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="pending">
                            <div class="p-2">
                                <p class="font-20" style="color: red">Đang chờ duyệt</p>
                                <div id="articlesPending"></div>
                                <?php if($data['amountArticlesPending'] > 10){ ?>
                                        <ul class="theme-pagination">
                                            <?php while ($articlePagePending <= $totalArticlePagePending) { ?>
                                                <li><a id="articlePageApproved<?= $articlePageApproved ?>" onclick="articlesPending(<?= $articlePagePending ?>)"><?= $articlePagePending; ?></a></li>
                                            <?php $articlePagePending += 1; } ?>
                                        </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function articlesApproved(articlePageApproved){
        $("body,html").animate({scrollTop: 0}, "slow");
        $('#articlesApproved').html('<?= $this->Html->image('loading.gif'); ?>');
        if(<?= $data['amountArticlesApproved'] ?> > 10){
            $('a').removeClass("active");
            document.getElementById('articlePageApproved' + articlePageApproved).classList.add("active");
        };
        $.ajax({
            url: '<?= Router::url(['controller' => 'articles', 'action' => 'articlesApproved']) ?>',
            type: 'GET',
            data: {
                articlePage : articlePageApproved
            },
            
            success: function (response) {
                setTimeout(function(){
                    $('#articlesApproved').html(response);
                }, 1000);
            },
            error: function (response) {
                alert("Lỗi...");
            }
        });
    };

    function articlesPending(articlePagePending){
        $("body,html").animate({scrollTop: 0}, "slow");
        $('#articlesPending').html('<?= $this->Html->image('loading.gif'); ?>');
        if(<?= $data['amountArticlesPending'] ?> > 10){
            $('a').removeClass("active");
            document.getElementById('articlePagePending' + articlePagePending).classList.add("active");
        };
        $.ajax({
            url: '<?= Router::url(['controller' => 'articles', 'action' => 'articlesPending']) ?>',
            type: 'GET',
            data: {
                articlePage : articlePagePending
            },
            
            success: function (response) {
                setTimeout(function(){
                    $('#articlesPending').html(response);
                }, 1000);
            },
            error: function (response) {
                alert("Lỗi...");
            }
        });
    }
</script>