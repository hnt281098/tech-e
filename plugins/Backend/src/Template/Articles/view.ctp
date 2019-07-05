<?php use Cake\Routing\Router; ?>
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Quản lý bài đăng</h2>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-xl-12">

            <!-- <button type="button" onclick="add()" class="btn btn-success btn-square mr-1 mb-2">Thêm bài đăng</button> -->

            <!-- Sorting -->
            <div class="widget has-shadow">
                <!-- <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Sorting</h4>
                </div> -->
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0 thai">
                            <thead>
                                <tr>
                                    <?php
                                    $fields = array_keys($articles->toArray()[0]->toArray());
                                    foreach ($fields as $field) {
                                        ?>
                                        <th ><?= str_replace('_', ' ', ucwords($field)) ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <?php if ($articles->toArray()[0]->toArray()['id'] != null) : ?>
                            <tbody>
                                <?php foreach ($articles as $article) { ?>
                                    <tr>
                                        <?php foreach ($fields as $field) { 
                                            $type = 1;
                                            if ($article['status'] == 'Chờ duyệt') {
                                                $type = 2;
                                            }
                                        ?>
                                            <td ><?= $article[$field] ?></td>
                                        <?php } ?>
                                        <td class="td-actions">
                                            <!-- <a href="#"><i class="la la-edit edit"></i></a> -->
                                            <a onclick="submitDelete(<?= $article['id'] ?>,this)" href="#"><i class="la la-close delete"></i></a>

                                            <?php if ($article['status'] == "Chờ duyệt") : ?>
                                                <a onclick="showDetailApprove(<?= $article['id'] ?>)" href="#"><i class="la la-eye edit"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Sorting -->
        </div>
    </div>
    <!-- End Row -->
</div>
<!-- End Container -->
<!-- end div for left-bar -->
</div>
<a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
<!-- Begin Vendor Js -->

<?= $this->Html->script(array(
    '../backend/template/vendors/js/base/jquery.min',
    '../backend/template/vendors/js/base/core.min',

    '../backend/template/vendors/js/datatables/datatables.min',
    '../backend/template/vendors/js/datatables/dataTables.buttons.min',
    '../backend/template/vendors/js/datatables/jszip.min',
    '../backend/template/vendors/js/datatables/buttons.html5.min',
    '../backend/template/vendors/js/datatables/pdfmake.min',
    '../backend/template/vendors/js/datatables/vfs_fonts',
    '../backend/template/vendors/js/datatables/buttons.print.min',
    '../backend/template/vendors/js/nicescroll/nicescroll.min',
    '../backend/template/vendors/js/datepicker/moment.min',
    '../backend/template/vendors/js/datepicker/daterangepicker',

    '../backend/template/vendors/js/app/app.min',
    '../backend/template/js/components/tables/tables',

    '../backend/template/js/components/datepicker/datepicker',
));
?>

<script>
    function showDetailApprove(articleId) {
        var url = '<?= $this->Url->build([
                        'controller' => 'articles',
                        'action' => 'edit'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            data: {
                id: articleId,
            },
            success: function(response) {
                $('#content').html(response.html);

                document.getElementById("formTitle").innerHTML = "Duyệt đơn";
                $('#id').attr("name", "id");
                $('#id').val(articleId);
                $("#updateArticleForm").attr("action", "<?= Router::url(['controller'=>'articles', 'action'=>'edit']); ?>");
                $("#updateArticleForm").attr("method", "POST");
                $("#updateArticleForm").attr("id", "approveArticleForm");
                $("#article-content").val(response.article.content);
                $("#edit-request").val(response.article.content);
                $(".btn-save").val("Duyệt");

                if (response.article)

                var selections = "";
                
                for (i = 0; i < response.users.length; i++) {
                    email = response.users[i]['email'];
                    
                    selections = selections + ' <option value=' + response.users[i]['id'] + '>' + email + '</option>'
                }
                $('#users').html(selections);
            },
            error: function(response) {
                alert("Không thể tải form này!");
            }
        });
    }

    function approve(articleId) {
        var url = '<?= $this->Url->build([
                        'controller' => 'articles',
                        'action' => 'approve'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: {
                id: articleId
            },
            cache: false,

            success: function(response) {
                alert("Đã duyệt bài đăng");
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("sorting-table").deleteRow(i);

            },
            error: function(response) {
                alert("Không thể duyệt!");
            }
        });
    }

    function submitDelete(articleId, r) {
        var url = '<?= $this->Url->build([
                        'controller' => 'articles',
                        'action' => 'delete'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: {
                id: articleId
            },
            cache: false,

            success: function(response) {
                alert("Bài đăng đã được xóa");
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("sorting-table").deleteRow(i);

            },
            error: function(response) {
                alert("Xóa thất bại!");
            }
        });
    }

    function add() {
        var url = '<?= $this->Url->build([
                        'controller' => 'articles',
                        'action' => 'add'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            success: function(response) {
                $('#content').html(response.html);
                var selections = "";
                
                for (i = 0; i < response.users.length; i++) {
                    email = response.users[i]['email'];
                    
                    selections = selections + ' <option value=' + response.users[i]['id'] + '>' + email + '</option>'
                }
                $('#users').html(selections);
            },
            error: function(response) {
                alert("Không thể tải form này!");
            }
        });
    }
  
    function down(ta){
        setTimeout(function(){
            ta.style.cssText = 'height:auto; padding:0';
            // for box-sizing other than "content-box" use:
            // el.style.cssText = '-moz-box-sizing:content-box';
            ta.style.cssText = 'height:' + ta.scrollHeight + 'px';
        },0);
    }

    function back() {
        showLoading();
        var url = '<?= $this->Url->build([
                            'controller' => 'articles',
                            'action' => 'view'
                        ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            data: {
                article_status_id: <?=$type?>,
            },
            success: function(response) {
                $('#content').html(response.html);
            },
            error: function(response) {
                alert("Không thể tải form này!");
            }
        });
    }

    $(document).ready(function() {
        hideLoading();
        
    });
    
</script>
</body>