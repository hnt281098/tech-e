<?php
	use Cake\Routing\Router;
	if(!empty($data)){
		foreach ($data as $value) {
			$image = explode("\n", $value['image']);
?>
<a href='<?= Router::url(['controller'=>'articles', 'action'=>'articlesDetails', 'id'=>$value['id']]); ?>' class='row blog-recent'>
    <div class='col-4 blog-recent-img'>
        <!-- <img class='img-responsive img-thumbnail' src='<?= $image[0] ?>' alt=''> -->
        <?php if(!empty($image[0])){
            echo $this->Html->image('../uploads/articles/'.$image[0], ['class'=>'img-responsive img-thumbnail']);
        }else{
            echo $this->Html->image('news-default.jpg');
        } ?>
    </div>
    <div class='col-8 blog-recent-post'>
        <h4><?= $value['title'] ?></h4>
        <?php if($standard == 'user_most_view'){ ?>
            <p><?= $value['view'] ?> lượt xem</p>
        <?php }else{ ?>
            <?php if(!empty($value['posting_date'])){ ?>
                <p><?= $this->calculateDatetime($value['posting_date']) ?></p>
            <?php } ?>
        <?php } ?>
    </div>
</a>
<?php
		}
	}
?>