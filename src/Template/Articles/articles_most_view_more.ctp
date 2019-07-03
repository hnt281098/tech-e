<?php
    use Cake\Routing\Router;
    $articlePage = 1;
    $totalArticlePage = (integer)($amountArticles / 10);
    if($amountArticles % 10 != 0){
        $totalArticlePage += 1;
    }
?>
<!-- Start page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1>Xem nhiều nhất</h1>
            <p>
                <a href="<?= Router::url(['controller'=>'pages', 'action'=>'index', 'plugin' => false]) ?>">Trang chủ</a>
                &#8594;
                <span>Xem nhiều nhất</span>
            </p>
        </div>
    </div>
</div><!-- End page Title Section -->
<!-- Start Blog List Section -->
<script>
    window.onload = function(){
        articlesMostView(0, <?= $articlePage ?>);
    };
</script>
<div class="layer-stretch">
    <div class="layer-wrapper text-center">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div id="articlesMostView"></div>
                <?php if($amountArticles > 10){ ?>
                        <ul class="theme-pagination">
                            <?php while ($articlePage <= $totalArticlePage) { ?>
                                <li><a id="articlePage<?= $articlePage ?>" onclick="articlesMostView(0, <?= $articlePage ?>)"><?= $articlePage; ?></a></li>
                            <?php $articlePage += 1; } ?>
                        </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End Blog List Section -->
<script>
    function articlesMostView(id, articlePage){
        $("body,html").animate({scrollTop: 0}, "slow");
        $('#articlesMostView').html('<?= $this->Html->image('loading.gif'); ?>');
        if(<?= $amountArticles ?> > 10){
            $('a').removeClass("active");
            document.getElementById('articlePage' + articlePage).classList.add("active");
        };
        $.ajax({
            url: '<?= Router::url(['controller' => 'articles', 'action' => 'articlesBy']) ?>',
            type: 'GET',
            data: {
                id : id,
                type : 'most_view',
                articlePage : articlePage
            },
            
            success: function (response) {
                setTimeout(function(){
                    $('#articlesMostView').html(response);
                }, 1000);
            },
            error: function (response) {
                alert("Lỗi...");
            }
        });
    }
</script>