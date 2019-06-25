<div class="col-lg-4">
    <div class="theme-material-card text-center">
        <?= $this->element('search'); ?>
    </div>
    <div class="theme-material-card">
        <div class="sub-ttl">Tin mới nhất</div>
        <?= $this->requestAction('/articles/articles-new'); ?>
    </div>
    <div class="theme-material-card">
        <div class="sub-ttl">Lượt xem nhiều</div>
        <div class="flexslider theme-flexslider">
            <?= $this->requestAction('/articles/articles-most-view'); ?>
        </div>
    </div>
    <div class="theme-material-card">
        <div class="sub-ttl">Từ khoá hot</div>
        <?= $this->requestAction('searches/top-searches') ?>
    </div>
</div>