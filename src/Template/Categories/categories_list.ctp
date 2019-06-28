<?php 
    use Cake\Routing\Router;
    use Cake\Utility\Inflector;
?>
<!-- Start Page Title Section -->
<div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1>Danh mục</h1>
            <p><a href="<?= Router::url(['controller'=>'pages', 'action'=>'index', 'plugin' => false]) ?>">Trang chủ</a> &#8594; <span>Danh mục</span></p>
        </div>
    </div>
</div><!-- End Page Title Section -->
<?php
    if(!empty($data)){
?>
<!-- Start Doctor List Section -->
<div class="layer-stretch">
    <div class="layer-wrapper layer-bottom-10">
        <div class="row">
        <?php foreach($data['lv1'] as $value){ ?>
            <div class="col-md-4">
                <div class="department-block department-card">
                    <div class="tbl-cell hdr-logo"><a><img src=""></a></div>
                    <div class="tbl-cell department-detail">
                        <a href="<?= Router::url(['controller'=>'categories', 'action'=>'articlesByCategory', 'id'=>$value['id']]) ?>"><h5><?= $value['name'] ?></h5></a>
                        <p class="paragraph-small paragraph-white"><?= $value['description'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div><!-- End Doctor List Section -->
<?php
    }
?>