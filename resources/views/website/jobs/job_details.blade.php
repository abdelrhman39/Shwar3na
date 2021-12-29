@extends('layouts.site')
@section('site_title', 'الوظائف')
@section('content')


        <section class="gray-section no-top-padding" dir="rtl">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
                        <!-- list-single-main-wrapper -->
                        <div class="list-single-main-wrapper fl-wrap" id="sec2">
                            <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Home</a><a
                                    href="#">Listings</a><span>Listing Single</span></div>
                            <!-- list-single-header -->
                            <div class="list-single-header list-single-header-inside fl-wrap">
                                <div class="container">
                                    <div class="list-single-header-item">
                                        <img width="150px" height="150px" src="{{  url('/uploads/jobs/'.$data[0]->image) }}" style="position: absolute;top:0;left: 0;" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="list-single-header-item-opt fl-wrap">
                                                    <div class="list-single-header-cat fl-wrap">
                                                        @if ($data[0]->name)
                                                            <a href="#">{{ $data[0]->name }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <h2>{{$data[0]->title}} </h2>
                                                <span class="section-separator"></span>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <h3><span> العدد المطلوب : </span>{{ $data[0]->count }}</h3><br>
                                                <h3><span>  نوع العمل : </span>{{ $data[0]->type }}</h3><br>
                                                <h3><span>   ينتهي في : </span>{{ $data[0]->end_date }}</h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-header end -->

                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>وصف الوظيفة  </h3>
                                </div>

                                <p>{{ $data[0]->description }}.</p>
                                <div class="text-right">

                                    <h3> <span>المرتب المتوقع :</span> {{ $data[0]->sallary }} ج</h3><br>
                                    <h3> <span> قم بإرسال السيره الذاتيه(CV) علي هذا الميل :</span> {{ $data[0]->email }} </h3>
                                </div>

                            </div>



                        </div>
                    </div>
                    <!--box-widget-wrap -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>متطلبات الوظيفه : </h3>
                                </div>
                                <div class="box-widget opening-hours">
                                    <div class="box-widget-content text-right">
                                        <h3>{{ $data[0]->requirment_job }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->

                            <form method="post" action="{{ url('apply-job/'.$data[0]->place_id) }}" class="add-comment custom-form" dir="rtl">
                                @csrf
                                @if (Auth::User())
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                    <input type="hidden" name="job_id" value="{{  $data[0]->id }}" />
                                    <button type="submit" class="btn  big-btn  color-bg flat-btn"><i
                                        class="fa fa-angle-right"></i> التقدم للوظيفة</button>
                                @else
                                    <a href="{{ url('') }}" class="btn  big-btn  color-bg flat-btn"><i
                                        class="fa fa-angle-right"></i> قم بتسجيل الدخول اولاً</a>
                                @endif

                            </form>


                        </div>
                    </div>
                    <!--box-widget-wrap end -->
                </div>
            </div>
        </section>
        <!--  section  end-->
        <div class="limit-box fl-wrap"></div>
        <!--  section   -->
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
