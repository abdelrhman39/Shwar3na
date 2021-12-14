@if ($posts)

@extends('layouts.site')

@section('site_title', ''.$key)
@section('content')

                <!--  section  -->
                <section class="parallax-section" data-scrollax-parent="true">
                    <div class="bg par-elem " data-bg="{{ asset('web_assets/images/bg/29.jpg') }}"
                        data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="section-title center-align">
                            <h2><span> {{ $key }}</span></h2>
                            <div class="breadcrumbs fl-wrap" dir="rtl"><a href="{{ url('/index') }}">الرئيسية</a><a href="{{ url('/places') }}">المحلات</a><span></span></div>
                            <span class="section-separator"></span>
                        </div>
                    </div>
                    <div class="header-sec-link">
                        <div class="container"><a href="#sec1" class="custom-scroll-link">Let's Start</a></div>
                    </div>
                </section>
                <!--  section  end-->
                <!--  section  -->
                <section class="gray-bg no-pading no-top-padding" id="sec1">
                    <div class="col-list-wrap  center-col-list-wrap left-list">
                        <div class="container">

                            <!-- list-main-wrap-->
                            <div class="list-main-wrap fl-wrap card-listing">
                                <!-- listing-item -->

                            @if (count($posts) == 0)
                                <h1>لا يوجد </h1>
                                <h1>{{ $key }}
                            @endif
                                @foreach($posts as $each)

                                    <div class="listing-item " dir="rtl">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img src="http://localhost/shwar3na_laravel/uploads/{{$each ->cover}}" alt="{{$each->name_ar}}">
                                                <div class="overlay"></div>
                                                <div class="list-post-counter"><span>{{$each ->views}}</span><i class="fa fa-heart"></i>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <a class="listing-geodir-category" href="">{{ $each->category_name }}</a>
                                                <div class="listing-avatar"><a href="places/{{$each ->id}}"><img
                                                            src="http://localhost/shwar3na_laravel/uploads/{{$each->logo}}" alt="{{$each->name_ar}}"></a>
                                                    <span class="avatar-tooltip">تم الاضافه عن طريق <strong>{{$each->name_ar}}</strong></span>
                                                </div>
                                                <h3><a href="places/{{$each ->id}}">{{$each->name_ar}} - {{$each->name_en}}</a></h3>
                                                <p>{{$each ->description}}.</p>
                                                <div class="geodir-category-options fl-wrap">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                        <span>({{$each ->views}} reviews)</span>
                                                    </div>
                                                    <div class="geodir-category-location"><a href="places/{{$each ->id}}"><i
                                                                class="fa fa-map-marker" aria-hidden="true"></i>
                                                                {{ $each->location }}, {{ $each->address }}</a></div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>

                                @endforeach
                                <!-- pagination-->
                                {{ $posts->links('vendor.pagination.new_pagi') }}


                                <!-- listing-item end-->

                            </div>
                            <!-- list-main-wrap end-->
                        </div>
                    </div>
                </section>
                <!--  section  end-->
                <div class="limit-box fl-wrap"></div>
                <!--  section  -->
                <section class="gradient-bg">
                    <div class="cirle-bg">
                        <div class="bg" data-bg="images/bg/circle.png"></div>
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
                <!--  section  end-->

@endsection
@else
{{ header('Location: '.url('/home')) }}
@endif

