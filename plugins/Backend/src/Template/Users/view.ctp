<body>
        <?= $this->element('pre-load'); ?>
            <div class="page">

                <?= $this->element('header'); ?>
                <?= $this->element('left-bar'); ?>
                <div id="addUser" class="content-inner" style="display:none">    
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Thêm người dùng</h2>  
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <form class="form-horizontal">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Mật khẩu</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Họ tên</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Ngày sinh</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Giới tính</label>
                                <div class="col-sm-9">
                                    <div class="mb-3">
                                        <div class="styled-radio">
                                            <input type="radio" name="radio" id="rad-1">
                                            <label for="rad-1">Nam</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="styled-radio">
                                            <input type="radio" name="radio" id="rad-2" checked>
                                            <label for="rad-2">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-lg-3 form-control-label">Vai trò</label>
                                <div class="col-lg-9 select mb-3">
                                    <select name="account" class="custom-select form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Trạng thái</label>
                                <div class="col-sm-9">
                                    <div class="mb-3">
                                        <div class="styled-radio">
                                            <input type="radio" name="radio" id="rad-1">
                                            <label for="rad-1">Hoạt động</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="styled-radio">
                                            <input type="radio" name="radio" id="rad-2" checked>
                                            <label for="rad-2">Không hoạt động</label>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Placeholder</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="placeholder" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Disabled</label>
                                <div class="col-lg-9">
                                    <input type="text" disabled="" placeholder="Disabled input here..." class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Checkboxes</label>
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <div class="styled-checkbox">
                                            <input type="checkbox" name="checkbox" id="check-1">
                                            <label for="check-1">Default</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="styled-checkbox">
                                            <input type="checkbox" name="checkbox" id="check-2" checked>
                                            <label for="check-2">Checked</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="checkbox-disabled styled-checkbox">
                                            <input type="checkbox" name="checkbox" id="check-disabled" disabled>
                                            <label for="check-disabled">Disabled</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="checkbox-disabled styled-checkbox">
                                            <input type="checkbox" name="checkbox" checked disabled>
                                            <label for="check-disabled">Checked and Disabled</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Radios</label>
                                <div class="col-sm-9">
                                    <div class="mb-3">
                                        <div class="styled-radio">
                                            <input type="radio" name="radio" id="rad-1">
                                            <label for="rad-1">Default</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="styled-radio">
                                            <input type="radio" name="radio" id="rad-2" checked>
                                            <label for="rad-2">Checked</label>
                                        </div>
                                    </div>
                                    

                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Color</label>
                                <div class="col-lg-9">
                                    <input type="color" value="#5d5386" class="form-control pt-3 pb-3">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Single Date</label>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="la la-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control" id="date" placeholder="Select value">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Date Range</label>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="la la-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control" id="daterange" placeholder="Select value">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Date Time</label>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="la la-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control" id="datetime" placeholder="Select value">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label class="col-lg-3 form-control-label">Select</label>
                                <div class="col-lg-9 select mb-3">
                                    <select name="account" class="custom-select form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                    </select>
                                </div>
                                <div class="col-lg-9 offset-lg-3 select">
                                    <select multiple="" class="custom-select form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5 has-success">
                                <label class="col-lg-3 form-control-label text-success">Input Success</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5 has-danger">
                                <label class="col-lg-3 form-control-label text-danger">Input Danger</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5 has-warning">
                                <label class="col-lg-3 form-control-label text-warning">Input Warning</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5 has-info">
                                <label class="col-lg-3 form-control-label text-info">Input Info</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Control Sizing</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text" placeholder=".input-lg" class="form-control form-control-lg">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Default input" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder=".input-sm" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 form-control-label">Column Sizing</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="text" placeholder=".col-md-4" class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" placeholder=".col-md-4" class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" placeholder=".col-md-4" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Material Inputs</label>
                                <div class="col-lg-9">
                                    <div class="mt-5 mb-5 position-relative">
                                        <div class="group material-input">
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-5 position-relative">
                                        <div class="group material-input">
                                            <input type="password" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Input Groups</label>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon addon-primary">
                                                <i class="la la-user"></i>
                                            </span>
                                            <input type="text" placeholder="With icon" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon addon-primary">.00</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon addon-primary">$</span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon addon-orange">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Button addons</label>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary ripple">
                                                    Button
                                                </button>
                                            </span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-secondary">
                                                    <i class="la la-phone"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->
    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
    <!-- Offcanvas Sidebar -->
    <div class="off-sidebar from-right">
        <div class="off-sidebar-container">
            <header class="off-sidebar-header">
                <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                    <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Messages</a></li>
                    <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Today</a></li>
                </ul>
                <a href="#off-canvas" class="off-sidebar-close"></a>
            </header>
            <div class="off-sidebar-content offcanvas-scroll auto-scroll">
                <div class="tab-content">
                    <!-- Begin Messenger -->
                    <div role="tabpanel" class="tab-pane show active fade" id="messenger" aria-labelledby="messenger-tab">
                        <!-- Begin Chat Message -->
                        <span class="date">Today</span>
                        <div class="messenger-message messenger-message-sender">
                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-02.jpg" alt="...">
                            <div class="messenger-message-wrapper">
                                <div class="messenger-message-content">
                                    <p>
                                        <span class="mb-2">Brandon wrote</span>
                                        Hi David, what's up?
                                    </p>
                                </div>
                                <div class="messenger-details">
                                    <span class="messenger-message-localization font-size-small">2 minutes ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="messenger-message messenger-message-recipient">
                            <div class="messenger-message-wrapper">
                                <div class="messenger-message-content">
                                    <p>
                                        Hi Brandon, fine and you?
                                    </p>
                                    <p>
                                        I'm working on the next update of Elisyam
                                    </p>
                                </div>
                                <div class="messenger-details">
                                    <span class="messenger-message-localisation font-size-small">3 minutes ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="messenger-message messenger-message-sender">
                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-02.jpg" alt="...">
                            <div class="messenger-message-wrapper">
                                <div class="messenger-message-content">
                                    <p>
                                        <span class="mb-2">Brandon wrote</span>
                                        I can't wait to see
                                    </p>
                                </div>
                                <div class="messenger-details">
                                    <span class="messenger-message-localization font-size-small">5 minutes ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="messenger-message messenger-message-recipient">
                            <div class="messenger-message-wrapper">
                                <div class="messenger-message-content">
                                    <p>
                                        I'm almost done
                                    </p>
                                </div>
                                <div class="messenger-details">
                                    <span class="messenger-message-localisation font-size-small">10 minutes ago</span>
                                </div>
                            </div>
                        </div>
                        <span class="date">Yesterday</span>
                        <div class="messenger-message messenger-message-sender">
                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-05.jpg" alt="...">
                            <div class="messenger-message-wrapper">
                                <div class="messenger-message-content">
                                    <p>
                                        I updated the server tonight
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="messenger-message messenger-message-recipient">
                            <div class="messenger-message-wrapper">
                                <div class="messenger-message-content">
                                    <p>
                                        Didn't you have any problems?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="messenger-message messenger-message-sender">
                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-05.jpg" alt="...">
                            <div class="messenger-message-wrapper">
                                <div class="messenger-message-content">
                                    <p>
                                        No!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="messenger-message messenger-message-recipient">
                            <div class="messenger-message-wrapper">
                                <div class="messenger-message-content">
                                    <p>
                                        Great!
                                    </p>
                                    <p>
                                        See you later!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End Chat Message -->
                        <!-- Begin Message Form -->
                        <div class="enter-message">
                            <div class="enter-message-form">
                                <input type="text" placeholder="Enter your message..." />
                            </div>
                            <div class="enter-message-button">
                                <a href="#" class="send"><i class="ion-paper-airplane"></i></a>
                            </div>
                        </div>
                        <!-- End Message Form -->
                    </div>
                    <!-- End Messenger -->
                    <!-- Begin Today -->
                    <div role="tabpanel" class="tab-pane fade" id="today" aria-labelledby="today-tab">
                        <!-- Begin Today Stats -->
                        <div class="sidebar-heading pt-0">Today</div>
                        <div class="today-stats mt-3 mb-3">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <i class="la la-users"></i>
                                    <div class="counter">264</div>
                                    <div class="heading">Clients</div>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="la la-cart-arrow-down"></i>
                                    <div class="counter">360</div>
                                    <div class="heading">Sales</div>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="la la-money"></i>
                                    <div class="counter">$ 4,565</div>
                                    <div class="heading">Earnings</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Today Stats -->
                        <!-- Begin Friends -->
                        <div class="sidebar-heading">Friends</div>
                        <div class="quick-friends mt-3 mb-3">
                            <ul class="list-group w-100">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-3">
                                            <img src="assets/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <a href="javascript:void(0);">Brandon Smith</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-3">
                                            <img src="assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <a href="javascript:void(0);">Louis Henry</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-3">
                                            <img src="assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <a href="javascript:void(0);">Nathan Hunter</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-3">
                                            <img src="assets/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <a href="javascript:void(0);">Megan Duncan</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-3">
                                            <img src="assets/img/avatar/avatar-06.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <a href="javascript:void(0);">Beverly Oliver</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Friends -->
                        <!-- Begin Settings -->
                        <div class="sidebar-heading">Settings</div>
                        <div class="quick-settings mt-3 mb-3">
                            <ul class="list-group w-100">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <p class="text-dark">Notifications Email</p>
                                        </div>
                                        <div class="media-right align-self-center">
                                            <label>
                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                <span>
                                                    <span></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <p class="text-dark">Notifications Sound</p>
                                        </div>
                                        <div class="media-right align-self-center">
                                            <label>
                                                <input class="toggle-checkbox" type="checkbox">
                                                <span>
                                                    <span></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <p class="text-dark">Chat Message Sound</p>
                                        </div>
                                        <div class="media-right align-self-center">
                                            <label>
                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                <span>
                                                    <span></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Settings -->
                    </div>
                    <!-- End Today -->
                </div>
            </div>
            <!-- End Offcanvas Container -->
        </div>
        <!-- End Offsidebar Container -->
    </div>
    <!-- End Offcanvas Sidebar -->
