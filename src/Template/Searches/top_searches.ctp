<div class="sub-ttl">Tìm kiếm nhiều nhất</div>
<?php
	if(!empty($topSearches)){
		foreach ($topSearches as $value) {
			echo $this->Html->link(
				$value['keyword'],
				['controller'=>'articles', 'action'=>'articlesSearch', 'tag'=>$value['keyword']],
				['class'=>'theme-tag']);
		}	
	}
?>