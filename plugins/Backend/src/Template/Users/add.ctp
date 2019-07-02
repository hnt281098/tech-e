<?php use Cake\Routing\Router; ?>
<!-- <div id="addUser" class="content-inner" style="display:none">     -->
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 id="formTitle" class="page-header-title">Thêm người dùng</h2>
                <div>
                    <ul class="breadcrumb thai">
                        <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                        <li class="breadcrumb-item "><a onclick="back()" href="#">Về danh sách</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-12">
            <!-- Form -->  
            <div class="widget has-shadow">
                <div class="widget-body">
                    <?php ?>
                    <form id="addUserForm" class="form-horizontal" method="POST" action="<?= Router::url(['controller'=>'users', 'action'=>'add']); ?>">
                        <input type="hidden" id="id">
                        <div class="row d-flex align-items-center mb-5">
                            <label id="signinInfo" class="col-lg-3 form-control-label">Thông tin đăng nhập</label>
                            <div class="col-lg-9">
                                <div class="mt-5 mb-5 position-relative">
                                    <div class="group material-input">
                                        <input id="email" name="email" type="text" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div id="password" class="mt-5 mb-5 position-relative">
                                    <div class="group material-input">
                                        <input  name="password" type="password" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label id="passLabel">Mật khẩu</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Facebook</label>
                            <div class="col-lg-9">
                                <input id="facebook" name="facebook" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Instagram</label>
                            <div class="col-lg-9">
                                <input id="instagram" name="instagram" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Họ tên</label>
                            <div class="col-lg-9">
                                <input id="fullname" name="fullname" type="fullname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Ngày sinh</label>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="la la-calendar"></i>
                                        </span>
                                        <input name="birthday" type="text" class="form-control" id="date" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Giới tính</label>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="styled-radio">
                                        <input type="radio" value="Nam" name="gender" id="radMale">
                                        <label for="radMale">Nam</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="styled-radio">
                                        <input type="radio" value="Nữ" name="gender" id="radFemale">
                                        <label for="radFemale">Nữ</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-3 form-control-label">Vai trò</label>
                            <div class="col-lg-9 select mb-3">
                                <select id="role" name="role_id" class="custom-select form-control">
                                </select>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Trạng thái</label>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="styled-radio">
                                        <input type="radio" value=1 name="status" id="radActive">
                                        <label for="radActive">Hoạt động</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="styled-radio">
                                        <input type="radio" value=0 name="status" id="radInactive" >
                                        <label for="radInactive">Không hoạt động</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Begin Auto Close Modal -->
                        <div class="row">
                            <div class="col-xl-8 d-flex align-items-center mb-3">
                                <button type="submit" class="btn-save btn btn-gradient-01" style="padding: 22px 50px; left: 50%;">Thêm</button>
                                <!-- <a data-type="create" userId="" class="btn-save btn btn-gradient-01" style="padding: 22px 50px; left: 50%;">Lưu</a> -->
                                <button id="showModal" type="button" class="btn btn-gradient-01" data-toggle="modal" data-target="#delay-modal" style="display: none;"></button>
                            </div>
                        </div>
                        <!-- End Auto Close Modal -->
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>
<!-- End Container -->
<!-- End Page Footer -->
<a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
  