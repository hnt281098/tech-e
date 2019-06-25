<?php
    if(!empty($data)){
        foreach ($data['articleDetails'] as $value);
        foreach ($data['authorDetails'] as $value2);
        echo "<div class='layer-stretch'>
                <div class='layer-wrapper'>
                    <div class='row'>
                        <div class='col-lg-8 text-center'>
                            <div class='theme-material-card'>
                                <div class='theme-img blog-picture'>
                                    <img class='' src='".$value['image']."' alt=''>
                                </div>
                                <h2 class='blog-ttl'>".$value['title']."</h2>
                                <ul class='blog-detail'>
                                    <li><i class='fa fa-user-o'></i>".$value2['fullname']."</li>
                                    <li><i class='fa fa-calendar-o'></i>".$value['posting_date']->format('d M Y')."</li>
                                    <li><i class='fa fa-comment-o'></i>69</li>
                                </ul>
                                <div class='blog-post'>
                                    <p class='paragraph-medium paragraph-black'>".$value['description']."</p>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <div class='theme-img'>
                                                <img src='uploads/service-2.jpg' alt=''>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='theme-img theme-img-scale'>
                                                <img src='uploads/service-1.jpg' alt=''>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='theme-img theme-img-scalerotate'>
                                                <img src='uploads/service-5.jpg' alt=''>
                                            </div>
                                        </div>
                                    </div>
                                    <p class='paragraph-medium paragraph-black'>".str_replace('.', '.<br/><br/>', $value['content'])."</p>
                                        <div class='col-md-6'>
                                            <div class='theme-img theme-img-scalerotate'>
                                                <img src='uploads/blog-2.jpg' alt=''>
                                            </div>
                                        </div>
                                </div>
                                <div class='row blog-meta'>
                                    <div class='col-sm-7 blog-tag'>
                                        <p>Tags : </p>
                                        <ul>
                                            <li><a href='#'>Health, </a></li>
                                            <li><a href='#'>Wellness, </a></li>
                                            <li><a href='#'>Science </a></li>
                                        </ul>
                                    </div>
                                    <div class='col-sm-5 text-right'>
                                        <ul class='social-list social-list-sm'>
                                            <li><a href='#'><i class='fa fa-facebook'></i></a></li>
                                            <li><a href='#'><i class='fa fa-twitter'></i></a></li>
                                            <li><a href='#'><i class='fa fa-google'></i></a></li>
                                            <li><a href='#'><i class='fa fa-instagram'></i></a></li>
                                            <li><a href='#'><i class='fa fa-linkedin'></i></a></li>
                                            <li><a href='#'><i class='fa fa-flickr'></i></a></li>
                                            <li><a href='#'><i class='fa fa-rss'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                            <div class='theme-material-card'>
                                <div class='sub-ttl'>Thông tin tác giả</div>
                                <div class='blog-author'>
                                    <div class='row'>
                                        <div class='col-3 hidden-xs-down'>
                                            <div class='theme-img'>
                                                <img src='".$value2['avatar']."' alt=''>
                                            </div>
                                        </div>
                                        <div class='col-9 blog-author-details'>
                                            <h4>".$value2['fullname']."</h4>
                                            <a>".$value2['birthday']->format('d M Y')."</a>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='theme-material-card'>
                                <div class='sub-ttl'>Bình luận (".$data['amountComment'].")</div>
                                <ul class='comment-list'>";
                                    foreach ($data['commentDetails'] as $value3){
                                        foreach($data['userList'] as $value4){
                                            if($value3['user_id'] == $value4['id']){
                                                $avatar = $value4['avatar'];
                                                $fullname = $value4['fullname'];
                                                break;
                                            }
                                        }
                                        echo "<li>
                                                <div class='row'>
                                                    <div class='col-2 hidden-xs-down pr-0 comment-img'>
                                                        <div class='theme-img'>
                                                            <img src='".$avatar."' alt=''>
                                                        </div>
                                                    </div>
                                                    <div class='col-10 comment-detail text-left'>
                                                        <div class='comment-meta'>

                                                            <span>".$fullname."</span>
                                                            <span>".$value3['comment_date']->format('d M Y')."</span>
                                                        </div>
                                                        <div class='comment-post'>".$value3['content']."</div>
                                                        <ul class='comment-action'>
                                                            <li><a><i class='fa fa-thumbs-up'></i>Like</a></li>
                                                            <li><a><i class='fa fa-thumbs-down'></i>Dislike</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>";
                                    }            
                                echo"</ul>
                                    <ul class='theme-pagination'>";
                                        echo $this->Paginator->first('<< ' . __('Đầu'));
                                        echo $this->Paginator->prev('< ' . __('Trước'));
                                        echo $this->Paginator->numbers();
                                        echo $this->Paginator->next(__('Sau') . ' >');
                                        echo $this->Paginator->last(__('Cuối') . ' >>');
                                    echo "</ul>
                            </div>
                            <div class='theme-material-card'>
                                <div id='comment' class='sub-ttl layer-ttl-white'>Để lại một bình luận</div>";
                                echo $this->Form->create(
                                    'comment', 
                                    ['url'=>['controller'=>'comments', 'action'=>'writeComment', 'articleid'=>$value['id']]]
                                );
                                echo "<div class='row comment-form'>
                                    <div class='col-sm-12'>
                                            <div class='mdl-textfield mdl-js-textfield form-input'>";
                                            echo $this->Form->textarea(
                                                'contentComment', 
                                                ['class'=>'mdl-textfield__input', 'rows'=>4, 'id'=>'comment-message']
                                            );
                                            echo "<label class='mdl-textfield__label' for='comment-message'>
                                                    Viết bình luận của bạn ...
                                                </label>
                                            </div>
                                    </div>
                                    <div class='col-sm-12'>
                                        <div class='form-submit'>";
                                            echo $this->Form->button('Bình luận', ['class'=>'mdl-button mdl-js-button mdl-js-ripple-effect button button-primary']);
                                        echo "</div>
                                    </div>
                                </div>";
                                echo $this->Form->end();  
                            echo "</div>
                        </div>";
                        echo $this->element('right_bar');
                    echo "</div>
                </div>
            </div>";
    }
?>