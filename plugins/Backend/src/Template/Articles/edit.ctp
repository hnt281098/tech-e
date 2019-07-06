<?php

use Cake\Routing\Router; ?>
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
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Title</label>
                            <div class="col-lg-9">
                                <input id="title" name="title" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mb-5 thai">
                            <label id="signinInfo" class="col-lg-3 form-control-label">Nội dung</label>
                            <div class="col-lg-9">
                                <div class="mt-5 mb-5 position-relative">
                                    <div class="group material-input thai">
                                        <textarea class="thai" rows=50 form="addArticleForm" id="article-content" onkeydown="down(this)" name="content" readonly></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="id">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Người đăng</label>
                            <div class="col-lg-9">
                                <input id="user-email" name="user" type="text" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- Begin Auto Close Modal -->
                        <div class="row">
                            <div class="col-xl-8 d-flex align-items-center mb-3">
                                <button onclick="showLoading()" type="submit" class="btn btn-secondary ripple mr-1 mb-2 ripple" style="padding: 22px 50px; left: 50%;"><i class="la la-check"></i>Duyệt</button> &nbsp;&nbsp;&nbsp;
                                <button type="submit" class="btn btn-secondary mr-1 mb-2 ripple" style="padding: 22px 50px; left: 50%;"><i class="la la-ban"></i>Hủy bài</button>&nbsp;&nbsp;&nbsp;
                                <button id="showModal" type="button" class="btn btn-gradient-01" data-toggle="modal" data-target="#delay-modal" style="display: none;"></button>
                            </div>
                        </div>
                        <!-- <div id="need-edit" class="row d-flex align-items-center mb-5 thai">
                            <label id="signinInfo" class="col-lg-3 form-control-label">Yêu cầu chỉnh sửa</label>
                            <div class="col-lg-9">
                                <div class="mt-5 mb-5 position-relative">
                                    <div class="group material-input thai">
                                        <textarea class="ckeditor" rows=5 form="addArticleForm" id="edit-request" onkeydown="down(this)" name="content" required></textarea>
                                        <script>
                                            CKEDITOR.replace('edit-request', {
                                                filebrowserBrowseUrl: '/tech-e/ckfinder/ckfinder.html',
                                                filebrowserUploadUrl: '/tech-e/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                filebrowserWindowWidth: '1000',
                                                filebrowserWindowHeight: '700'
                                            });
                                        </script>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-xl-8 d-flex align-items-center mb-3">
                                <button type="submit" class="btn btn-secondary ripple mr-1 mb-2" style="padding: 22px 50px; left: 50%;"><i class="la la-pencil"></i>Yêu cầu chỉnh sửa</button>
                            </div>
                        </div> -->
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