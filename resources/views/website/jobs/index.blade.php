@extends('layouts.site')

@section('site_title', 'الوظائف')
@section('content')

                <!--  section  -->
                <section class="parallax-section" data-scrollax-parent="true">
                    <div class="bg par-elem " data-bg="{{ asset('web_assets/images/bg/29.jpg') }}"
                        data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="section-title center-align">
                            <h2><span>كل الوظائف</span></h2>
                            <div class="breadcrumbs fl-wrap" dir="rtl"><a href="{{ url('/index') }}">الرئيسية</a><a href="{{ url('/jobs') }}">الوظائف</a><span></span></div>

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

                            @isset($data)
                                @foreach($data as $each)

                                    <div class="listing-item " dir="rtl">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img src="{{  url('/uploads/jobs/'.$each->image) }}" alt="{{$each->title}}">
                                                <div class="overlay"></div>
                                                <div class="list-post-counter"><span>{{$each ->views}}</span><i class="fa fa-heart"></i>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                @if ($each->name)<a class="listing-geodir-category" href="">  {{ $each->name }} </a>@endif
                                                <div class="listing-avatar"><a href="{{ url('jobs/'.$each ->id) }}"><img src="{{  url('/uploads/jobs/'.$each->image) }}" alt="{{$each->title}}"></a>
                                                    <span class="avatar-tooltip">تم الاضافه عن طريق <strong>{{$each->title}}</strong></span>

                                                </div>

                                                <h3><a href="jobs/{{$each ->id}}">{{$each->title}} </a></h3>
                                                <p>{{$each ->description}}.</p>
                                                <div class="geodir-category-options fl-wrap">

                                                    <div class="geodir-category-location">
                                                        <a> | <i class="fas fa-briefcase"></i>
                                                        {{$each ->type}} </a>

                                                        <a style="margin-left: 10px"> | <i class="fas fa-stopwatch"></i>
                                                            {{$each ->end_date}} </a>

                                                        <a style="margin-left: 10px">  <i class="fas fa-dollar-sign"></i>
                                                         {{$each ->sallary}}</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </article>
                                    </div>

                                @endforeach
                                <!-- pagination-->
                                {{ $data->links('vendor.pagination.new_pagi') }}
                            @endisset

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
