@extends('layouts.site')

@section('site_title', 'المنتجات')
@section('content')

                <!--  section  -->
                <section class="parallax-section" data-scrollax-parent="true">
                    <div class="bg par-elem " data-bg="{{ asset('web_assets/images/bg/29.jpg') }}"
                        data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="section-title center-align">
                            <h2><span>كل المنتجات</span></h2>
                            <div class="breadcrumbs fl-wrap" dir="rtl"><a href="{{ url('/index') }}">الرئيسية</a><a href="{{ url('/products') }}">المنتجات</a><span></span></div>

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
                            <div class="listsearch-maiwrap box-inside fl-wrap">
                                <div class="listsearch-header fl-wrap">
                                    <h3>Results For : <span>All Listings</span></h3>
                                    <div class="listing-view-layout">
                                        <ul>
                                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                            <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- listsearch-input-wrap  -->
                                <form action="{{ route('site.filtter_products') }}" method="POST">
                                @csrf
                                <div class="listsearch-input-wrap fl-wrap">
                                    <div class="listsearch-input-item">
                                        <i class="mbri-key single-i"></i>
                                        <input type="text" placeholder="Keywords?" value="" />
                                    </div>
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="Location" class="chosen-select">
                                            <option>All Locations</option>
                                            <option>Bronx</option>
                                            <option>Brooklyn</option>
                                            <option>Manhattan</option>
                                            <option>Queens</option>
                                            <option>Staten Island</option>
                                        </select>
                                    </div>
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="All Categories" name="Category_id" id="category" class="chosen-select filter-links">
                                            <option>كل الاقسام</option>
                                            @foreach ($all_category as $cat)
                                                <option @isset ($Category_id) @if($Category_id == $cat->id) selected @endisset @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- hidden-listing-filter -->
                                    <div class="hidden-listing-filter fl-wrap" style="display:@isset($range_to) block @else none @endisset ">
                                        <div class="distance-input fl-wrap">
                                    {{-- Start Range --}}
                                            <div class="wrapper">
                                                <div class="values">
                                                  <span id="range1">
                                                    0
                                                  </span>
                                                  <span> &dash; </span>
                                                  <span id="range2">
                                                    100
                                                  </span>
                                                </div>
                                                <div class="containers">
                                                  <div class="slider-track"></div>
                                                  <input name="range_from" type="range" min="0" max="10000" value="{{ isset($range_from) ? $range_from : 0 }}" id="slider-1" oninput="slideOne()">
                                                  <input name="range_to" type="range" min="0" max="10000" value="{{ isset($range_to) ? $range_to : 6500 }}" id="slider-2" oninput="slideTwo()">
                                                </div>
                                              </div>
                                    {{-- ENd Range --}}

                                        </div>
                                    </div>
                                    <!-- hidden-listing-filter end -->
                                    <button type="submit" class="button fs-map-btn">Update</button>
                                    <div class="more-filter-option">More Filters <span></span></div>
                                </form>
                                </div>
                                <!-- listsearch-input-wrap end -->
                            </div>
                            <!-- list-main-wrap-->
                            <div id="data" class="list-main-wrap fl-wrap card-listing">
                                <!-- listing-item -->

                            @isset($data)
                                @foreach($data as $each)
                                    {{-- @if ($each->expired_date > date('d-m-Y')) --}}

                                    <div class="listing-item " dir="rtl">
                                        <article class="geodir-category-listing fl-wrap">
                                            <a href="{{ url('products/'.$each->id)}}">
                                                <div class="geodir-category-img">
                                                    <a href="products/{{$each ->id}}">
                                                        <img src="{{ asset('uploads/products/'.$each ->main_image) }}" alt="{{$each->name}}">
                                                        <div class="overlay"></div>
                                                    </a>
                                                </div>
                                            </a>
                                            <div class="geodir-category-content fl-wrap">
                                                <a class="listing-geodir-category" href="">
                                                @if ($each->new_price)
                                                    {{ $each->new_price }}
                                                @elseif ($each->old_price)
                                                    {{ $each->old_price }}
                                                @endif $</a>

                                                <div class="listing-avatar"><a href="places/{{$each ->place_id}}"><img
                                                            src="{{ asset('uploads/places/'.$each->logo) }}" alt="{{$each->name_ar}}"></a>
                                                    <span class="avatar-tooltip">تم الاضافه عن طريق <strong>{{$each->name_ar}}</strong></span>
                                                </div>
                                                <h3><a href="{{ url('products/'.$each->id)}}">{{$each->name}} </a></h3>

                                                @if(Auth::user())
                                                <form method="post" action="{{ url('order/') }}" class="add-comment custom-form" dir="rtl">
                                                    @csrf
                                                    <input type="hidden" value="{{ $data[0]->place_id }}" name="place_id">
                                                    <input type="hidden" value="{{ $each->id }}" name="product_id">
                                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit" class="btn  big-btn  color-bg flat-btn"><i
                                                        class="fa fa-angle-right"></i> شراء</button>
                                                </form>
                                                @else
                                                <a href="{{ url('') }}" class="btn_info" style="margin-left: 10px">
                                                     قم بتسجيل الدخول لشراء المنتج </a>
                                                @endif

                                                {{-- <p>{{$each ->description}}.</p> --}}

                                                <div class="geodir-category-options fl-wrap">

                                                    <div class="geodir-category-location">
                                                        @if ($each->old_price > $each->new_price and $each->new_price > 0)
                                                            <a> | <i class="fas fa-times"></i>
                                                            <del>{{$each ->old_price}} $</del></a>

                                                            <a style="margin-left: 10px">  <i class="fas fa-check-double"></i>
                                                            {{$each ->new_price}} $</a>
                                                        @endif
                                                    </div>
                                            </div>
                                        </article>
                                    </div>
                                    {{-- @endif --}}
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


