<?php use Cake\Routing\Router; ?>
<!-- Start Page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1>Viết báo</h1>
            <p><a href="<?= Router::url(['controller'=>'pages', 'action'=>'index', 'plugin'=>false]) ?>">Trang chủ</a></p>
        </div>
    </div>
</div><!-- End Page Title Section -->
<!-- Start My Profile Section -->
<div id="profile-page" class="layer-stretch">
    <div class="layer-wrapper">
        <div class="theme-material-card text-center">
            <?= $this->Form->create('writeArticle', ['url'=>['controller'=>'articles', 'action'=>'writeArticle'], 'enctype'=>'multipart/form-data']) ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <?= $this->Form->textarea(
                            'title',
                            ['class'=>'mdl-textfield__input', 'rows'=>2, 'id' => 'title', 'required']
                        ); ?>
                        <label class="mdl-textfield__label" for="title">Tiêu đề</label>
                        <span class="mdl-textfield__error">Please Enter Valid Name!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <?= $this->Form->textarea(
                            'description', 
                            ['class'=>'mdl-textfield__input', 'rows'=>4, 'id' => 'description', 'required']
                        ); ?>
                        <label class="mdl-textfield__label" for="description">Mô tả</label>
                        <span class="mdl-textfield__error">Please Enter Valid Name!</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <input name="image[]" type="file" id="image" multiple>
                    </div>
                    <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label form-input-icon">
                        <select class="mdl-selectfield__select" name="category_id" id="category" required>
                            <option value=""></option>
                            <?php foreach ($cateLv1 as $value) { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                            <?php } ?>
                            <?php foreach ($cateLv2 as $value2) { ?>
                                <option value="<?= $value2['id'] ?>"><?= $value2['name'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="mdl-selectfield__label" for="category">Thể loại</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <?= $this->Form->textarea(
                            'source', 
                            ['class'=>'mdl-textfield__input', 'rows'=>2, 'id' => 'source', 'required']
                        ); ?>
                        <label class="mdl-textfield__label" for="source">Nguồn tin</label>
                        <span class="mdl-textfield__error">Please Enter Valid Name!</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <?= $this->Form->textarea(
                            'content', 
                            ['class'=>'mdl-textfield__input', 'rows'=>20, 'id' => 'content', 'required']
                        ); ?>
                        <label class="mdl-textfield__label" for="content">Nội dung</label>
                        <span class="mdl-textfield__error">Please Enter Valid Name!</span>
                    </div>
                </div>
            </div>
            <div class="form-submit">
                <?= $this->Form->button('Đăng tải', ['class'=>'mdl-button mdl-js-button mdl-js-ripple-effect button button-primary']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>  
    </div>
</div><!-- End My Profile Section -->