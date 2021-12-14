@extends('layouts.site')

@section('site_title', 'شوارعنا - صفحتى')
@section('content')

<!--section -->
<section id="sec1">
    <!-- container -->
    <div class="container">
        <!-- profile-edit-wrap -->
        <div class="profile-edit-wrap">
            <div class="profile-edit-page-header">
                <h2 style="float: right">لوحة التحكم</h2>
                {{--  <div class="breadcrumbs"><a href="#">Home</a><span>Dasboard</span></div>  --}}
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="fixed-bar fl-wrap">
                        <div class="user-profile-menu-wrap fl-wrap">
                            <!-- user-profile-menu-->
                            <div class="user-profile-menu">
                                <h3>الرئيسية</h3>
                                <ul>
                                    <li><a href="{{route('site.profile.dash')}}" {{-- class="user-profile-act" --}}><i
                                                class="fa fa-gears"></i>لوحة التحكم</a></li>
                                    <li><a href="dashboard-myprofile.html"><i class="fa fa-user-o"></i>
                                            تعديل الملف الشخصى</a></li>
                                    {{--  <li><a href="dashboard-messages.html"><i
                                                class="fa fa-envelope-o"></i> Messages
                                            <span>3</span></a></li>  --}}
                                    <li><a href="dashboard-password.html"><i
                                                class="fa fa-unlock-alt"></i>تغير كلمة السر</a></li>

                                    <li><a href="{{ route('orders') }}"><i class="fa fa-user-o"></i>
                                                     الطلبات</a></li>
                                </ul>
                            </div>
                            <!-- user-profile-menu end-->
                            <!-- user-profile-menu-->
                            <div class="user-profile-menu">
                                <h3>قائمتى</h3>
                                <ul>
                                    <li><a href="{{ url('profileDashboard') }}"><i
                                                class="fa fa-th-list"></i> محلاتى </a></li>
                                    {{--  <li><a href="dashboard-bookings.html"> <i
                                                class="fa fa-calendar-check-o"></i> Bookings
                                            <span>2</span></a></li>  --}}
                                    {{--  <li><a href="dashboard-review.html"><i class="fa fa-comments-o"></i>
                                            Reviews </a></li>  --}}
                                    <li><a href="{{ route('user.FormPlace.add') }}"><i
                                                class="fa fa-plus-square-o"></i> أضافه محل</a></li>

                                    <li><a href="{{ route('user.Formcoupons.add') }}"><i
                                        class="fa fa-plus-square-o"></i> أضافه كوبون</a></li>

                                    <li><a href="{{ route('user.FormProduct.add') }}"><i
                                        class="fa fa-plus-square-o"></i> أضافه منتج</a></li>

                                    <li><a href="{{ route('user.all-products') }}"><i
                                        class="fa fa-plus-square-o"></i> كل منتجاتي </a></li>

                                    <li><a href="{{ route('user.FormJob.add') }}"><i
                                        class="fa fa-plus-square-o"></i> أضافه وظيفة</a></li>

                                    <li><a href="{{ route('user.all-jobs') }}"><i
                                        class="fa fa-plus-square-o"></i> كل وظائفي </a></li>




                                </ul>
                            </div>
                            <!-- user-profile-menu end-->
                            <a href="#" class="log-out-btn">تسجيل خروج</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9" style="text-align: right">
                    @yield('content_profile')
                </div>
            </div>
        </div>
        <!--profile-edit-wrap end -->
    </div>
    <!--container end -->
</section>
<!-- section end -->
<div class="limit-box fl-wrap"></div>


@endsection
