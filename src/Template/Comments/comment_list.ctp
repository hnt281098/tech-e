<div class='sub-ttl'>Bình luận (<?= $amountComment ?>)</div>
<ul class='comment-list'>
<?php
    foreach ($data as $value){
?>
        <li>
            <div class='row'>

                <div class='col-2 hidden-xs-down pr-0 comment-img'>
                    <div class='theme-img'>
                        <?php if(!empty($value['user']['avatar'])){
                            echo $this->Html->image('../uploads/avatar/' . $value['user']['avatar']);
                        }else{
                            echo $this->Html->image('avatar-default.jpg');
                        } ?>
                    </div>
                </div>
                <div class='col-10 comment-detail text-left'>
                    <div class='comment-meta'>

                        <span><?= $value['user']['fullname'] ?></span>
                        <span><?= $value['comment_date']->format('d M Y') ?></span>
                    </div>
                    <div class='comment-post'><?= $value['content'] ?></div>
                </div>
                <?php if(!empty($currentUser)){
                        if($currentUser['role_id'] == 1){ ?>
                    <div class='col-10 comment-detail text-left'>
                        <select name="block" id="block">
                            <option value="blockCmt">Khóa bình luận</option>
                            <option value="blockUser">Khóa tài khoản</option>
                        </select>
                        <a onclick="block(<?= $value['id'] ?>)" href="#"><i class="fa fa-close"></i></a>
                    </div>
                <?php }
                } ?>
            </div>
        </li>
<?php } ?>            
</ul>
<script>
    function block(id) {
        var url = '<?= $this->Url->build([
                        'controller' => 'comments',
                        'action' => 'blockComment',
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            cache: false,
            data: {
                id: id,
            },

            success: function (response) {
                alert("Dung");
            },
            error: function (response) {    
                alert("SFDS");
            }
        });
    }
</script>