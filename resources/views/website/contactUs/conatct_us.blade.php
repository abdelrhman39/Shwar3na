@extends('layouts.site')

@section('site_title', ' تواصل معنا')
@section('content')
    <section class="parallax-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="{{asset('web_assets/images/bg/2.jpg')}}"
            data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="bubble-bg"></div>
        <div class="container">
            <div class="section-title center-align">
                <h2><span>Our Contacts</span></h2>
                <div class="breadcrumbs fl-wrap"><a href="#">Home</a> <span>Contacts</span></div>
                <span class="section-separator"></span>
            </div>
        </div>
        <div class="header-sec-link">
            <div class="container"><a href="#sec1" class="custom-scroll-link">Lets Start</a></div>
        </div>
    </section>
    <!-- section end -->
    <!--section -->
    <section id="sec1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="list-single-main-item fl-wrap">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Contact <span>Details </span></h3>
                        </div>
                        <div class="list-single-main-media fl-wrap">
                            <img src="{{asset('web_assets/images/all/12.jpg')}}"  class="respimg" alt="">
                        </div>
                        <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget
                            iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales
                            eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus
                            tellus, ut tristique elit risus at metus. In ut odio libero, at vulputate urna.
                            Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit
                            commodo gravida.</p>
                        <div class="list-author-widget-contacts">
                            <ul>
                                <li><span><i class="fa fa-map-marker"></i> Adress :</span> <a href="#">USA
                                        27TH Brooklyn NY</a></li>
                                <li><span><i class="fa fa-phone"></i> Phone :</span> <a
                                        href="#">+7(123)987654</a></li>
                                <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a
                                        href="#">AlisaNoory@domain.com</a></li>
                                <li><span><i class="fa fa-globe"></i> Website :</span> <a
                                        href="#">themeforest.net</a></li>
                            </ul>
                        </div>
                        <div class="list-widget-social">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-single-main-wrapper fl-wrap">
                         <div class="list-single-main-item-title fl-wrap">
                            <h3>Our Location</h3>
                        </div>
                        <div class="map-container">
                            <div id="singleMap">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3487.159960686197!2d31.103481285581797!3d29.071417770833488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145a25b410bf3055%3A0x94ad65654e5d1054!2zU2h3YXIzbmEg2LTZiNin2LHYudmG2Kc!5e0!3m2!1sar!2seg!4v1641399667720!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Get In Touch</h3>
                        </div>
                        <div id="contact-form">
                            <div id="message"></div>
                            <form class="custom-form" action="php/contact.php" name="contactform"
                                id="contactform">
                                <fieldset>
                                    <label><i class="fa fa-user-o"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Your Name *"
                                        value="" />
                                    <div class="clearfix"></div>
                                    <label><i class="fa fa-envelope-o"></i> </label>
                                    <input type="text" name="email" id="email" placeholder="Email Address*"
                                        value="" />
                                    <textarea name="comments" id="comments" cols="40" rows="3"
                                        placeholder="Your Message:"></textarea>
                                </fieldset>
                                <button class="btn  big-btn  color-bg flat-btn" id="submit">Send<i
                                        class="fa fa-angle-right"></i></button>
                            </form>
                        </div>
                        <!-- contact form  end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <div class="limit-box fl-wrap"></div>

    @if(auth::User())
    @else

    <!--section -->
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
    <!-- section end -->
    @endif

    <script type="text/javascript"
    src="http://maps.google.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo"></script>
    <script type="text/javascript" src="{{asset('web_assets/js/map_infobox.js')}}"></script>
    <script type="text/javascript" src="{{asset('web_assets/js/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="{{asset('web_assets/js/maps.js')}}"></script>
@endsection
