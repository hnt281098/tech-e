<?php 
    use Cake\Routing\Router;
?>
<!-- Start Not Found Section -->
<div class="notfound-wrapper">
	<h1 class="notfound-ttl">404</h1>
	<p class="notfound-tag-1">Không tìm thấy trang!!!</p>
	<span class="notfound-tag-2">những gì bạn đang cố gắn truy cập hiện không khả dụng...</span>
	<div class="notfound-link">
		<a href="<?= Router::url(['controller'=>'pages', 'action'=>'index']) ?>" class="button-icon"><span>Về trang chủ</span><i class="fa fa-home"></i></a>
		<a href="#feedback" class="button-icon"><span>Báo cáo vấn đề</span><i class="fa fa-bug"></i></a>
	</div>
	<ul class="social-list notfound-social">
		<?php
			if(!empty($info)){
		        foreach ($info as $value){
		?>
		<li><a href="<?= $value['facebook'] ?>" target='_blank'><i class="fa fa-facebook"></i></a></li>
		<li><a href="<?= $value['instagram'] ?>" target='_blank'><i class="fa fa-instagram"></i></a></li>
		<li><a href="<?= $value['youtube'] ?>" target='_blank'><i class="fa fa-youtube"></i></a></li>
		<?php
		        }
		    }
		?>
	</ul>
</div><!-- End Not Found Section -->