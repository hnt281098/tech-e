<?php 
    use Cake\Routing\Router;
    $articlePage = 1;
    $totalArticlePage = (integer)($amountArticles / 10);
    if($amountArticles % 10 != 0){
        $totalArticlePage += 1;
    }
?>
<!-- Start Blog List Section -->
<!-- <script>
    window.onload = function(){
        loadArticlesList(<?= $articlePage ?>);
    };
</script> -->
<div id="page" class="layer-stretch">
    <div class="layer-wrapper">
        <div class="row">
            <div class="col-lg-8 text-center">
                <!-- <div id="articlesList"></div>
                <?php if($amountArticles > 10){ ?>
                        <ul class="theme-pagination">
                            <?php while ($articlePage <= $totalArticlePage) { ?>
                                <li><a id="articlePage<?= $articlePage ?>" onclick="loadArticlesList(<?= $articlePage ?>)"><?= $articlePage; ?></a></li>
                            <?php $articlePage += 1; } ?>
                        </ul>
                <?php } ?> -->
                <div class="theme-material-card">
                    <div class="sub-ttl"><a href="<?= Router::url(['controller'=>'articles', 'action'=>'articlesNewMore']) ?>">Mới nhất</a></div>
                    <?= $this->requestAction('/articles/index/new'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="sub-ttl"><a href="<?= Router::url(['controller'=>'categories', 'action'=>'articlesByCategory', 'id'=>14]) ?>">Laptop</a></div>
                    <?= $this->requestAction('/articles/index/laptop'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="sub-ttl"><a href="<?= Router::url(['controller'=>'categories', 'action'=>'articlesByCategory', 'id'=>7]) ?>">Đồ chơi công nghệ</a></div>
                    <?= $this->requestAction('/articles/index/tech_toy'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="sub-ttl"><a href="<?= Router::url(['controller'=>'categories', 'action'=>'articlesByCategory', 'id'=>12]) ?>">VSmart</a></div>
                    <?= $this->requestAction('/articles/index/vsmart'); ?>
                </div>
            </div>
            <!-- Right Bar -->
            <div class="col-lg-4">
                <div class="theme-material-card text-center">
                    <?= $this->element('search'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="sub-ttl"><a href="<?= Router::url(['controller'=>'categories', 'action'=>'articlesByCategory', 'id'=>8]) ?>">Apple</a></div>
                    <?= $this->requestAction('/articles/standard/apple/1'); ?>
                </div>
                <div class="theme-material-card">
                    <div class="sub-ttl"><a href="<?= Router::url(['controller'=>'categories', 'action'=>'articlesByCategory', 'id'=>9]) ?>">Samsung</a></div>
                    <?= $this->requestAction('/articles/standard/samsung/1'); ?>
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
</div><!-- End Blog List Section -->
<!-- <script>
    function loadArticlesList(articlePage){
        $("body,html").animate({scrollTop: 0}, "slow");
        $('#articlesList').html('<?= $this->Html->image('loading.gif'); ?>');
        if(<?= $amountArticles ?> > 10){
            $('a').removeClass("active");
            document.getElementById('articlePage' + articlePage).classList.add("active");
        };
        $.ajax({
            url: '<?= Router::url(['controller' => 'articles', 'action' => 'articlesList']) ?>',
            type: 'GET',
            data: {
                articlePage : articlePage
            },
            
            success: function (response) {
                setTimeout(function(){
                    $('#articlesList').html(response);
                }, 1000);
            },
            error: function (response) {
                alert("Lỗi...");
            }
        });
    };
</script> -->