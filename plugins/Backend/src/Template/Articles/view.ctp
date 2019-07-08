<?php use Cake\Routing\Router; 
$fields = array_keys($articles->toArray()[0]->toArray());
?>
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
                        <table id="sorting-table" class="table mb-0 ">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label style="color: black;">Search By
                                    <select id="search-field" style="display:inline; border-style: none;">
                                        <option value="category"><b>Category</b></option>
                                        <option value="title" style="text-align:center;">Title</option>
                                        <option value="id">Id</option>
                                        <option value="user">User(email)</option>
                                        <option value="status">Status</option>
                                    </select>
                                    <input style="margin-top: 7px;" id="search-input" type="text" class="form-control">
                                    </label> 
                                    
                                    &nbsp; <a id="btnSearch" class="btn" href="#"><i style="top: 50px;" class="la la-search la-2x"></i></a>
                                </div>
                            </div>
                            
                            <thead>
                                <tr>
                                    <?php
                                    foreach ($fields as $field) {
                                    ?>
                                        <th style="text-align:center;"><?= str_replace('_', ' ', ucwords($field)) ?></th>
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
                                            <?php else : ?>
                                                <a href="<?= Router::url(['controller'=>'articles', 'action'=>'articlesDetails', 'id'=> $article['id'], 'plugin' => false]) ?>" target="_blank"><i class="la la-eye edit"></i></a>
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
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="sorting-table_info" role="status" aria-live="polite"></div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="sorting-table_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="previous"><a onclick="list(<?=$pageIndex - 1 .','.$type?>)" href="#" aria-controls="sorting-table" data-dt-idx="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a id="now-page" href="#" aria-controls="sorting-table" data-dt-idx="1" class="page-link">1</a></li>
                            <li class="paginate_button page-item" id="next-page-li"><a id="next-page" onclick="list(<?=$pageIndex + 1 .','.$type?>)" href="#" aria-controls="sorting-table" data-dt-idx="2" class="page-link">2</a></li>
                            <li class="paginate_button page-item next" id="next"><a onclick="list(<?=$pageIndex + 1 .','.$type ?>)" href="#" aria-controls="sorting-table" data-dt-idx="3" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>

            </div>  
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

    $('#btnSearch').on('click', function(pageIndex=1) {
        localStorage.clear();
        var input = $('#search-input').val();
        
        if (input == null) {
            alert('Nhập thông tin cần tìm!');
            return false;
        }

        var field = $('#search-field').val();
        showLoading();
        var url = '<?= $this->Url->build([
                        'controller' => 'articles',
                        'action' => 'search'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            data: {
                type: <?=$type?>,
                input: input,
                field: field,
                pageIndex: pageIndex,
            },

            success: function(response) {
                $('#content').empty();
                $('#content').html(response.html);
                $('#search-field').val(field);

                if (pageIndex == 1) {
                    $('#next').removeClass("disabled");
                    $('#previous').addClass("disabled");
                }
                else {
                    $('#previous').removeClass("disabled");
                }
                $('#now-page').text(pageIndex);
                
                if (response.end == false) {
                    $('#next-page').text(pageIndex + 1);
                }
                else {
                    $('#next-page').remove();
                    $('#next').addClass("disabled");
                }
                hideLoading();
                localStorage.clear();
            },
            error: function(response) {
                alert("Không có kết quả!");
                hideLoading();
                localStorage.clear();
            }
        });
    });

    function list(pageIndex, articleId) {
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
                pageIndex: pageIndex,
                article_status_id: articleId,
            },

            success: function(response) {
                $('#content').empty();
                $('#content').html(response.html);
                

                if (pageIndex == 1) {
                    $('#next').removeClass("disabled");
                    $('#previous').addClass("disabled");
                }
                else {
                    $('#previous').removeClass("disabled");
                }
                $('#now-page').text(pageIndex);
                
                if (response.end == false) {
                    $('#next-page').text(pageIndex + 1);
                }
                else {
                    $('#next-page').remove();
                    $('#next').addClass("disabled");
                }
                hideLoading();
            },
            error: function(response) {
                alert("Không thể tải trang này!");
                hideLoading();
            }
        });
    }

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
                $("#updateArticleForm").attr("action", "<?= Router::url(['controller'=>'articles', 'action'=>'approve']); ?>");
                $("#updateArticleForm").attr("method", "POST");
                $("#updateArticleForm").attr("id", "approveArticleForm");
                $("#article-content").val(response.article.content);
                $("#edit-request").val(response.article.content);
                $(".btn-save").val("Duyệt");
                $("#title").val(response.article.title);
                $("#user-email").val(response.article.user);
                $("#btnCancel").attr('articleId', articleId);

                
            },
            error: function(response) {
                alert("Không thể tải form này!");
            }
        });
    }

    function approve(articleId) {
        showLoading();
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

    function cancel() {
        showLoading();
        var url = '<?= $this->Url->build([
                        'controller' => 'articles',
                        'action' => 'cancel'
                    ]); ?>';

        var articleId = $('#btnCancel').attr('articleId');

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: {
                id: articleId,
            },
            cache: false,

            success: function(response) {
                alert("Đã hủy bài đăng");
                back();
            },
            error: function(response) {
                alert("Không thể hủy!");
                back();
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
                alert("Bài đăng đã được hủy");
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("sorting-table").deleteRow(i);

            },
            error: function(response) {
                alert("Không thể hủy bài đăng!");
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
        $('#now-page').addClass('disabled');
        hideLoading();
        $('#page').attr('style', 'font-size:0.7rem;');
    });
    
</script>
</body>