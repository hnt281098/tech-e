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
                        <h3>Welcome!</h3>
                        <form method="post" action="login">
                            <div class="group material-input" >
							    <input type="text" name="email" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label>Email</label>
                            </div>
                            <div class="group material-input">
							    <input type="password" name="password" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label>Mật khẩu</label>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="styled-checkbox">
                                        <input type="checkbox" name="checkbox" id="remeber">
                                        <label for="remeber">Remember me</label>
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <a href="pages-forgot-password.html">Forgot Password ?</a>
                                </div>
                            </div>
                            <div class="sign-btn text-center">
                                <input type="submit" class="btn btn-lg btn-gradient-01" value="Đăng nhập    ">
                            </div>
                        </form>
                        <div class="register">
                            Don't have an account? 
                            <br>
                            <a href="pages-register.html">Create an account</a>
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

    <!-- Begin Vendor Js -->
    <?= $this->Html->script(array(
        '../backend/template/vendors/js/base/jquery.min',
        '../backend/template/vendors/js/base/core.min',
    )); ?>