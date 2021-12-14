@extends('layouts.site')

@section('site_title', 'المنتجات')
@section('content')
    <!--  carousel-->
    <div class="list-single-carousel-wrap fl-wrap" id="sec1">
        <div class="fw-carousel fl-wrap full-height lightgallery">

            <!-- slick-slide-item -->
            @if (count($product_gallary) < 1)
                <div class="slick-slide-item">
                    <div class="box-item">
                        <img src="{{  url('/uploads/products/'.$data[0]->main_image) }}" alt="">
                        <a href="{{  url('/uploads/products/'.$data[0]->main_image) }}" class="gal-link popup-image"><i
                                class="fa fa-search"></i></a>
                    </div>
                </div>
            @else

                @foreach ($product_gallary as $img)
                    <div class="slick-slide-item">
                        <div class="box-item">
                            <img src="{{  url('/uploads/products/'.$img->image) }}" alt="">
                            <a href="{{  url('/uploads/products/'.$img->image) }}" class="gal-link popup-image"><i
                                    class="fa fa-search"></i></a>
                        </div>
                    </div>
                @endforeach

            @endif

            <!-- slick-slide-item end -->



        </div>
        <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
        <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
    </div>
    <!--  carousel  end-->


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
                                        <div class="row">
                                            <div class="col-md-8">

                                                <h2>{{$data[0]->name}} </h2>
                                                <span class="section-separator"></span>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <div class="list-single-header-item-opt fl-wrap">
                                                    <div class="list-single-header-cat fl-wrap">
                                                        @if ($data[0]->new_price >= 0)
                                                            @if ($data[0]->old_price < $data[0]->new_price)
                                                            <a href="#">{{ $data[0]->new_price }} $</a>
                                                            @else
                                                                <a href="#">{{ $data[0]->old_price }} $</a>
                                                            @endif
                                                        @else
                                                            <a href="#">{{ $data[0]->old_price }} $</a>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-header end -->

                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>وصف المنتج  </h3>
                                </div>

                                <p>{{ $data[0]->description }}.</p>

                            </div>



                        </div>
                    </div>
                    <!--box-widget-wrap -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <form method="post" action="{{ url('order/') }}" class="add-comment custom-form" dir="rtl">
                                        @csrf
                                        <fieldset dir="rtl">

                                            <div class="quantity fl-wrap">
                                                <span>العدد : </span>
                                                <div class="quantity-item" dir="rtl">
                                                    <input type="hidden" value="{{ $data[0]->id }}" name="product_id">
                                                    <input type="hidden" value="@if (Auth::user()) {{ Auth::user()->id }} @endif" name="user_id">
                                                    <input type="button" value="-" class="minus">
                                                    <input type="text" name="quantity" title="Qty"
                                                        class="qty" min="1" max="3" step="1" value="1">
                                                    <input type="button" value="+" class="plus">
                                                </div>
                                            </div>
                                        </fieldset>
                                        @if (Auth::User())
                                            <button type="submit" class="btn  big-btn  color-bg flat-btn"><i
                                                class="fa fa-angle-right"></i> شراء</button>
                                        @else
                                            <a href="{{ url('') }}" class="btn  big-btn  color-bg flat-btn"><i
                                                class="fa fa-angle-right"></i> قم بتسجيل الدخول اولاً</a>
                                        @endif

                                    </form>
                                </div>
                            </div>
                            <!--box-widget-item end -->


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
