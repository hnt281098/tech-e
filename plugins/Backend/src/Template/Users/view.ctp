<body>
    <?= $this->element('pre-load'); ?>
    <div class="page">

        <?= $this->element('header'); ?>
        <?= $this->element('left-bar'); ?>

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

                        <button onclick="addUser()" class="btn btn-success btn-square mr-1 mb-2">Thêm người dùng</button>

                        <!-- Sorting -->
                        <div class="widget has-shadow">
                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                <h4>Sorting</h4>
                            </div>
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <table id="sorting-table" class="table mb-0 no-footer thai">
                                        <thead>
                                            <tr>
                                                <?php
                                                $fields = array_keys($users[0]->toArray());
                                                foreach ($fields as $field) {
                                                    ?>
                                                    <th><?= str_replace('_', ' ', ucwords($field)) ?></th>
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
                                                        <a href="#"><i class="la la-edit edit"></i></a>
                                                        <a onclick="submitDelete(<?= $user['id'] ?>, this)"><i class="la la-close delete"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>

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

    </div>
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
                    <div class="section-title mt-5 mb-2">
                        <h2 class="text-gradient-01">Hello!</h2>
                    </div>
                    <p class="mb-5">And GoodBye :)</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Auto Close Modal -->
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
        '../backend/template/js/components/tables/tables',
        '../backend/template/vendors/js/nicescroll/nicescroll.min',
        '../backend/template/vendors/js/datepicker/moment.min',
        '../backend/template/vendors/js/datepicker/daterangepicker',
        
        
        
        
    ));
    ?>

    <script>
        function submitDelete(userId, r) {
            $.ajax({
                url: 'delete',
                dataType: 'json',
                type: 'delete',
                data: {
                    id: userId
                },
                cache: false,

                success: function(response) {
                    alert("User deleted");
                    var i = r.parentNode.parentNode.rowIndex;
                    document.getElementById("sorting-table").deleteRow(i);

                },
                error: function(response) {
                    alert("Delete fail");
                }
            });
        }

        function addUser() {
            // alert('adsfasdef');
            // document.getElementById('addUser').style.display = "block";
            // document.getElementById('content').style.display = "none";
            $.ajax({
                url: 'add',
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
                    alert("Add fail, try again please");
                }
            });
        }

        function submitAddButton(form) {
            var formData = $(form).serializeArray();
            var inputs = [];
            formData.forEach(function(v, i){
                inputs[v.name] = v.value;
            });
            $.ajax({
                url: 'add',
                dataType: 'json',
                type: 'POST',
                data : {
                    email : inputs['email'],
                    password : inputs['password'],
                    facebook : inputs['facebook'],
                    instagram : inputs['instagram'],
                    fullname : inputs['fullname'],
                    birthday : inputs['birthday'],
                    gender : inputs['gender'],
                    role_id : inputs['role_id'],
                    status : inputs['status'],
                },
                cache: false,

                success: function(response) {
                    alert("SDA");
                    //$('#showModal').click();
                    // $('#addUserForm').trigger("reset");

                },
                error: function(response) {
                    alert("Add fail, try again please");
                },
            });
        }
    </script>
</body>