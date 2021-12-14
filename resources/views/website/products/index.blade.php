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
                                        <select data-placeholder="All Categories" class="chosen-select">
                                            <option>All Categories</option>
                                            <option>Shops</option>
                                            <option>Hotels</option>
                                            <option>Restaurants</option>
                                            <option>Fitness</option>
                                            <option>Events</option>
                                        </select>
                                    </div>
                                    <div class="listsearch-input-text" id="autocomplete-container">
                                        <label><i class="mbri-map-pin"></i> Enter Addres </label>
                                        <input type="text" placeholder="Destination , Area , Street"
                                            id="autocomplete-input" class="qodef-archive-places-search" value="" />
                                        <a href="#" class="loc-act qodef-archive-current-location"><i
                                                class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                    <!-- hidden-listing-filter -->
                                    <div class="hidden-listing-filter fl-wrap">
                                        <div class="distance-input fl-wrap">
                                            <div class="distance-title"> Radius around selected destination
                                                <span></span> km</div>
                                            <div class="distance-radius-wrap fl-wrap">
                                                <input class="distance-radius rangeslider--horizontal" type="range"
                                                    min="1" max="100" step="1" value="1"
                                                    data-title="Radius around selected destination">
                                            </div>
                                        </div>
                                        <!-- Checkboxes -->
                                        <div class=" fl-wrap filter-tags">
                                            <h4>Filter by Tags</h4>
                                            <div class="filter-tags-wrap">
                                                <input id="check-a" type="checkbox" name="check" checked>
                                                <label for="check-a">Elevator in building</label>
                                            </div>
                                            <div class="filter-tags-wrap">
                                                <input id="check-b" type="checkbox" name="check">
                                                <label for="check-b">Friendly workspace</label>
                                            </div>
                                            <div class="filter-tags-wrap">
                                                <input id="check-c" type="checkbox" name="check">
                                                <label for="check-c">Instant Book</label>
                                            </div>
                                            <div class="filter-tags-wrap">
                                                <input id="check-d" type="checkbox" name="check">
                                                <label for="check-d">Wireless Internet</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- hidden-listing-filter end -->
                                    <button class="button fs-map-btn">Update</button>
                                    <div class="more-filter-option">More Filters <span></span></div>
                                </div>
                                <!-- listsearch-input-wrap end -->
                            </div>
                            <!-- list-main-wrap-->
                            <div class="list-main-wrap fl-wrap card-listing">
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
                                                            src="{{ asset('uploads/'.$each->logo) }}" alt="{{$each->name_ar}}"></a>
                                                    <span class="avatar-tooltip">تم الاضافه عن طريق <strong>{{$each->name_ar}}</strong></span>
                                                </div>
                                                <h3><a href="{{ url('products/'.$each->id)}}">{{$each->name}} </a></h3>

                                                @if(Auth::user())
                                                <form method="post" action="{{ url('order/') }}" class="add-comment custom-form" dir="rtl">
                                                    @csrf
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

                                                            <a style="margin-left: 10px"> | <i class="fas fa-check-double"></i>
                                                            {{$each ->new_price}} </a>
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

@endsection
