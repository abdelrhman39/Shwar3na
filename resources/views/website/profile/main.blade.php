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
                                    <li><a href="{{ route('myprofile') }}"><i class="fa fa-user-o"></i>
                                            تعديل الملف الشخصى</a></li>
                                    {{--  <li><a href="dashboard-messages.html"><i
                                                class="fa fa-envelope-o"></i> Messages
                                            <span>3</span></a></li>  --}}
                                    <li><a href="{{ route('changePasswordGet') }}"><i
                                                class="fa fa-unlock-alt"></i>تغير كلمة السر</a></li>

                                    <li><a href="{{ route('orders') }}"><i class="fa fa-user-o"></i>
                                                     عربه الطلبات</a></li>
                                    <li><a href="{{ route('show_order_don') }}"><i class="fa fa-user-o"></i>
                                             الطلبات التي تم تأكيدها</a></li>

                                    <li><a href="{{ route('my_wallet') }}"><i class="fa fa-user-o"></i>
                                         محفظتي</a></li>
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

<style>
        /* If you like this, be sure to ❤️ it. */
        .wrapper {
    height: 100vh;
    /* This part is important for centering the content */
    display: flex;
    align-items: center;
    justify-content: center;
    /* End center */
    background: -webkit-linear-gradient(to right, #834d9b, #d04ed6);
    background: linear-gradient(to right, #834d9b, #d04ed6);
    }

    .wrapper a {
    display: inline-block;
    text-decoration: none;
    padding: 15px;
    background-color: #fff;
    border-radius: 3px;
    text-transform: uppercase;
    color: #585858;
    font-family: 'Roboto', sans-serif;
    }

    .modal {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(77, 77, 77, .7);
    transition: all .4s;
    z-index: 99999999999;
    }

    .modal:target {
    visibility: visible;
    opacity: 1;
    }

    .modal__content {
    border-radius: 4px;
    position: relative;
    width: 100%;
    max-width: 90%;
    background: #fff;
    padding: 1em 2em;
    overflow-y: auto;
    }

    .modal__footer {
    text-align: right;
    }
    a {
        color: #585858;
    }
    i {
        color: #d02d2c;
    }

    .modal__close {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #585858;
    text-decoration: none;
    font-size: 2.5em
    }

    span.accept {
        background-color: #f86420;
        padding: 20px;
        position: absolute;
        border-radius: 0px 15px;
        color: #fff;
        font-size: 1.2em;
        box-shadow: 0px 0px 0px 7px rgb(180 177 177 / 20%);
    }
    span.accept-active{
    background-color: #009225!important;
}

.dashboard-listing-table-opt i{
    color: #fff !important;
}
</style>
@endsection
