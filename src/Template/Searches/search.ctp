<?php 
    use Cake\Routing\Router;
    use Cake\I18n\Time;
    $articlePage = 1;
    $totalArticlePage = (integer)($amountArticles / 10);
    if($amountArticles % 10 != 0){
        $totalArticlePage += 1;
    }
?>
<!-- Start Blog List Section -->
<script>
    window.onload = function(){
        articlesSearch(<?= $articlePage ?>);
    };
</script>
<?php 
    $start = Time::now();
    $start->year(2019)->month(6)->day(1);
    $end = Time::now();
?>
<div class="layer-stretch">
    <div class="layer-wrapper text-center">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
            <label>Từ ngày</label>
            <input type="date" name="start" value="<?= $start->format('Y-m-d'); ?>" id="start">
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
            <label>Đến ngày</label>
            <input type="date" name="end" value="<?= $end->format('Y-m-d'); ?>" id="end">
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
            <?= $this->Form->text('keyword', ['class' => 'mdl-textfield__input', 'id' => 'keyword', 'value' => $keyword]); ?>
            <label class='mdl-textfield__label' for='keyword'>Nhập từ cần tìm</label>
            <a onclick="articlesSearch(<?= $articlePage ?>)" class="fa fa-search search-button"></a>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div id="articlesSearch"></div>
                <?php if($amountArticles > 10){ ?>
                        <ul class="theme-pagination">
                            <?php while ($articlePage <= $totalArticlePage) { ?>
                                <li><a id="articlePage<?= $articlePage ?>" onclick="articlesSearch(<?= $articlePage ?>)"><?= $articlePage; ?></a></li>
                            <?php $articlePage += 1; } ?>
                        </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End Blog List Section -->
<script>
    function articlesSearch(articlePage){
        var dateStart = $('#start').val();
        var dateEnd = $('#end').val();
        if(dateEnd < dateStart){
            alert("Thời gian không hợp lệ...");
        }else{
            $("body,html").animate({scrollTop: 0}, "slow");
            $('#articlesSearch').html('<?= $this->Html->image('loading.gif'); ?>');
            var keyword = $('#keyword').val();
            if(<?= $amountArticles ?> > 10){
                $('a').removeClass("active");
                document.getElementById('articlePage' + articlePage).classList.add("active");
            };
            $.ajax({
                url: '<?= Router::url(['controller' => 'articles', 'action' => 'articlesSearch']) ?>',
                type: 'GET',
                data: {
                    keyword : keyword,
                    articlePage : articlePage,
                    dateStart: dateStart,
                    dateEnd: dateEnd
                },
                
                success: function (response) {
                    setTimeout(function(){
                        $('#articlesSearch').html(response);
                    }, 1000);
                },
                error: function (response) {
                    alert("Lỗi...");
                }
            });
        }
    }
</script>