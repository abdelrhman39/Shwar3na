<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>@yield('site_title')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{asset('web_assets/css/reset.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('web_assets/css/plugins.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('web_assets/css/style1.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('web_assets/css/color.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('web_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('web_assets/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/selects/select2.min.css')}}">

    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{asset('uploads/icon.jpg')}}">

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61b34e6880b2296cfdd1132e/1fmi6kig5';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

</head>

<body>


    <!--loader-->
    <div class="loader-wrap">
        <div class="pin"></div>
        <div class="pulse"></div>
    </div>
    <!--loader end-->
    <!-- Main  -->
    <div id="main">
        <!-- header-->
        <header class="main-header dark-header fs-header sticky">
            <div class="header-inner">
                <div class="logo-holder">
                    <a href="{{route('get.site')}}"><img src="{{asset('uploads/Logo(light).png')}}" alt=""></a>
                </div>
            <form class="card-body" action="{{ route('search') }}" method="GET" role="search">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="header-search vis-header-search">
                    <div class="header-search-input-item">
                        <input type="search" name="q" placeholder="search.." value="" />
                    </div>
                    <div class="header-search-select-item">
                        <select name="category" data-placeholder="All Categories" class="chosen-select">
                            <option value="" style="display:none">الأقسام</option>
                            @foreach ( $all_category as $category )
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="header-search-button">Search</button>
                </div>
            </form>
                <div class="show-search-button"><i class="fa fa-search"></i> <span>بحث</span></div>
                <a href="{{ url('new') }}" class="add-list">Add Listing <span>
                         <i class="fa fa-plus"></i></span></a>
                @if(auth::User())

                    <div class="header-user-menu">
                        <div class="header-user-name">
                            <span><img src="{{ url('uploads/users/'.auth::User()->image) }}" alt=""></span>
                            {{ substr(Auth::User()->name,0,15)}}...
                        </div>
                        <ul>
                            <li><a href="{{route('site.profile.dash')}}"> الصفحة الشخصية</a></li>
                            {{-- <li><a href="dashboard-add-listing.html"> Add Listing</a></li>
                            <li><a href="dashboard-bookings.html"> Bookings </a></li>
                            <li><a href="dashboard-review.html"> Reviews </a></li> --}}
                            {{-- <hr> --}}


                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ft-power"></i>
                                    تسجيل الخروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>تسجيل دخول</div>
                @endif
                <!-- nav-button-wrap-->
                <div class="nav-button-wrap color-bg">
                    <div class="nav-button">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <!-- nav-button-wrap end-->
                <!--  navigation -->
                <div class="nav-holder main-menu">
                    <nav>
                        <ul>
                            {{--
                            <li>
                                <a href="#">Listings <i class="fa fa-caret-down"></i></a>
                                <!--second level -->
                                <ul>
                                    <li><a href="listing.html">Column map</a></li>
                                    <li><a href="listing2.html">Column map 2</a></li>
                                    <li><a href="listing3.html">Fullwidth Map</a></li>
                                    <li><a href="listing4.html">Fullwidth Map 2</a></li>
                                    <li><a href="listing5.html">Without Map</a></li>
                                    <li><a href="listing6.html">Without Map 2</a></li>
                                    <li>
                                        <a href="#">Single <i class="fa fa-caret-down"></i></a>
                                        <!--third  level  -->
                                        <ul>
                                            <li><a href="listing-single.html">Style 1</a></li>
                                            <li><a href="listing-single2.html">Style 2</a></li>
                                            <li><a href="listing-single3.html">Style 3</a></li>
                                            <li><a href="listing-single4.html">Style 4</a></li>
                                        </ul>
                                        <!--third  level end-->
                                    </li>
                                </ul>
                                <!--second level end-->
                            </li>
                            <li>
                                <a href="#">Pages <i class="fa fa-caret-down"></i></a>
                                <!--second level -->
                                <ul>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="contacts.html">Contacts</a></li>
                                    <li><a href="author-single.html">User single</a></li>
                                    <li><a href="how-itworks.html">How it Works</a></li>
                                    <li><a href="pricing-tables.html">Pricing</a></li>
                                    <li><a href="dashboard-myprofile.html">User Dasboard</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                    <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                    <li><a href="header2.html">Header 2</a></li>
                                    <li><a href="footer-fixed.html">Footer Fixed</a></li>
                                </ul>
                                <!--second level end-->
                            </li>  --}}


                            <li><a href="{{ url('/products') }}">المنتجات </a></li>
                            <li><a href="{{ url('/copouns') }}">الكوبونات </a></li>
                            <li><a href="{{ url('/places') }}">المحلات </a></li>
                            <li><a href="blog.html">الأخبار </a></li>
                            <li><a href="{{ url('/jobs') }}">الوظائف</a></li>
                            <li>
                                <a href="#">عن الشركة <i class="fa fa-caret-down"></i></a>
                                <!--second level -->
                                <ul>
                                    <li><a href="{{route('site.aboutUs')}}">عن الشركة</a></li>
                                    <li><a href="{{route('site.contactUs')}}">تواصل معنا </a></li>

                                </ul>
                                <!--second level end-->
                            </li>
                            <li><a href="{{route('get.site')}}">الرئيسية</a></li>
                        </ul>
                    </nav>
                </div>


                <!-- navigation  end -->
            </div>

        </header>
        <!--  header end -->
        <!-- wrapper -->
        <div id="wrapper">

            <!-- Content-->
            <div class="content" >
                @yield('content')
            </div>
            <!-- Content end -->
        </div>
        <!-- wrapper end -->


        <!-- Footer -->
        @include('website.includes.Footer')

        <!--register form -->
        <div class="main-register-wrap modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg"  style="left: 30px;"><i class="fa fa-times"></i></div>
                    <h3 style=" text-align: right;float: right;">تسجيل الدخول <span style="font-size: 22px">شوار<strong>عنا</strong></span></h3>
                    {{--  <div class="soc-log fl-wrap">
                        <p>For faster login or register usxe your social account.</p>
                        <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                        <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                    </div>
                    <div class="log-separator fl-wrap"><span>or</span></div>  --}}
                    {{--  @include('dashboard.includes.alerts.errors')
                    @include('dashboard.includes.alerts.success')   --}}
                    <div id="tabs-container">
                        <div class="soc-log fl-wrap">
                            <p>For faster login or register use your social account.</p>
                            <a href="{{ url('auth/facebook/redirect') }}" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                            <a href="{{ url('/auth/google/redirect') }}" class="twitter-log" style="background: #c94130"><i class="fa fa-google"></i> Log in with Twitter</a>
                        </div>
                        <div class="log-separator fl-wrap"><span>or</span></div>

                        <ul class="tabs-menu" >
                            <li class="current" style="float: right" ><a href="#tab-1">تسجيل دخول</a></li>
                            <li style="float: right"><a href="#tab-2">تسجيل حساب</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-content">
                                <div class="custom-form">
                                    <form  name="registerform" id="UserLoginForm"  method="post" action="{{ url('Site_login') }}" style="direction: rtl;">
                                        {{ csrf_field() }}

                                        <div>
                                            <label style="text-align: right;">البريد الالكترونى * </label>
                                            <input name="email" type="text" >
                                            @error('email')
                                                <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label style="text-align: right;">كلمة المرور *</label>
                                            <input name="password" type="password"  >
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="log-submit-btn loginBtn"><span>تسجيل دخول</span></button>
                                        <div class="clearfix"></div>
                                        <div class="filter-tags">
                                            <input name="remember_me" id="remember-me" type="checkbox" >
                                            <label for="check-a">تذكرنى</label>
                                        </div>
                                        <div class="filter-tags">
                                            <a href="{{ route('forget.password.get') }}">Forgot Password</a>
                                        </div>

                                    </form>
                                    {{--  <div class="lost_password">
                                        <a href="#">Lost Your Password?</a>
                                    </div>  --}}
                                </div>
                            </div>
                            <div class="tab">
                                <div id="tab-2" class="tab-content">
                                    <div class="custom-form">
                                        <form  name="registerform" class="main-register-form" id="main-register-form2" method="post" action="Site_register" style="direction: rtl;" >
                                            {{ csrf_field() }}

                                            <div>
                                                <label style="text-align: right;">الأسم بالكامل *  </label>
                                                <input name="name" type="text" >
                                                @error('name')
                                                    <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label style="text-align: right;">البريد الالكترونى * </label>
                                                <input name="email" type="text" >
                                                @error('email')
                                                    <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label style="text-align: right;">رقم الهاتف * </label>
                                                <input name="phone" type="text" >
                                                @error('phone')
                                                    <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label style="text-align: right;">كلمة المرور *</label>
                                                <input name="password" type="password"  >
                                                @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label style="text-align: right;">تأكيد كلمه المرور *</label>
                                                <input name="password_confirmation" type="password"  >
                                                @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="log-submit-btn loginBtn"><span>تسجيل حساب جديد</span></button>

                                        </form>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--register form end -->
        <a class="to-top"><i class="fa fa-angle-up"></i></a>

        @isset($count_orders)
            <a href="{{route('orders')}}" class="fa-stack fa-2x has-badge cart_orders" data-count="{{ $count_orders }}">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </a>
        @endisset

    </div>


    <!-- Main end -->
    <!--=============== scripts  ===============-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('web_assets/js/scripts.js') }}"></script>
    <script type="text/javascript" src="{{asset('web_assets/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('web_assets/js/fontawesome.js') }}"></script>
    <script src="{{ asset('web_assets/js/owl.carousel.min.js') }}"></script>

    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

        @if(Session::has('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}");
        </script>
        @endif


        @if(Session::has('error'))
        <script>
            toastr.error("{!! Session::get('error') !!}");
        </script>
        @endif

        <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>

    </body>

</html>


