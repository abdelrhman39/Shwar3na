@extends('layouts.site')

@section('site_title', 'المحلات')
@section('content')
    <!--  carousel-->
    <div class="list-single-carousel-wrap fl-wrap" id="sec1">
        <div class="fw-carousel fl-wrap full-height lightgallery">

        @foreach ($place_gallary as $img )

            <!-- slick-slide-item -->
            <div class="slick-slide-item">
                <div class="box-item">
                    <img src="{{ asset('uploads/places/'.$img->uploads ) }}" alt="">
                    <a href="{{ asset('uploads/places/'.$img->uploads ) }}" class="gal-link popup-image"><i
                            class="fa fa-search"></i></a>
                </div>
            </div>
            <!-- slick-slide-item end -->

        @endforeach

        </div>
        <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
        <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
    </div>
    <!--  carousel  end-->
    <div class="scroll-nav-wrapper fl-wrap">
        <div class="container">
            <nav class="scroll-nav scroll-init">
                <ul>
                    <li><a class="act-scrlink" href="#sec1">Gallery</a></li>
                    <li><a href="#sec2">Details</a></li>
                    <li><a href="#sec3">Video </a></li>
                    <li><a href="#sec4">Reviews</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!--  section   -->

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
                                            <img src="{{ asset('uploads/places/'.$data[0]->logo) }}" width="100px" style="border-radius: 50%;">
                                            <div class="col-md-8">
                                                <div class="list-single-header-item-opt fl-wrap">
                                                    <div class="list-single-header-cat fl-wrap">
                                                        <a href="#">{{ $data[0]->category_name }}</a>
                                                    </div>
                                                </div>
                                                <h2> {{$data[0]->name_ar}} - {{$data[0]->name_en}} </h2>
                                                <span class="section-separator"></span>
                                                <div class="listing-rating card-popup-rainingvis"
                                                    data-starrating2="5">
                                                    <span>({{$data[0]->views}} reviews)</span>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="fl-wrap list-single-header-column">
                                                    <span class="viewed-counter"><i class="fa fa-eye"></i>
                                                        Viewed - {{$data[0]->views}} </span>
                                                    <a class="custom-scroll-link" href="#sec5"><i
                                                            class="fa fa-hand-o-right"></i>Add Review </a>
                                                    <div class="share-holder hid-share">
                                                        <div class="showshare"><span>Share </span><i
                                                                class="fa fa-share"></i></div>
                                                        <div class="share-container  isShare"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- list-single-header end -->
                            <div class="list-single-facts fl-wrap gradient-bg">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fas fa-users"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="{{ $data[0]->used }}">0</div>
                                            </div>
                                        </div>
                                        <h6>Customers buy coupons</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fa fa-user"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="{{$data[0]->views}}">0</div>
                                            </div>
                                        </div>
                                        <h6>viewed customers</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="far fa-credit-card"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="{{ count($place_disc) }}">0</div>
                                            </div>
                                        </div>
                                        <h6>Copouns</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>


                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3> نبذه عن المحل </h3>
                                </div>
                                <p>{{$data[0]->description}}.</p>

                                <a href="#" class="btn transparent-btn float-btn">Visit Website <i
                                        class="fa fa-angle-right"></i></a>

                                @if ($place_tags != Null)

                                    <span class="fw-separator"></span>
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Tags</h3>
                                    </div>
                                    <div class="list-single-tags tags-stylwrap">
                                        @foreach ($place_tags as $tag)
                                        {{-- <form class="card-body" action="search" method="GET" role="search">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="q" value="{{ $tag->text }}" />
                                            <input type="hidden" name="q" value="{{ $tag->text }}" /> --}}
                                            <a href="{{ url('search_tags?q='.$tag->text.'&category='.$tag->text.'') }}">{{ $tag->text }}</a>
                                        {{-- </form> --}}
                                        @endforeach

                                    </div>

                                @endif
                            </div>


                            <div class="accordion">
                                <a class="toggle act-accordion" href="#"> Details option <i
                                        class="fa fa-angle-down"></i></a>
                                <div class="accordion-inner visible">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                        pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur
                                        nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi
                                        tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed
                                        aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum
                                        facilisis massa, a consequat purus viverra.</p>
                                </div>
                                <a class="toggle" href="#"> Details option 2 <i
                                        class="fa fa-angle-down"></i></a>
                                <div class="accordion-inner">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                        pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur
                                        nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi
                                        tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed
                                        aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum
                                        facilisis massa, a consequat purus viverra.</p>
                                </div>
                                <a class="toggle" href="#"> Details option 3 <i
                                        class="fa fa-angle-down"></i></a>
                                <div class="accordion-inner">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                        pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur
                                        nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi
                                        tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed
                                        aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum
                                        facilisis massa, a consequat purus viverra.</p>
                                </div>

                            </div>


                            <!-- list-single-main-item-->
                            @if ($data[0]->video != Null)

                                <div class="list-single-main-item fl-wrap" id="sec3">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Promo Video</h3>
                                    </div>
                                    <div class="iframe-holder fl-wrap">
                                        <div class="resp-video">
                                            <video width="100%" height="100%" controls>
                                                <source src="{{ asset('uploads/places') }}/{{ $data[0]->video }}" type="video/mp4">
                                                <source src="{{ asset('uploads/places') }}/{{ $data[0]->video }}" type="video/ogg">
                                            </video>
                                        </div>
                                    </div>
                                </div>

                            @endif


                        </div>
                    </div>
                    <!--box-widget-wrap -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Working Hours : </h3>
                                </div>
                                <div class="box-widget opening-hours">
                                    <div class="box-widget-content">
                                        <span class="current-status"><i class="fa fa-clock-o"></i> Now
                                            Open</span>
                                        <ul>
                                            @foreach ($place_time as $item )

                                                <li>
                                                    <span class="opening-hours-day">{{ $item->date_ar }} </span><span
                                                    class="opening-hours-time">{{ $item->timeFrom }} - {{ $item->timeTo }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->


                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Location / Contacts : </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="map-container">
                                        <div id="singleMap" data-latitude="{{ $data[0]->latitude }}"
                                            data-longitude="{{ $data[0]->longitude }}" data-mapTitle="Our Location">
                                        </div>
                                    </div>
                                    <div class="box-widget-content">
                                        <div class="list-author-widget-contacts list-item-widget-contacts">
                                            <ul>
                                                <li><span><i class="fa fa-map-marker"></i> Adress :</span> <a
                                                        href="#"> {{ $data[0]->address }} </a></li>
                                                <li><span><i class="fa fa-phone"></i> Phone :</span> <a
                                                        href="tel:{{ $data[0]->phone }}"> {{ $data[0]->phone }}</a></li>
                                                <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a
                                                        href="mail:{{ $data[0]->email }}">{{ $data[0]->email }}</a></li>
                                                        @if ( $data[0]->website )
                                                        <li><span><i class="fa fa-globe"></i> Website :</span> <a
                                                            href="{{ $data[0]->website }}">{{ $data[0]->website }}</a></li>
                                                        @endif

                                            </ul>
                                        </div>
                                        <div class="list-widget-social">
                                            <ul>
                                                @if ($data[0]->facebook)
                                                <li><a href="{{ $data[0]->facebook }}" target="_blank"><i
                                                    class="fa fa-facebook"></i></a></li>
                                                @endif

                                                @if ($data[0]->twitter)
                                                <li><a href="{{ $data[0]->twitter }}" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                                @endif

                                                @if ($data[0]->whatsapp)
                                                <li><a href="{{ $data[0]->whatsapp }}" target="_blank"><i
                                                    class="fa fa-whatsapp"></i></a></li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->

                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>More from this employer : </h3>
                                </div>
                                <div class="box-widget widget-posts">
                                    <div class="box-widget-content">
                                        <ul>
                                            <li class="clearfix">
                                                <a href="#" class="widget-posts-img"><img src="images/all/1.jpg"
                                                        alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Cafe "Lollipop"</a>
                                                    <span class="widget-posts-date"><i
                                                            class="fa fa-calendar-check-o"></i> 21 Mar 2017
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#" class="widget-posts-img"><img src="images/all/2.jpg"
                                                        alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title=""> Apartment in the Center</a>
                                                    <span class="widget-posts-date"><i
                                                            class="fa fa-calendar-check-o"></i> 7 Mar 2017
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#" class="widget-posts-img"><img src="images/all/3.jpg"
                                                        alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Event in City Mol</a>
                                                    <span class="widget-posts-date"><i
                                                            class="fa fa-calendar-check-o"></i> 7 Mar 2017
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                        <a class="widget-posts-link" href="#">See All Listing<span><i
                                                    class="fa fa-angle-right"></i></span></a>
                                    </div>
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


    <!--section -->
    @if (count($place_disc) != 0)
        <section class="gray-section">
            <div class="container">
                <div class="section-title">
                    <h2>الكوبونات</h2>
                    <div class="section-subtitle">الكوبونات</div>
                    <span class="section-separator"></span>
                    <p>كل الكوبونات.</p>
                </div>
            </div>
            <!-- carousel -->

            <div class="list-carousel fl-wrap card-listing ">
                <!--listing-carousel-->
                <div class="listing-carousel  fl-wrap ">

                    <!--slick-slide-item-->
                    <?php $x=0; ?>
                    @foreach($place_disc as $each)
                    <?php $x=0;$x++ ?>
                        <div class="slick-slide-item" >
                            <!-- listing-item -->
                            <div class="listing-item " dir="rtl">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <img src="{{ asset('uploads/places/'.$each ->image) }}" alt="{{$each->title}}">
                                        <div class="overlay"></div>
                                        <div class="list-post-counter"><span>{{$each ->views}}</span><i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <a class="listing-geodir-category" href="">{{ $each->new_price }} $</a>
                                        <div class="listing-avatar"><a href="{{$each ->place_id}}"><img
                                                    src="{{ asset('uploads/'.$each ->logo) }}" alt="{{$each->name_ar}}"></a>
                                            <span class="avatar-tooltip">تم الاضافه عن طريق <strong>{{$each->name_ar}}</strong></span>
                                        </div>
                                        <h3><a >{{$each->title}} </a></h3>
                                        {{-- <p>{{$each ->description}}.</p> --}}
                                        <div class="geodir-category-options fl-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                <span>({{$each ->used}} Used)</span>
                                            </div>
                                            <div class="geodir-category-location">
                                                <a> | <i class="fas fa-times"></i>
                                                    <del>{{$each ->old_price}} $</del></a>

                                                <a style="margin-left: 10px"> | <i class="fas fa-check-double"></i>
                                                    {{$each ->new_price}} </a>

                                                <a style="margin-left: 10px">  <i class="fas fa-stopwatch"></i>
                                                    {{$each ->expired_date}}</a>
                                            </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                    @endforeach
                    <!--slick-slide-item end-->

                </div>
                <!--listing-carousel end-->
                @if ($x > 1)
                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                @endif
            </div>

            <!--  carousel end-->
        </section>
    @endif
    <!-- section end -->




    <!-- list-single-main-item -->
    <section class="gray-section ">
        <div class="row container">
            <div class="col-md-8">
                <div class="list-single-main-item fl-wrap" id="sec4">
                    <div class="list-single-main-item-title fl-wrap">
                        <h3>Item Reviews - <span> 3 </span></h3>
                    </div>
                    <div class="reviews-comments-wrap">
                        <!-- reviews-comments-item -->
                        <div class="reviews-comments-item">
                            <div class="review-comments-avatar">
                                <img src="images/avatar/1.jpg" alt="">
                            </div>
                            <div class="reviews-comments-item-text">
                                <h4><a href="#">Jessie Manrty</a></h4>
                                <div class="listing-rating card-popup-rainingvis"
                                    data-starrating2="5"> </div>
                                <div class="clearfix"></div>
                                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat
                                    blandit enim. Sem felis, ullamcorper vel aliquam non, varius
                                    eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                                <span class="reviews-comments-item-date"><i
                                        class="fa fa-calendar-check-o"></i>27 May 2018</span>
                            </div>
                        </div>
                        <!--reviews-comments-item end-->
                        <!-- reviews-comments-item -->
                        <div class="reviews-comments-item">
                            <div class="review-comments-avatar">
                                <img src="images/avatar/2.jpg" alt="">
                            </div>
                            <div class="reviews-comments-item-text">
                                <h4><a href="#">Mark Rose</a></h4>
                                <div class="listing-rating card-popup-rainingvis"
                                    data-starrating2="4"> </div>
                                <div class="clearfix"></div>
                                <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                    sem. Nulla consequat massa quis enim. Donec pede justo,
                                    fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                                    rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum
                                    felis eu pede mollis pretium. "</p>
                                <span class="reviews-comments-item-date"><i
                                        class="fa fa-calendar-check-o"></i>12 April 2018</span>
                            </div>
                        </div>
                        <!--reviews-comments-item end-->
                        <!-- reviews-comments-item -->
                        <div class="reviews-comments-item">
                            <div class="review-comments-avatar">
                                <img src="images/avatar/3.jpg" alt="">
                            </div>
                            <div class="reviews-comments-item-text">
                                <h4><a href="#">Adam Koncy</a></h4>
                                <div class="listing-rating card-popup-rainingvis"
                                    data-starrating2="5"> </div>
                                <div class="clearfix"></div>
                                <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
                                    posuere convallis purus non cursus. Cras metus neque, gravida
                                    sodales massa ut. "</p>
                                <span class="reviews-comments-item-date"><i
                                        class="fa fa-calendar-check-o"></i>03 December 2017</span>
                            </div>
                        </div>
                        <!--reviews-comments-item end-->
                    </div>
                </div>
                <!-- list-single-main-item end -->
                <!-- list-single-main-item -->
                <div class="list-single-main-item fl-wrap" id="sec5">
                    <div class="list-single-main-item-title fl-wrap">
                        <h3>Add Reviews & Rate item</h3>
                    </div>
                    <!-- Add Review Box -->
                    <div id="add-review" class="add-review-box">
                        <div class="leave-rating-wrap">
                            <span class="leave-rating-title">Your rating for this listing : </span>
                            <div class="leave-rating">
                                <input type="radio" name="rating" id="rating-1" value="1" />
                                <label for="rating-1" class="fa fa-star-o"></label>
                                <input type="radio" name="rating" id="rating-2" value="2" />
                                <label for="rating-2" class="fa fa-star-o"></label>
                                <input type="radio" name="rating" id="rating-3" value="3" />
                                <label for="rating-3" class="fa fa-star-o"></label>
                                <input type="radio" name="rating" id="rating-4" value="4" />
                                <label for="rating-4" class="fa fa-star-o"></label>
                                <input type="radio" name="rating" id="rating-5" value="5" />
                                <label for="rating-5" class="fa fa-star-o"></label>
                            </div>
                        </div>
                        <!-- Review Comment -->
                        <form class="add-comment custom-form">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><i class="fa fa-user-o"></i></label>
                                        <input type="text" placeholder="Your Name *" value="" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><i class="fa fa-envelope-o"></i> </label>
                                        <input type="text" placeholder="Email Address*" value="" />
                                    </div>
                                </div>
                                <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                            </fieldset>
                            <button class="btn  big-btn  color-bg flat-btn">Submit Review <i
                                    class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <!-- Add Review Box / End -->
                </div>
            </div>
            <div class="col-md-4">
                <!--  carousel-->
                <div class="list-single-carousel-wrap fl-wrap" id="sec1">
                    <div class="fw-carousel fl-wrap full-height lightgallery">

                    @foreach ($place_gallary as $img )

                        <!-- slick-slide-item -->
                        <div class="slick-slide-item">
                            <div class="box-item">
                                <img src="{{ asset('web_assets/images/all/single/'.$img->uploads ) }}" alt="">
                                <a href="{{ asset('web_assets/images/all/single/'.$img->uploads ) }}" class="gal-link popup-image"><i
                                        class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <!-- slick-slide-item end -->

                    @endforeach

                    </div>
                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                </div>
                <!--  carousel  end-->
            </div>
        </div>
    </section>
    <!-- list-single-main-item end -->





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

