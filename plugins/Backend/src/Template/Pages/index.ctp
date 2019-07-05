


<body id="page">
    <?= $this->element('pre-load'); ?>
    <div class="loading" style="display: none">
        <div class="lds-hourglass"></div>
    </div>
    
    <div class="page">
        <?= $this->element('header'); ?>
        <?= $this->element('left-bar'); ?>

        <div id="content" class="content-inner">
            <div class="container-fluid">
                <!-- Begin Page Header-->
                <div class="row">
                    <div class="page-header">
                        <div class="d-flex align-items-center">
                            <h2 class="page-header-title">Widgets</h2>
                            <div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.html"><i class="ti ti-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Components</a></li>
                                    <li class="breadcrumb-item active">Widgets</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->
                <!-- Begin Row -->
                <div class="row flex-row">
                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <!-- Begin Widget 01 -->
                        <div class="widget widget-01 has-shadow">
                            <div class="widget-body no-padding">
                                <h3>Happy Customers <span class="text-green">+24%</span></h3>
                                <div class="circle">
                                    <div class="percent"></div>
                                </div>
                                <!-- Begin Other Stats -->
                                <div class="other-stats">
                                    <!-- Begin Row -->
                                    <div class="row no-margin justify-content-center">
                                        <div class="col-12 col-xl-10 col-md-10 col-sm-10">
                                            <div class="today-sales">
                                                <div class="graph">
                                                    <div class="chart">
                                                        <canvas id="today-chart"></canvas>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <div class="heading">Today Sales</div>
                                                    <div class="number">489</div>
                                                    <div class="value text-blue">+30%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Today Sales -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                                <!-- End Other Stats -->
                            </div>
                        </div>
                        <!-- End Widget 01 -->
                    </div>
                    <div class="col-xl-5 col-md-6 col-sm-6">
                        <!-- Begin Widget 02 -->
                        <div class="widget widget-02 has-shadow">
                            <!-- Begin Widget Header -->
                            <div class="widget-header bordered d-flex align-items-center">
                                <h2>Activity Graph</h2>
                                <div class="widget-options">
                                    <div class="dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                            <i class="la la-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item">
                                                <i class="la la-history"></i>History
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                <i class="la la-bell-slash"></i>Disable Alerts
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                <i class="la la-edit"></i>Edit Widget
                                            </a>
                                            <a href="#" class="dropdown-item faq">
                                                <i class="la la-question-circle"></i>FAQ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget Header -->
                            <!-- Begin Widget Body -->
                            <div class="widget-body no-padding">
                                <!-- Begin Item -->
                                <div class="text-center">
                                    <div class="more-charts">
                                        <a class="btn btn-shadow" href="components-charts.html">More Charts</a>
                                    </div>
                                </div>
                                <!-- End Item -->
                            </div>
                            <!-- End Widget Body -->
                            <div class="chart">
                                <canvas id="sale-chart"></canvas>
                            </div>
                        </div>
                        <!-- End Widget 02 -->
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <!-- Begin Widget 03 -->
                        <div class="widget-image widget-03 has-shadow blog-image position-relative">
                            <div class="blog-overlay"></div>
                            <div class="blog-content">
                                <span class="author">By Saerox</span>
                                <h3 class="blog-title"><a href="#">Be<br>Elisyam</a></h3>
                                <ul class="meta">
                                    <li><i class="la la-comments"></i><span class="numb">85</span></li>
                                    <li><i class="la la-heart"></i><span class="numb">254</span></li>
                                </ul>
                                <div class="blog-category">
                                    <a href="#0">Webdesign</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget 03 -->
                    </div>
                </div>
                <!-- End Row -->
                <!-- Begin Row/Widget 12 -->
                <div class="row flex-row">
                    <!-- Begin Facebook -->
                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="widget widget-12 has-shadow">
                            <div class="widget-body">
                                <div class="media">
                                    <div class="align-self-center ml-5 mr-5">
                                        <i class="ion-social-facebook text-facebook"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="title">David Green</div>
                                        <div class="number">10,865 Likes</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Facebook -->
                    <!-- Begin Twitter -->
                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="widget widget-12 has-shadow">
                            <div class="widget-body">
                                <div class="media">
                                    <div class="align-self-center ml-5 mr-5">
                                        <i class="ion-social-twitter text-twitter"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="title">@David_Green</div>
                                        <div class="number">8,986 Followers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Twitter -->
                    <!-- Begin Linkedin -->
                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="widget widget-12 has-shadow">
                            <div class="widget-body">
                                <div class="media">
                                    <div class="align-self-center ml-5 mr-5">
                                        <i class="ion-social-linkedin-outline text-linkedin"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="title">@David_Green</div>
                                        <div class="number">3,654 Followers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Linkedin -->
                    <!-- Begin Youtube -->
                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="widget widget-12 has-shadow">
                            <div class="widget-body">
                                <div class="media">
                                    <div class="align-self-center ml-5 mr-5">
                                        <i class="ion-social-youtube-outline text-youtube"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="title">/beElisyam</div>
                                        <div class="number">12,357 Views</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Youtube -->
                </div>
                <!-- End Row/Widget 12 -->
                <!-- Begin Row -->
                <div class="row flex-row">
                    <!-- Begin Widget 13 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="widget widget-13 has-shadow">
                            <div class="widget-body p-0">
                                <div class="author-avatar">
                                    <?= $this->Html->image("Backend.avatar/avatar-04.jpg", ["alt" => "...", "class" => "img-fluid rounded-circle"]); ?>
                                </div>
                                <div class="author-name">
                                    Nathan Hunter
                                    <span>Mobile Designer</span>
                                </div>
                                <div class="follow-btn text-center mt-4">
                                    <a class="btn btn-shadow" href="#">Follow</a>
                                </div>
                                <div class="social-stats mt-5">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-4 text-center">
                                            <i class="la la-users followers"></i>
                                            <div class="counter">+124</div>
                                            <div class="heading">Followers</div>
                                        </div>
                                        <div class="col-4 text-center">
                                            <i class="la la-dribbble dribbble"></i>
                                            <div class="counter">+357</div>
                                            <div class="heading">Likes</div>
                                        </div>
                                        <div class="col-4 text-center">
                                            <i class="la la-behance behance"></i>
                                            <div class="counter">+98</div>
                                            <div class="heading">Followers</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape-container">
                                    <svg class="wavy" viewbox="00 0 85 25">
                                        <path fill="#e4e8f0" d="M0 30 V15 Q30 3 60 15 V30z" />
                                        <path fill="#5d5386" d="M0 30 V5 Q30 20 55 12 T100 11 V30z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 13 -->
                    <!-- Begin Widget 14 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="widget widget-14 has-shadow">
                            <div class="widget-body">
                                <div class="section-title mb-5">
                                    <h2>Calendar</h2>
                                </div>
                                <div class="widget14 owl-carousel">
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">April</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">May</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">June</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">July</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">August</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">September</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">October</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">November</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-projects">
                                            <div class="month">December</div>
                                            <div class="year">2018</div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group w-100 mt-3">
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="event-date align-self-center mr-3">
                                                10
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="event-title text-secondary">Meeting with Team</div>
                                                <div class="event-desc mr-3">
                                                    <i class="la la-calendar"></i>
                                                    <span>09:30 AM</span>
                                                </div>
                                                <div class="event-desc">
                                                    <i class="la la-user"></i>
                                                    <span>4</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="event-date align-self-center mr-3">
                                                12
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="event-title text-info">Dentist</div>
                                                <div class="event-desc mr-3">
                                                    <i class="la la-calendar"></i>
                                                    <span>11:00 AM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="event-date align-self-center mr-3">
                                                15
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="event-title text-dark">Brandon Birthday</div>
                                                <div class="event-desc mr-3">
                                                    <i class="la la-calendar"></i>
                                                    <span>07:00 PM</span>
                                                </div>
                                                <div class="event-desc">
                                                    <i class="la la-user"></i>
                                                    <span>2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="event-date align-self-center mr-3">
                                                21
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="event-title text-primary">Flight Paris</div>
                                                <div class="event-desc mr-3">
                                                    <i class="la la-calendar"></i>
                                                    <span>10:00 PM</span>
                                                </div>
                                                <div class="event-desc">
                                                    <i class="la la-user"></i>
                                                    <span>30</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 14 -->
                    <!-- Begin Widget 15 -->
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                        <div class="widget widget-15 has-shadow">
                            <div class="widget-body">
                                <div class="row">
                                    <div class="col-xl-6 d-flex justify-content-center align-items-center">
                                        <div class="weather-infos">
                                            <div class="temp">24°</div>
                                            <div class="city">Paris, FR</div>
                                            <div class="risk"><i class="la la-tint"></i>80%</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 d-flex justify-content-center align-items-center">
                                        <div class="weather-icon">
                                            <i class="meteocons-cloudy"></i>
                                        </div>
                                    </div>
                                </div>
                                <ul class="time-nav nav nav-tabs justify-content-center mt-5 mb-5" role="tablist" id="weather-tab">
                                    <li><a class="active" data-toggle="tab" href="#weekly" role="tab" id="weekly-tab">Weekly</a></li>
                                    <li><a data-toggle="tab" href="#hourly" role="tab" id="hourly-tab">Hourly</a></li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Begin Tab 1 -->
                                    <div role="tabpanel" class="tab-pane show active" id="weekly" aria-labelledby="weekly-tab">
                                        <div class="widget15-weekly owl-carousel">
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">Monday</div>
                                                <div class="weather">2 Apr</div>
                                                <div class="weather-temp">12 / 30°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>10%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-lightning3"></i>
                                                </div>
                                                <div class="day">Tuesday</div>
                                                <div class="weather">3 Apr</div>
                                                <div class="weather-temp">8 / 21°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>95%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-rainy2"></i>
                                                </div>
                                                <div class="day">Wednesday</div>
                                                <div class="weather">4 Apr</div>
                                                <div class="weather-temp">8 / 19°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>82%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-cloudy"></i>
                                                </div>
                                                <div class="day">Thursday</div>
                                                <div class="weather">5 Apr</div>
                                                <div class="weather-temp">6 / 20°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>50%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">Friday</div>
                                                <div class="weather">6 Apr</div>
                                                <div class="weather-temp">14 / 25°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>0%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Tab 1 -->
                                    <!-- Begin Tab 2 -->
                                    <div role="tabpanel" class="tab-pane" id="hourly" aria-labelledby="hourly-tab">
                                        <div class="widget15-hourly owl-carousel">
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">11:00 PM</div>
                                                <div class="weather-temp">24°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>10%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">12:00 PM</div>
                                                <div class="weather-temp">25°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>0%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">13:00 PM</div>
                                                <div class="weather-temp">25°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>10%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-cloudy"></i>
                                                </div>
                                                <div class="day">14:00 PM</div>
                                                <div class="weather-temp">20°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>30%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">15:00 PM</div>
                                                <div class="weather-temp">30°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>0%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">16:00 PM</div>
                                                <div class="weather-temp">30°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>0%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">17:00 PM</div>
                                                <div class="weather-temp">28°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>5%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-sun"></i>
                                                </div>
                                                <div class="day">18:00 PM</div>
                                                <div class="weather-temp">28°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>5%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-cloud"></i>
                                                </div>
                                                <div class="day">19:00 PM</div>
                                                <div class="weather-temp">23°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>20%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-weather2"></i>
                                                </div>
                                                <div class="day">20:00 PM</div>
                                                <div class="weather-temp">22°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>0%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-weather2"></i>
                                                </div>
                                                <div class="day">22:00 PM</div>
                                                <div class="weather-temp">22°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>0%
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="weather-mini-icon mb-2">
                                                    <i class="meteocons-weather2"></i>
                                                </div>
                                                <div class="day">23:00 PM</div>
                                                <div class="weather-temp">20°</div>
                                                <div class="rain">
                                                    <i class="la la-tint"></i>50%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Tab 2 -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 15 -->
                </div>
                <!-- End Row -->
                <!-- Begin Row -->
                <div class="row flex-row">
                    <!-- Begin Widget 16 -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="widget widget-16 has-shadow">
                            <div class="widget-body">
                                <div class="row">
                                    <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center">
                                        <div class="counter">258,036</div>
                                        <div class="total-views">Total Page Views</div>
                                    </div>
                                    <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                        <div class="pages-views">
                                            <div class="percent"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 16 -->
                    <!-- Begin Widget 17 -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="widget widget-17 has-shadow">
                            <div class="widget-body">
                                <div class="row">
                                    <div class="col-xl-7 d-flex flex-column justify-content-center align-items-center">
                                        <div class="counter">1,658</div>
                                        <div class="total-visitors">Visitors Online</div>
                                    </div>
                                    <div class="col-xl-5 d-flex justify-content-center align-items-center">
                                        <div class="visitors">
                                            <div class="percent"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 17 -->
                </div>
                <!-- End Row -->
                <!-- Begin Row -->
                <div class="row flex-row">
                    <!-- Begin Widget 21 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="widget widget-21 has-shadow">
                            <div class="widget-body">
                                <div class="section-title">
                                    <h3>Hit Rate</h3>
                                </div>
                                <div class="hit-rate">
                                    <div class="percent"></div>
                                </div>
                                <div class="value-progress text-green">
                                    + 34%
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 21 -->
                    <!-- Begin Widget 22 -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="widget widget-22 has-shadow">
                            <div class="widget-body bg-gradient-03">
                                <div class="section-title">
                                    <h3>Happy Customers</h3>
                                </div>
                                <div class="happy-customers">
                                    <div class="percent"></div>
                                </div>
                                <div class="value-progress">
                                    + 54 Today
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 22 -->
                    <!-- Begin Widget 23 -->
                    <div class="col-xl-4">
                        <div class="widget widget-23 bg-gradient-02 d-flex justify-content-center align-items-center">
                            <div class="widget-body text-center">
                                <i class="ti ti-zip"></i>
                                <div class="title">Archive Title</div>
                                <div class="number">Download Archive</div>
                                <div class="text-center mt-3 mb-3">
                                    <button type="button" class="btn btn-outline-light">
                                        Download
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 23 -->
                </div>
                <!-- End Row -->
                <!-- Begin Row -->
                <div class="row flex-row">
                    <div class="col-xl-4 col-md-12">
                        <!-- Begin Widget 24 -->
                        <div class="widget-24 widget-image has-shadow bg-image">
                            <div class="overlay"></div>
                            <div class="content">
                                <div class="weather-icon text-center">
                                    <i class="meteocons-cloudy"></i>
                                </div>
                                <div class="weather-infos text-center">
                                    <div class="temp">24°</div>
                                </div>
                                <div class="city">Paris, FR</div>
                                <div class="week-prev">
                                    <div class="row">
                                        <div class="col-xl-2 text-center">
                                            <div class="day">MON</div>
                                            <div class="weather-mini-icon">
                                                <i class="meteocons-sun"></i>
                                            </div>
                                            <div class="weather-temp">26°</div>
                                        </div>
                                        <div class="col-xl-2 text-center">
                                            <div class="day">TUE</div>
                                            <div class="weather-mini-icon">
                                                <i class="meteocons-cloudy"></i>
                                            </div>
                                            <div class="weather-temp">30°</div>
                                        </div>
                                        <div class="col-xl-2 text-center">
                                            <div class="day">WED</div>
                                            <div class="weather-mini-icon">
                                                <i class="meteocons-sun"></i>
                                            </div>
                                            <div class="weather-temp">32°</div>
                                        </div>
                                        <div class="col-xl-2 text-center">
                                            <div class="day">THU</div>
                                            <div class="weather-mini-icon">
                                                <i class="meteocons-sun"></i>
                                            </div>
                                            <div class="weather-temp">27°</div>
                                        </div>
                                        <div class="col-xl-2 text-center">
                                            <div class="day">FRI</div>
                                            <div class="weather-mini-icon">
                                                <i class="meteocons-cloudy2"></i>
                                            </div>
                                            <div class="weather-temp">25°</div>
                                        </div>
                                        <div class="col-xl-2 text-center">
                                            <div class="day">SAT</div>
                                            <div class="weather-mini-icon">
                                                <i class="meteocons-windy2"></i>
                                            </div>
                                            <div class="weather-temp">31°</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget 24 -->
                    </div>
                    <!-- Begin Widget 32 -->
                    <div class="col-xl-4">
                        <div class="widget-32 widget-image bg-image">
                            <div class="overlay"></div>
                            <div class="content">
                                <div id="events-day"></div>
                                <div id="events-date"></div>
                                <div id="events-year"></div>
                            </div>
                            <div class="real-time">
                                <div id="events-time"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget 32 -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Container -->
            <!-- Begin Success Modal -->
            <div id="delay-modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <div class="sa-icon sa-success animate" style="display: block;">
                                <span class="sa-line sa-tip animateSuccessTip"></span>
                                <span class="sa-line sa-long animateSuccessLong"></span>
                                <div class="sa-placeholder"></div>
                                <div class="sa-fix"></div>
                            </div>
                            <div class="section-title mt-5 mb-5">
                                <h2 class="text-dark">Meeting successfully created</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Success Modal -->
            <!-- Begin Page Footer-->
            <footer class="main-footer">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                        <p class="text-gradient-02">Design By Saerox</p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="documentation.html">Documentation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="changelog.html">Changelog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
            <!-- End Page Footer -->
            <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
            <!-- Offcanvas Sidebar -->

        </div>
    </div>
    <!-- End Page Content -->
    </div>
    
    <?php
    echo $this->Html->script(array(
        '../backend/template/vendors/js/base/jquery.min',
        '../backend/template/vendors/js/base/core.min',
        '../backend/template/vendors/js/nicescroll/nicescroll.min',
        '../backend/template/vendors/js/chart/chart.min',
        '../backend/template/vendors/js/owl-carousel/owl.carousel.min',
        '../backend/template/vendors/js/progress/circle-progress.min',
        '../backend/template/vendors/js/app/app.min',
        '../backend/template/js/components/widgets/widgets.min',
        '../backend/template/vendors/js/app/app.min',
    ));

    ?>
</body>