</div>



                <div id="content" class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Quản lý người dùng</h2>
	                                <div>
			                            <ul class="breadcrumb">
			                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
			                                <li class="breadcrumb-item active">Quản lý người dùng</li>
			                            </ul>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <div class="row">
                            <div class="col-xl-12">

                                <button onclick="addUser(this)" class="btn btn-success btn-square mr-1 mb-2">Thêm người dùng</button>

                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Sorting</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="sorting-table" class="table mb-0 no-footer">
                                                <thead>
                                                    <tr>
                                                        <?php 
                                                            $fields = array_keys($users[0]->toArray());
                                                            foreach ($fields as $field) { 
                                                        ?>
                                                            <th style="max-width:100px;"><?=str_replace('_', ' ', ucwords($field))?></th>
                                                        <?php } ?>  
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($users as $user) {?>
                                                        <tr>
                                                            <?php foreach ($fields as $field) { 
                                                                if ($field == "status") { ?> 
                                                                    <td style="max-width:100px;">
                                                                    <?php if ($user[$field] == 1) { ?>
                                                                        <span style="max-width:100px;"><span class="badge-text badge-text-small info">Active</span></span></td>
                                                                    <?php }else{ ?>
                                                                        <span style="max-width:100px;"><span class="badge-text badge-text-small danger">Inactive</span></span></td>
                                                                    <?php } ?>
                                                                    </td>
                                                                <?php }else{ ?>
                                                                    <td><?=$user[$field]?></td>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <td class="td-actions">
                                                                <a href="#"><i class="la la-edit edit"></i></a>
                                                                <a onclick="submitDelete(<?=$user['id']?>, this)"><i class="la la-close delete"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                    <!-- Offcanvas Sidebar -->
                    <div class="off-sidebar from-right">
                        <div class="off-sidebar-container">
                            <header class="off-sidebar-header">
                                <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                                    <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Messages</a></li>
                                    <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Today</a></li>
                                </ul>
                                <a href="#off-canvas" class="off-sidebar-close"></a>
                            </header>
                            <div class="off-sidebar-content offcanvas-scroll auto-scroll">
                                <div class="tab-content">
                                    <!-- Begin Messenger -->
                                    <div role="tabpanel" class="tab-pane show active fade" id="messenger" aria-labelledby="messenger-tab">
                                        <!-- Begin Chat Message -->
                                        <span class="date">Today</span>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-02.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        <span class="mb-2">Brandon wrote</span>
                                                        Hi David, what's up?
                                                    </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localization font-size-small">2 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Hi Brandon, fine and you?
                                                   </p>
                                                    <p>
                                                       I'm working on the next update of Elisyam
                                                   </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localisation font-size-small">3 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-02.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        <span class="mb-2">Brandon wrote</span>
                                                        I can't wait to see
                                                    </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localization font-size-small">5 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       I'm almost done
                                                   </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localisation font-size-small">10 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="date">Yesterday</span>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-05.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        I updated the server tonight
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Didn't you have any problems?
                                                   </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-05.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        No!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Great!
                                                   </p>
                                                    <p>
                                                       See you later!
                                                   </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Chat Message -->
                                        <!-- Begin Message Form -->
                                        <div class="enter-message">
                                            <div class="enter-message-form">
                                                <input type="text" placeholder="Enter your message..."/>
                                            </div>
                                            <div class="enter-message-button">
                                                <a href="#" class="send"><i class="ion-paper-airplane"></i></a>
                                            </div>
                                        </div>
                                        <!-- End Message Form -->
                                    </div>
                                    <!-- End Messenger -->
                                    <!-- Begin Today -->
                                    <div role="tabpanel" class="tab-pane fade" id="today" aria-labelledby="today-tab">
                                        <!-- Begin Today Stats -->
                                        <div class="sidebar-heading pt-0">Today</div>
                                        <div class="today-stats mt-3 mb-3">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <i class="la la-users"></i>
                                                    <div class="counter">264</div>
                                                    <div class="heading">Clients</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-cart-arrow-down"></i>
                                                    <div class="counter">360</div>
                                                    <div class="heading">Sales</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-money"></i>
                                                    <div class="counter">$ 4,565</div>
                                                    <div class="heading">Earnings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Today Stats -->
                                        <!-- Begin Friends -->
                                        <div class="sidebar-heading">Friends</div>
                                        <div class="quick-friends mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Brandon Smith</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Louis Henry</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Nathan Hunter</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Megan Duncan</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-06.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Beverly Oliver</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Friends -->
                                        <!-- Begin Settings -->
                                        <div class="sidebar-heading">Settings</div>
                                        <div class="quick-settings mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Email</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox">
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Chat Message Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Settings -->
                                    </div>
                                    <!-- End Today -->
                                </div>
                            </div>
                            <!-- End Offcanvas Container -->
                        </div>
                        <!-- End Offsidebar Container -->
                    </div>
                    <!-- End Offcanvas Sidebar -->
                </div>
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Vendor Js -->
        <?= $this->Html->script(array(
                '../backend/template/vendors/js/base/jquery.min',
                '../backend/template/vendors/js/base/core.min',
                '../backend/template/vendors/js/datatables/datatables.min',
                '../backend/template/vendors/js/datatables/dataTables.buttons.min',
                '../backend/template/vendors/js/datatables/jszip.min',
                '../backend/template/vendors/js/datatables/buttons.html5.min',
                '../backend/template/vendors/js/datatables/pdfmake.min.js',
                '../backend/template/vendors/js/datatables/vfs_fonts.js',
                '../backend/template/vendors/js/datatables/buttons.print.min',
                '../backend/template/vendors/js/nicescroll/nicescroll.min',
                '../backend/template/js/components/tables/tables',
            ));
        ?>

        <script> 
            function submitDelete (userId, r) {
                $.ajax({
                    url: 'delete',
                    dataType: 'json',
                    type: 'delete',
                    data: {
                        id : userId
                    },
                    cache: false,
                    
                    success: function (response) {
                        alert("User deleted");
                        var i = r.parentNode.parentNode.rowIndex;
                        document.getElementById("sorting-table").deleteRow(i);

                    },
                    error: function (response) {
                        alert("Delete fail");
                    }
                });
            }

            function addUser(r) {
              
                document.getElementById('addUser').style.display = "block";
                document.getElementById('content').style.display = "none";
            }
        </script>   
    </body>
