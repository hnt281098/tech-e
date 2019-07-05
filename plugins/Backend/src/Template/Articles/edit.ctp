<?php use Cake\Routing\Router; ?>
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 id="formTitle" class="page-header-title">Sửa bài đăng</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                        <li class="breadcrumb-item"><a onclick="back()" id="link-back" href="#">Về danh sách</a></li>
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
                    <form id="updateArticleForm" class="form-horizontal">
                        <div class="row d-flex align-items-center mb-5 thai">
                            <label id="signinInfo" class="col-lg-3 form-control-label">Nội dung</label>
                            <div class="col-lg-9">
                                <div class="mt-5 mb-5 position-relative">
                                    <div class="group material-input thai">
                                        <textarea class="thai" rows="50" cols="500" form="addArticleForm" id="article-content" onkeydown="down(this)"  name="content" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="id">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Trạng thái</label>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="styled-radio">
                                        <input type="radio" value=1 name="status_id" id="radDaduyet">
                                        <label for="radDaduyet">Đã duyệt</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="styled-radio">
                                        <input type="radio" value=2 name="status_id" id="radChoDuyet">
                                        <label for="radChoDuyet">Chờ duyệt</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-3 form-control-label">Người đăng</label>
                            <div class="col-lg-9 select mb-3">
                                <select id="users" name="user_id" class="custom-select form-control">
                                </select>
                            </div>
                        </div>

                        <!-- Begin Auto Close Modal -->
                        <div class="row">
                            <div class="col-xl-8 d-flex align-items-center mb-3">
                                <button type="submit" class="btn-save btn btn-gradient-01" style="padding: 22px 50px; left: 50%;">Cập nhật</button>
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
  