<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
    <?= $this->Form->create('search',['url'=>['controller'=>'searches', 'action'=>'search', 'tag'=>'keyword']]); ?>
    <?= $this->Form->text('keyword', ['class'=>'mdl-textfield__input', 'id'=>'keyword']); ?>
    <label class='mdl-textfield__label' for='keyword'>Nhập từ cần tìm</label>
    <?= $this->Form->button('', ['class'=>'fa fa-search search-button', 'id'=>'btnSearch']); ?>
    <?= $this->Form->end();?>
</div>