<style>

    .wrapper {
        position: relative;
        width: 100%;
        background-color: #ffffff;
        padding: 50px 40px 20px 40px;
        border-radius: 10px;
    }
    .containers {
        position: relative;
        width: 100%;
        height: 100px;
        margin-top: 30px;
    }
    input[type="range"] {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 100%;
        outline: none;
        position: absolute;
        margin: auto;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: transparent;
        pointer-events: none;
    }
    .slider-track {
        width: 100%;
        height: 5px;
        position: absolute;
        margin: auto;
        top: 0;
        bottom: 0;
        border-radius: 5px;
    }
    input[type="range"]::-webkit-slider-runnable-track {
        -webkit-appearance: none;
        height: 5px;
    }
    input[type="range"]::-moz-range-track {
        -moz-appearance: none;
        height: 5px;
    }
    input[type="range"]::-ms-track {
        appearance: none;
        height: 5px;
    }
    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 1.7em;
        width: 1.7em;
        background-color: #3264fe;
        cursor: pointer;
        margin-top: -9px;
        pointer-events: auto;
        border-radius: 50%;
    }
    input[type="range"]::-moz-range-thumb {
        -webkit-appearance: none;
        height: 1.7em;
        width: 1.7em;
        cursor: pointer;
        border-radius: 50%;
        background-color: #3264fe;
        pointer-events: auto;
        border: none;
    }
    input[type="range"]::-ms-thumb {
        appearance: none;
        height: 1.7em;
        width: 1.7em;
        cursor: pointer;
        border-radius: 50%;
        background-color: #3264fe;
        pointer-events: auto;
    }
    input[type="range"]:active::-webkit-slider-thumb {
        background-color: #ffffff;
        border: 1px solid #3264fe;
    }
    .values {
        background-color: #3264fe;
        width: 32%;
        position: relative;
        margin: auto;
        padding: 10px 0;
        border-radius: 5px;
        text-align: center;
        font-weight: 500;
        font-size: 25px;
        color: #ffffff;
    }
    .values:before {
        content: "";
        position: absolute;
        height: 0;
        width: 0;
        border-top: 15px solid #3264fe;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        margin: auto;
        bottom: -14px;
        left: 0;
        right: 0;
    }

</style>

<script>
    window.onload = function () {
    slideOne();
    slideTwo();
    };

    let sliderOne = document.getElementById("slider-1");
    let sliderTwo = document.getElementById("slider-2");
    let displayValOne = document.getElementById("range1");
    let displayValTwo = document.getElementById("range2");
    let minGap = 0;
    let sliderTrack = document.querySelector(".slider-track");
    let sliderMaxValue = document.getElementById("slider-1").max;

    function slideOne() {
    if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
        sliderOne.value = parseInt(sliderTwo.value) - minGap;
    }
    displayValOne.textContent = sliderOne.value;
    fillColor();
    }
    function slideTwo() {
    if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
        sliderTwo.value = parseInt(sliderOne.value) + minGap;
    }
    displayValTwo.textContent = sliderTwo.value;
    fillColor();
    }
    function fillColor() {
    percent1 = (sliderOne.value / sliderMaxValue) * 100;
    percent2 = (sliderTwo.value / sliderMaxValue) * 100;
    sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
    }

</script>


@endsection
