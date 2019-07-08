<?php use Cake\Routing\Router; ?>
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Quản lý người dùng</h2>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-xl-12">

            <button onclick="addUser()" class="btn btn-success btn-square mr-1 mb-2 add-user">Thêm người dùng</button>

            <!-- Sorting -->
            <div class="widget has-shadow">
               <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0 thai">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label style="color: black;">Tìm kiếm theo
                                    <select id="search-field" style="display:inline; border-style: none;">
                                        <option value="fullname">Full name</option>
                                        <option value="email">Email</option>
                                        <option value="id">Id</option>
                                        <option value="gender">Gender</option>
                                        <option value="status">Status</option>
                                        <option value="role">Role</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>
                                    </select>
                                    <input style="margin-top: 7px;" id="search-input" name="search-input" type="text" class="form-control">
                                    </label> 
                                    
                                    <a class="btn" id="btnSearch"  href="#"><i style="top: 50px;" class="la la-search la-2x"></i></a>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <?php
                                    $fields = array_keys($users[0]->toArray());
                                    foreach ($fields as $field) {
                                        ?>
                                        <th style="text-align:center;"><?= str_replace('_', ' ', ucwords($field)) ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <?php foreach ($fields as $field) : ?>
                                            <?php if ($field == "status") : ?>
                                                <td>
                                                    <?php if ($user["status"] == 1) : ?>
                                                        <span><span class="badge-text badge-text-small info">Active</span></span></td>
                                                <?php else : ?>
                                                    <span><span class="badge-text badge-text-small danger">Inactive</span></span></td>
                                                <?php endif; ?>
                                                </td>
                                            <?php else : ?>
                                                <td><?= $user[$field] ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td class="td-actions">
                                            <a onclick="updateUser(<?= $user['id'] ?>)" href="#"><i class="la la-edit edit"></i></a>
                                            <a onclick="submitDelete(<?= $user['id'] ?>, this)" href="#"><i class="la la-close delete"></i></a>
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
                            <li class="paginate_button page-item previous disabled" id="previous"><a onclick="list(<?=$pageIndex - 1?>)" href="#" aria-controls="sorting-table" data-dt-idx="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a id="now-page" href="#" aria-controls="sorting-table" data-dt-idx="1" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a id="next-page" onclick="list(<?=$pageIndex + 1 ?>)" href="#" aria-controls="sorting-table" data-dt-idx="2" class="page-link">2</a></li>
                            <li class="paginate_button page-item next" id="next"><a onclick="list(<?=$pageIndex + 1 ?>)" href="#" aria-controls="sorting-table" data-dt-idx="3" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->
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
         
                    <p class="mb-5">Add success!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Auto Close Modal -->
</div>
<!-- end div for left-bar element -->
</div>
<!-- Begin Vendor Js -->
<?php echo $this->Html->script(array(
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
                        'controller' => 'users',
                        'action' => 'search'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            data: {
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
    function list(pageIndex) {
            showLoading();
            var url = '<?= $this->Url->build([
                            'controller' => 'users',
                            'action' => 'view'
                        ]); ?>';
            $.ajax({
                url: url,
                dataType: 'json',
                type: 'GET',
                cache: false,
                data: {
                    pageIndex: pageIndex,
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
                    
                    if (response.responseJSON.timeout == true) {
                        alert("Phiên hết hạn, mời đăng nhập lại");
                        window.location= '<?= Router::url(['controller' => 'users', 'action' => 'login']) ?>';
                    }
                    else {
                        alert("Không thể tải trang này!");
                        hideLoading();
                    }
                }
            });
        }
    function submitDelete(userId, r) {
        var url = '<?= $this->Url->build([
                        'controller' => 'users',
                        'action' => 'delete'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'delete',
            data: {
                id: userId
            },
            cache: false,
            success: function(response) {
                alert("Đã vô hiệu hóa tài khoản");
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("sorting-table").deleteRow(i);
            },
            error: function(response) {
                alert("Không thể vô hiệu hóa tài khoản này!");
            }
        });
    }
    function addUser() {
        var url = '<?= $this->Url->build([
                        'controller' => 'users',
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
                for (i = 0; i < response.roles.length; i++) {
                    name = response.roles[i].name;
                    name = name.charAt(0).toUpperCase() + name.slice(1);
                    selections = selections + ' <option value=' + response.roles[i].id + '>' + name + '</option>'
                }
                $('#role').html(selections);
            },
            error: function(response) {
                alert("Không thể tải form này!");
            }
        });
    }
    function updateUser(userId) {
        var url = '<?= $this->Url->build([
                        'controller' => 'users',
                        'action' => 'update'
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            data: {
                id: userId
            },
            success: function(response) {
                $('#content').html(response.html);
                var selections = "";
                for (i = 0; i < response.roles.length; i++) {
                    name = response.roles[i].name;
                    name = name.charAt(0).toUpperCase() + name.slice(1);
                    selections = selections + ' <option value=' + response.roles[i].id + '>' + name + '</option>'
                }
                $('#role').html(selections);
                document.getElementById("formTitle").innerHTML = "Sửa thông tin người dùng";
                $('#id').attr("name", "id");
                $('#id').val(userId);
                $('#email').val(response.user.email);
                $('#password').remove();
                $('#passLabel').hide();
                $('#facebook').val(response.user.facebook);
                $('#instagram').val(response.user.instagram);
                $('#fullname').val(response.user.fullname);
                $('.btn-save').text('Lưu');
                $(".btn-save").attr("userId", userId);
                $("#addUserForm").attr("action", "<?= Router::url(['controller'=>'users', 'action'=>'update']); ?>");
                $("#addUserForm").attr("method", "POST");
                $("#addUserForm").attr("id", "updateUserForm");
                
                if (response.user.gender == "Nam") {
                    $('#radMale').attr("checked", "checked");
                } else {
                    $('#radFemale').attr("checked", "checked");
                }
                if (response.user.status == 1) {
                    $('#radActive').attr("checked", "checked");
                } else {
                    $('#radInactive').attr("checked", "checked");
                }
                if (response.user.birthday != null) {
                    $('input[name=birthday]').val(response.user.birthday);
                }
            },
            error: function(response) {
                alert("Không thể tải form này!");
            }
        });
    }
    function back() {
        showLoading();
        var url = '<?= $this->Url->build([
                            'controller' => 'users',
                            'action' => 'view'
                        ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
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