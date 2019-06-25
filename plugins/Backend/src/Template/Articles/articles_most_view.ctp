<?php
    if(!empty($articlesMostView)):{
        echo "<ul class='slides'>";
        foreach ($articlesMostView as $value) {
            echo "<li>
                    <div class='theme-flexslider-container'>
                        <img src='".$value['image']."' alt='' />
                        <h4 class='font-16 text-left'>".$this->Html->link($value['title'],
                                        ['controller'=>'articles',
                                         'action'=>'articlesDetails',
                                          'id'=>$value['id']])."</h4>
                        <p class='text-left primary-color'>".$value['posting_date']->format('d-M-Y')."</p>
                    </div>
                </li>";
        }
        echo "</ul>";
    }
endif;
?>