<?php use Cake\Routing\Router; ?>
<!-- <div id="addUser" class="content-inner" style="display:none">     -->
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 id="formTitle" class="page-header-title">Thêm danh mục</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                        <li class="breadcrumb-item"><a id="link-back" href="#">Về danh sách</a></li>
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
                    <form id="addCategoryForm" class="form-horizontal">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Tên</label>
                            <div class="col-lg-9">
                                <input id="name" name="name" value="" type="text" class="form-value form-control">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Mô tả</label>
                            <div class="col-lg-9">
                                <input id="description" name="description" type="text" class="form-value form-control">
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
                        <div id="parent-category-choose" class="form-group row mb-5">
                            <label class="col-lg-3 form-control-label">Danh mục cha</label>
                            <div class="col-lg-9 select mb-3">
                                <select id="parent-category" name="parent_id" class="custom-select form-control">
                                </select>
                            </div>
                        </div>

                        <!-- Begin Auto Close Modal -->
                        <div class="row">
                            <div class="col-xl-8 d-flex align-items-center mb-3">
                                <a href="javascript: void(0)" id="submitAddButton"  class="btn btn-gradient-01" style="padding: 22px 50px; left: 50%;">Thêm</a>
                                <button id="showModal" type="button" class="btn btn-gradient-01" data-toggle="modal" data-target="#delay-modal" style="display: none;"></button>
                                <!-- onclick="submitAddButton(this.form)" -->
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
   