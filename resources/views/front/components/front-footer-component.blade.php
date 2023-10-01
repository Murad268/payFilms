<footer>
    <div class="footer-top-wrap">
        <div class="container">
            <div class="footer-menu-wrap p-0">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <a href="{{route('front.index')}}"><img src="{{asset('assets/front/icons/'.$settingsData['logo'])}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <a class="footer_banner" href="">
                            <img src="{{asset('assets/front/images/'.$banner->banner)}}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-menu">
                            <nav>
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="{{$settingsData['facebook']}}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{$settingsData['twitter']}}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{$settingsData['instagram']}}"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="{{$settingsData['linkedin']}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-text">
                        <p>{{$settingsData['copywrite']}}</p>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6">
                    <div class="payment-method-img text-center text-md-right">
                        <img src="img/images/card_img.png" alt="img">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->
