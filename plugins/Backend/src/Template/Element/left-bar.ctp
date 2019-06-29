<!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        
                        <span class="heading">Hoạt động</span>
                        <ul class="list-unstyled">
                            <a href="/tech-e/backend/users/view" ><i class="la la-users"></i><span>Quản lý người dùng</span></a>
                            <li><a href="#dropdown-authentication" aria-expanded="false" data-toggle="collapse"><i class="la la-list list"></i><span>Quản lý bài đăng</span></a>
                                <ul id="dropdown-authentication" class="collapse list-unstyled pt-0">
                                    <li><a method ="GET" href="/tech-e/backend/articles/view?article_status_id=1">Đã duyệt</a></li>
                                    <li><a method ="GET" href="/tech-e/backend/articles/view?article_status_id=2">Chờ duyệt</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown-authentication" aria-expanded="false" data-toggle="collapse"><i class="la la-list list"></i><span>Quản lý danh mục</span></a>
                                <ul id="dropdown-authentication" class="collapse list-unstyled pt-0">
                                    <li><a href="/tech-e/backend/users/view?type=parent">Danh mục lớn</a></li>
                                    <li><a href="/tech-e/backend/users/view?type=children">Danh mục nhỏ</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                        <!-- End Main Navigation -->
                    </nav>
                    <!-- End Side Navbar -->
                </div>
                <!-- End Left Sidebar -->