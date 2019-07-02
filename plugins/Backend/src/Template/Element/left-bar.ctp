<!-- Begin Page Content -->
<div class="page-content d-flex align-items-stretch">
    <div class="default-sidebar">
        <!-- Begin Side Navbar -->
        <nav class="side-navbar box-scroll sidebar-scroll">
            <!-- Begin Main Navigation -->

            <span class="heading">Hoạt động</span>
            <ul class="list-unstyled">
                <a onclick="viewUser()" href="#"><i class="la la-users"></i><span>Quản lý người dùng</span></a>
                <li><a href="#dropdown-authentication" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text file-text"></i><span>Quản lý bài đăng</span></a>
                    <ul id="dropdown-authentication" class="collapse list-unstyled pt-0">
                        <li><a onclick="viewArticles(1)" href="#">Đã duyệt</a></li>
                        <li><a onclick="viewArticles(2)" href="#">Chờ duyệt</a></li>
                    </ul>
                </li>
                <li><a href="#dropdown-generic" aria-expanded="false" data-toggle="collapse"><i class="la la-list list"></i><span>Quản lý danh mục</span></a>
                    <ul id="dropdown-generic" class="collapse list-unstyled pt-0">
                        <li><a onclick="viewCategories('parent')" href="#">Danh mục lớn</a></li>
                        <li><a onclick="viewCategories('children')" href="#">Danh mục nhỏ</a></li>
                    </ul>
                </li>
            </ul>

            <!-- End Main Navigation -->
        </nav>
        <!-- End Side Navbar -->
    </div>
    <!-- End Left Sidebar -->

    <script>
        $(document).ready(function() {

            if ('<?= $message ?>' != '') {
                alert('<?= $message ?>');
            }

            if ('<?= $currentPage ?>' == 'users') {
                viewUser();
            }
            
            if ('<?= $currentPage ?>' == 'categories') {
                var type = '<?= $type ?>';
                viewCategories(type);
            }

            if ('<?= $currentPage ?>' == 'articles') {
                var statusId = <?= $statusId ?>;
                viewArticles(statusId);
            }
        });

        function showLoading(){
            $('.loading').show();
            $('body').addClass('no-scroll');
        }
        function hideLoading(){
            $('.loading').hide();
            $('body').addClass('no-scroll');
        }

        function viewUser() {
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
                    hideLoading();
                },
                error: function(response) {
                    alert("Không thể tải form này!");
                    hideLoading();
                }
            });
        }

        function viewArticles(articleStatusId) {
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
                    article_status_id: articleStatusId,
                },
                success: function(response) {
                    $('#content').html(response.html);
                    hideLoading();
                },
                error: function(response) {
                    alert("Không thể tải form này!");
                    hideLoading();
                }
            });
        }

        function viewCategories(categoryType) {
            showLoading();
            var url = '<?= $this->Url->build([
                            'controller' => 'categories',
                            'action' => 'view'
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
                    hideLoading();

                },
                error: function(response) {
                    hideLoading();
                    alert("Không thể tải form này!");

                }
            });
        }
    </script>