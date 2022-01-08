@extends('layouts.site')

@section('site_title', 'عن شوارعنا')
@section('content')

            <!--Content -->
            <div class="content">
                <!--section -->
                <section class="parallax-section" data-scrollax-parent="true" id="sec1">
                    <div class="bg par-elem " data-bg="{{asset('uploads/about_us/'.$about_data->image)}}"
                        data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="section-title center-align">
                            <h2><span>About Our <span style="color: #f86420">{{$about_data->name}}</span></span></h2>
                            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><span>About</span></div>
                            <span class="section-separator"></span>
                        </div>
                    </div>
                    <div class="header-sec-link">
                        <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
                    </div>
                </section>
                <!-- section end -->
                <!--section -->
                <div class="scroll-nav-wrapper fl-wrap">
                    <div class="container">
                        <nav class="scroll-nav scroll-init inline-scroll-container">
                            <ul>
                                <li><a class="act-scrlink" href="#sec1">Top</a></li>
                                <li><a href="#sec2">About</a></li>
                                <li><a href="#sec3">Facts</a></li>
                                <li><a href="#sec4">Team</a></li>
                                <li><a href="#sec5">Testimonials</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <section id="sec2">
                    <div class="container">
                        <div class="section-title">
                            <h2> How We Work</h2>
                            <div class="section-subtitle">popular questions</div>
                            <span class="section-separator"></span>
                            <p>Explore some of the best tips from around the city from our partners and friends.</p>
                        </div>
                        <!--about-wrap -->
                        <div class="about-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="video-box fl-wrap">
                                        <img src="{{asset('uploads/about_us/'.$about_data->image)}}" alt="">
                                        <a class="video-box-btn image-popup" href="https://vimeo.com/264074381"><i
                                                class="fa fa-play" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Our Awesome <span>Story</span></h3>
                                        <h4>Check video presentation to find out more about us .</h4>
                                        <span class="section-separator fl-sec-sep" style="left: 90%;"></span>
                                    </div>
                                    <p>{{$about_data->about_data}}
                                    </p>
                                    <a href="#sec3" class="btn transparent-btn float-btn custom-scroll-link">Our Team <i
                                            class="fa fa-users"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- about-wrap end  -->
                        <span class="fw-separator"></span>
                        <!-- features-box-container -->
                        <div class="features-box-container fl-wrap row">
                            <!--features-box -->
                            <div class="features-box col-md-4">
                                <div class="time-line-icon">
                                    <i class="fa fa-medkit"></i>
                                </div>
                                <h3>24 Hours Support</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar. Donec a consectetur nulla. </p>
                            </div>
                            <!-- features-box end  -->
                            <!--features-box -->
                            <div class="features-box col-md-4">
                                <div class="time-line-icon">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <h3>Admin Panel</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar. Donec a consectetur nulla. </p>
                            </div>
                            <!-- features-box end  -->
                            <!--features-box -->
                            <div class="features-box col-md-4">
                                <div class="time-line-icon">
                                    <i class="fa fa-television"></i>
                                </div>
                                <h3>Mobile Friendly</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar. Donec a consectetur nulla. </p>
                            </div>
                            <!-- features-box end  -->
                        </div>
                        <!-- features-box-container end  -->
                    </div>
                </section>
                <!-- section end -->
                <!--section -->
                <section class="color-bg" id="sec3">
                    <div class="shapes-bg-big"></div>
                    <div class="container">
                        <div class=" single-facts fl-wrap">
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="{{ $about_data->views }}">154</div>
                                        </div>
                                    </div>
                                    <h6>عدد زيارات الموقع</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="{{ count($products) }}">12168</div>
                                        </div>
                                    </div>
                                    <h6>عدد المنتجات</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="{{ count($places) }}">172</div>
                                        </div>
                                    </div>
                                    <h6>عدد المحلات المسجله</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="{{ count($users) }}">732</div>
                                        </div>
                                    </div>
                                    <h6>كام واحد سجل علي شوارعنا</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                        </div>
                    </div>
                </section>
                <!-- section end -->
                <!--section -->
                <section id="sec4">
                    <div class="container">
                        <div class="section-title">
                            <h2>Our Team</h2>
                            <div class="section-subtitle">The Team</div>
                            <span class="section-separator"></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                Nulla finibus lobortis pulvinar.</p>
                        </div>
                        <div class="team-holder section-team fl-wrap">

                            @foreach ($team as $hero)
                                <!-- team-item -->
                                <div class="team-box">
                                    <div class="team-photo">
                                        <img src="{{asset('uploads/team/'.$hero->image)}}" alt="" class="respimg">
                                    </div>
                                    <div class="team-info">
                                        <h3><a href="#">{{ $hero->name }}</a></h3>
                                        <h4>{{ $hero->title }}</h4>
                                        <p>{{ $hero->description }}. </p>
                                        <ul class="team-social">
                                            <li><a href="{{ $hero->facebook }}" target="_blank"><i class="fa fa-2x fa-facebook"></i></a></li>
                                            <li><a href="{{ $hero->twitter }}" target="_blank"><i class="fa fa-2x fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- team-item  end-->
                            @endforeach

                        </div>
                    </div>
                </section>
                <!-- section end -->
                <!--section -->
                <section class="parallax-section" data-scrollax-parent="true">
                    <div class="bg par-elem " data-bg="{{asset('uploads/team/'.$hero->image)}}"
                        data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay co lor-overlay"></div>
                    <!--container-->
                    <div class="container">
                        <div class="intro-item fl-wrap">
                            <h2>Need more information</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore.</h3>
                            <a class="trs-btn" href="contacts.html">Get in Touch + </a>
                        </div>
                    </div>
                </section>
                <section id="sec5">
                    <div class="container">
                        <div class="section-title">
                            <h2>Testimonials</h2>
                            <div class="section-subtitle">Clients Reviews</div>
                            <span class="section-separator"></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                Nulla finibus lobortis pulvinar.</p>
                        </div>
                    </div>
                    <!-- testimonials-carousel -->
                    <div class="carousel fl-wrap">
                        <!--testimonials-carousel-->
                        <div class="testimonials-carousel single-carousel fl-wrap">

                            @foreach ($testimonials as $test)
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="3"> </div>
                                        <p>{{ $test->comment }}. </p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="{{ asset('uploads/users/'.$test->image) }}" alt=""></div>
                                        <h4>{{ $test->name }}</h4>
                                        <span>Owner</span>
                                    </div>
                                </div>
                                <!--slick-slide-item end-->
                            @endforeach

                        </div>
                        <!--testimonials-carousel end-->
                        <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                        <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                    </div>
                    <!-- carousel end-->
                </section>
                <!-- section end -->
                <!--section -->
                <section class="gray-section">
                    <div class="container">
                        <div class="fl-wrap spons-list">
                            <ul class="client-carousel">
                                <li><a href="#" target="_blank"><img src="{{asset('web_assets/images/clients/1.png')}}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{asset('web_assets/images/clients/2.png')}}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{asset('web_assets/images/clients/3.png')}}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{asset('web_assets/images/clients/1.png')}}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{asset('web_assets/images/clients/2.png')}}" alt=""></a></li>
                                <li><a href="#" target="_blank"><img src="{{asset('web_assets/images/clients/3.png')}}" alt=""></a></li>
                            </ul>
                            <div class="sp-cont sp-cont-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="sp-cont sp-cont-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div>
                </section>
                <!-- section end -->
                <!--section -->
                <section class="gradient-bg">
                    <div class="cirle-bg">
                        <div class="bg" data-bg="{{asset('web_assets/images/bg/circle.png')}}"></div>
                    </div>
                    <div class="container">
                        <div class="join-wrap fl-wrap">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Join our online community</h3>
                                    <p>Grow your marketing and be happy with your online business</p>
                                </div>
                                <div class="col-md-4"><a href="#" class="join-wrap-btn modal-open">Sign Up <i
                                            class="fa fa-sign-in"></i></a></div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- section end -->
                <div class="limit-box"></div>
            </div>
            <!--content end -->



    <!-- Main end -->
    <!--=============== scripts  ===============-->
    <script type="text/javascript" src="{{asset('web_assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('web_assets/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('web_assets/js/scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('web_assets/js/fontawesome.js')}}"></script>

@endsection
