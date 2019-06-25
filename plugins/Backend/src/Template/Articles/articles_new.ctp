<?php
	use Cake\Routing\Router;
	if(!empty($articlesNew)):{
		foreach ($articlesNew as $value) {
			$url = Router::url(['controller'=>'articles', 'action'=>'articlesDetails', 'id'=>$value['id']]);
			echo "<a href='".$url."' class='row blog-recent'>
				    <div class='col-4 blog-recent-img'>
				        <img class='img-responsive img-thumbnail' src='".$value['image']."' alt=''>
				    </div>
				    <div class='col-8 blog-recent-post'>
				        <h4>".$value['title']."</h4>
				        <p>".$value['posting_date']->format('d-M-Y')."</p>
				    </div>
				</a>";
		}
	}
endif;
?>