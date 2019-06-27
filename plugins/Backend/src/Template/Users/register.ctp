<?php use Cake\Routing\Router; ?>
<body class="bg-white">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <?= $this->Html->image('Backend.logo.png'); ?>
            <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->  
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                    <div class="elisyam-bg background-01">
                        <div class="elisyam-overlay overlay-01"></div>
                        <div class="authentication-col-content mx-auto">
                            <h1 class="gradient-text-01">
                                Tech-Entrance
                            </h1>
                            <span class="description">
                                Cung cấp thông tin bạn cần tìm một cách nhanh chóng nhất, chính xác nhất.  Chúng tôi chân thành cảm ơn bạn đã tin tưởng Tech-E magazine.
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="db-default.html">
                                <?= $this->Html->image('Backend.logo.png', ["alt" => "logo"]); ?>   
                            </a>
                        </div>
                        <h3>Welcome to TechE-Magazine !!!</h3>
                        <form method="post" enctype="multipart/form-data">
                            <img src="" id="img" width="90" height="90">
                            <label for="avatar" class="btn btn-info mr-1 mb-2">Tải ảnh lên</label>
                            <div class="group material-input">
                                <input name="avatar" type="file" id="avatar" class="inputfile">
                            </div>
                            <div class="group material-input">
                                <input name="email" type="text" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                            </div>
                            <div class="group material-input">
                                <input name="fullname" type="text" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Họ tên</label>
                            </div>
                            <div class="group material-input">
                                <select name="gender" class="custom-select form-control">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                            <div class="group material-input">
                                <input name="birthday" type="text" class="form-control" id="date" placeholder="Select value">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Ngày sinh</label>
                            </div>
                            <div class="group material-input">
                                <input name="password" type="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Mật khẩu</label>
                            </div>
                            <div class="group material-input">
                                <input type="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Xác nhận mật khẩu</label>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col text-left">
                                <div class="styled-checkbox">
                                    <input type="checkbox" name="agree" id="agree">
                                    <label for="agree">Tôi đồng ý với <a href="<?= Router::url(['controller'=>'informations', 'action'=>'termsConditions', 'plugin' => false]) ?>">điều khoản và điều kiện</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <a href="db-default.html" class="btn btn-lg btn-gradient-01">
                                Tạo tài khoản
                            </a>
                        </div>
                        <div class="register">
                            Bạn đã có tài khoản?
                            <br>
                            <a href="<?= Router::url(['controller'=>'users', 'action'=>'login']) ?>">Đăng nhập ngay</a>
                        </div>  
                    </div>
                    <!-- End Form -->                        
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container --> 
    </body>
    <script>
        
            function uploadAvatar(){
                var fd = new FormData();
                var files = $('#avatar')[0].files[0];
                fd.append('file', files);
                var temp = fd.get('file');
                alert(temp['tmp_name']);

                // $.ajax({
                //     url: '<?= Router::url(['controller'=>'users', 'action'=>'uploadAvatar']) ?>',
                //     type: 'GET',
                //     data: { 
                //         name: name,
                //         tmp_name: tmp_name,
                //     },
                //     success: function(response){
                //         $('#img').attr('src', response);
                //     },
                //     error: function(response){
                //         alert('Không thể upload file...');
                //     }
                // });
            };
        </script>