<!-- Start Blog List Section -->
<div class="layer-stretch">
    <div class="layer-wrapper text-center">
        <?= $this->element('search'); ?>
        <div class="row">
            <?php if(!empty($data['articlesList'])){
                $count = count($data['articlesList']);
                foreach($data['articlesList'] as $value){
                    echo "<div class='theme-material-card blog-full-block'>
                        <div class='row'>
                            <div class='col-sm-4'>
                                <div class='blog-full-date'>" . $value['posting_date']->format('d M Y') . "</div>
                                <div class='theme-img theme-img-scalerotate'>
                                    <img src='" . $value['image'] . "' alt=''>
                                </div>
                            </div>
                            <div class='col-sm-8'>
                                <div class='blog-full-ttl'>
                                    <h3>";
                                    echo $this->Html->link($value['title'],
                                        ['controller'=>'articles',
                                         'action'=>'articlesDetails',
                                          'id'=>$value['id']]);
                                echo "</h3>
                                </div>
                                <div class='blog-full-description'>" . $value['description'] . "</div>
                                <div class='blog-full-ftr'>
                                    <a class='pull-left blog-full-author'><i class='fa fa-user'></i>" . $value['author_id'] . "</a>
                                    <a class='pull-right anchor-icon'>
                                        Xem thêm <i class='fa fa-arrow-right'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                if($count == 0){
                    echo "<span class='notfound-tag-2'>Không có kết quả...</span>";
                }
            }else{
                echo "<span class='notfound-tag-2'>Không có kết quả...</span>";
            } ?>
        </div>
    </div>
</div>
<!-- End Blog List Section -->