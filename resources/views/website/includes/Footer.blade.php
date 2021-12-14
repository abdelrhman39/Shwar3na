<!--footer -->

<footer class="main-footer dark-footer  " >
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <div class="widget_text footer-widget fl-wrap widget_custom_html">
                        <img src="{{asset('uploads/Logo(light).png')}}" alt="" style="width: inherit;">

                    </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget fl-wrap">
                    <h3>من نحن</h3>
                    <div class="footer-contacts-widget fl-wrap">
                        <p>{{$about_data->about_data}}</p>
                        <ul class="footer-contacts fl-wrap">
                            <li><span><i class="fa fa-envelope-o"></i>  : البريد الالكترونى  </span><a href="mailto:{{$about_data->email}}"
                                    target="_blank"> {{$about_data->email}} </a></li>
                            <li> <span><i class="fa fa-map-marker"></i> : العنوان  </span><a href="#"
                                    target="_blank"> {{$about_data->address}} </a></li>
                            <li><span><i class="fa fa-phone"></i> : رقم الهاتف  </span><a href="tel://{{$about_data->phone}}"> {{$about_data->phone}} </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget fl-wrap">
                    <h3>أخر الأخبار</h3>
                    <div class="widget-posts fl-wrap" style="margin-right: -72px;">
                        <ul>
                            <li class="clearfix">
                                <a href="#" class="widget-posts-img"><img src="images/all/1.jpg" class="respimg" alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Vivamus dapibus rutrum</a>
                                    <span class="widget-posts-date"> 21 Mar 09.05 </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <a href="#" class="widget-posts-img"><img src="images/all/2.jpg" class="respimg"
                                        alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title=""> In hac habitasse platea</a>
                                    <span class="widget-posts-date"> 7 Mar 18.21 </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <a href="#" class="widget-posts-img"><img src="images/all/3.jpg" class="respimg"
                                        alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Tortor tempor in porta</a>
                                    <span class="widget-posts-date"> 7 Mar 16.42 </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{--  <div class="col-md-3">
                <div class="footer-widget fl-wrap">
                    <h3>Our Twitter</h3>
                    <div id="footer-twiit"></div>
                </div>
            </div>  --}}

        </div>
    </div>
    <div class="sub-footer fl-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="about-widget">
                        <img src="images/logo.png" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="copyright"> &#169; Shwar3na 2021 . All rights reserved.</div>
                </div>
                <div class="col-md-4">
                    <div class="footer-social">
                        <ul>
                            <li><a href="{{$about_data->facbook}}" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
                            <li><a href="{{$about_data->facbook}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$about_data->instgram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            {{--  <li><a href="#" target="_blank"><i class="fa fa-vk"></i></a></li>  --}}
                            <li><a href="https://api.whatsapp.com/send?phone={{$about_data->whatsApp}}&amp;&amp;text=%d9%85%d8%b1%d8%ad%d8%a8%d8%a7%2c%20%d9%86%d8%b1%d9%8a%d8%af%20%d9%85%d8%b9%d8%b1%d9%81%d8%a9%20%d8%a7%d9%84%d8%ae%d8%af%d9%85%d8%a7%d8%aa%20%d9%88%d8%a7%d9%84%d8%aa%d9%83%d8%a7%d9%84%d9%8a%d9%81%20%d8%a7%d9%84%d8%ad%d8%a7%d9%84%d9%8a%d8%a9" target="_blank" onclick="return gtag_report_conversion('https://api.whatsapp.com/send?phone={{$about_data->whatsApp}}&amp;&amp;text=%d9%85%d8%b1%d8%ad%d8%a8%d8%a7%2c%20%d9%86%d8%b1%d9%8a%d8%af%20%d9%85%d8%b9%d8%b1%d9%81%d8%a9%20%d8%a7%d9%84%d8%ae%d8%af%d9%85%d8%a7%d8%aa%20%d9%88%d8%a7%d9%84%d8%aa%d9%83%d8%a7%d9%84%d9%8a%d9%81%20%d8%a7%d9%84%d8%ad%d8%a7%d9%84%d9%8a%d8%a9');" ><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end  -->
