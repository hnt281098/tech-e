<?php use Cake\Routing\Router; ?>
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title"><?= $type ?></h2>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-xl-12">

            <button onclick="add('<?= $type ?>')" class="btn btn-success btn-square mr-1 mb-2">Thêm danh mục</button>

            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><?= $type ?></h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0 thai">
                            <thead>
                                <tr>
                                    <?php
                                    $categories = $categories->toArray();
                                    $fields = array_keys($categories[0]->toArray());
                                    foreach ($fields as $field) {
                                        ?>
                                        <th style="text-align:center;"><?= str_replace('_', ' ', ucwords($field)) ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category) : ?>
                                    <tr>
                                        <?php foreach ($fields as $field) : ?>
                                            <?php if ($field == "status") : ?>
                                                <td>
                                                    <?php if ($category["status"] == 1) : ?>
                                                        <span><span class="badge-text badge-text-small info">Active</span></span></td>
                                                <?php else : ?>
                                                    <span><span class="badge-text badge-text-small danger">Inactive</span></span></td>
                                                <?php endif; ?>
                                                </td>
                                            <?php else : ?>
                                                <td><?= $category[$field] ?></td>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                        <td class="td-actions">
                                            <a onclick="update(<?=$category['id']?>,'<?=$type?>')" href="#"><i class="la la-edit edit"></i></a>
                                            <a onclick="submitDelete(<?= $category['id'] ?>, this)" href="#"><i class="la la-close delete"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
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
                            <li class="paginate_button page-item previous" id="previous"><a href="#" aria-controls="sorting-table" data-dt-idx="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="sorting-table" data-dt-idx="1" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="sorting-table" data-dt-idx="2" class="page-link">2</a></li>
                            <li class="paginate_button page-item next disabled" id="next"><a href="#" aria-controls="sorting-table" data-dt-idx="3" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Row -->
    </div>
</div>
<!-- End Container -->
<!-- end div for left bar -->
</div>
<a href="#" class="go-top"><i class="la la-arrow-up"></i></a>

<!-- End Page Content -->
<!-- Begin Auto Close Modal -->
<div id="delay-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div id="hihi" class="sa-icon sa-success animate" style="display: block;">
                    <span class="sa-line sa-tip animateSuccessTip"></span>
                    <span class="sa-line sa-long animateSuccessLong"></span>
                    <div class="sa-placeholder"></div>
                    <div class="sa-fix"></div>
                </div>
                <!--                     <div class="section-title mt-5 mb-2">
                        <h2 class="text-gradient-01">Add success!</h2>
                    </div> -->
                <p class="mb-5">Add success!</p>
            </div>
        </div>
    </div>
</div>
<!-- End Auto Close Modal -->
</div>
<!-- Begin Vendor Js -->
<?= $this->Html->script(array(
    '../backend/template/vendors/js/base/jquery.min',
    '../backend/template/vendors/js/base/core.min',

    '../backend/template/vendors/js/datatables/datatables.min',
    '../backend/template/vendors/js/datatables/dataTables.buttons.min',
    '../backend/template/vendors/js/datatables/jszip.min',
    '../backend/template/vendors/js/datatables/buttons.html5.min',

    '../backend/template/vendors/js/datatables/vfs_fonts',

    '../backend/template/vendors/js/nicescroll/nicescroll.min',
    '../backend/template/vendors/js/datepicker/moment.min',
    '../backend/template/vendors/js/datepicker/daterangepicker',

    '../backend/template/vendors/js/app/app.min',
    '../backend/template/js/components/tables/tables',


    '../backend/template/js/components/datepicker/datepicker',
    '../backend/template/vendors/js/datepicker/moment.min',
    '../backend/template/vendors/js/datepicker/daterangepicker',
    '../backend/template/js/components/datepicker/datepicker',
));
?>

<script>
    function submitDelete(categoryId, r) {
        var url = '<?= $this->Url->build([
                        'controller' => 'categories',
                        'action' => 'delete'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'delete',
            data: {
                id: categoryId
            },
            cache: false,

            success: function(response) {
                alert("Category deleted");
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("sorting-table").deleteRow(i);
            },
            error: function(response) {
                alert("Delete fail");
            }
        });
    }

    function add(type) {
        var url = '<?= $this->Url->build([
                        'controller' => 'categories',
                        'action' => 'add'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            data: {
                type: type
            },

            success: function(response) {
                $('#content').html(response.html);

                if (type == 'Danh mục lớn') {
                    $('#parent-category-choose').remove();
                    $('#back').attr("onclick", "back('parent')");
                } 
                else {
                    $('#back').attr("onclick", "back('children')");
                    var selections = "";

                    for (i = 0; i < response.parentCategories.length; i++) {
                        name = response.parentCategories[i].name;
                        name = name.charAt(0).toUpperCase() + name.slice(1);
                        selections = selections + ' <option value=' + response.parentCategories[i].id + '>' + name + '</option>'
                    }
                    $('#parent-category').html(selections);
                }

            },
            error: function(response) {
                alert("Can not load form!");
            },
        });
    }

    function update(categoryId, type) {
        var url = '<?= $this->Url->build([
                        'controller' => 'categories',
                        'action' => 'update'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            data: {
                id: categoryId,
            },
            success: function(response) {
               
                $('#content').html(response.html);

                document.getElementById("formTitle").innerHTML = "Sửa thông tin danh mục";
                $('#id').attr("name", "id");
                $('#id').val(categoryId);
                $('#name').val(response.category.name);
                $('#description').val(response.category.description);
               
                if (response.category.status == 1) {
                    $('#radActive').attr("checked", "checked");
                } else {
                    $('#radInactive').attr("checked", "checked");
                }
                $('.btn-save').text('Lưu');
                $(".btn-save").attr("categoryId", categoryId);

                
                $("#addCategoryForm").attr("action", "<?= Router::url(['controller'=>'categories', 'action'=>'update']); ?>");
                $("#addCategoryForm").attr("method", "POST");
                $("#addCategoryForm").attr("id", "updateCategoryForm");

                if (type == 'Danh mục lớn') {
                    $('#parent-category-choose').remove();
                    $('#back').attr("onclick", "back('parent')");
                } 
                else {
                    $('#back').attr("onclick", "back('children')");
                    var selections = "";

                    for (i = 0; i < response.parentCategories.length; i++) {
                        name = response.parentCategories[i].name;
                        name = name.charAt(0).toUpperCase() + name.slice(1);
                        selections = selections + ' <option value=' + response.parentCategories[i].id + '>' + name + '</option>'
                    }
                    $('#parent-category').html(selections);
                }
            },
            error: function(response) {
                alert("Không thể load form này!");
            }
        });
    }

    function back(categoryType) {
        showLoading();
        $('#updateCategoryForm').empty();
        var url = '<?= $this->Url->build([
                            'controller' => 'categories',
                            'action' => 'view',
                        ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            data: {
                type: categoryType,
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