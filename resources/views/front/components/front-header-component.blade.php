    @if(Route::is('front.index') and isset($_COOKIE['email']))
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mooli&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            position: relative;
            height: 95vh;
        }

        .slick-track {
            height: 100%;
        }

        .slick-list {
            height: 100%;
        }

        .slick-slider {
            width: 100%;
            height: 97vh;
            position: relative;
        }

        .slick-slide {
            height: 100%;
            position: relative;
        }

        .slick-slide>picture {
            display: block;
            width: 100%;
            height: 100%;
        }

        .slick-slide source {
            display: block;
            width: 100%;

        }

        .slick-dots {
            display: flex;
            position: absolute !important;
            bottom: 35px !important;
            left: 50% !important;
            transform: translateX(-50%);
        }

        .slick-dots li {
            margin: 0 10px !important;
            height: 3px;
            overflow: hidden;
        }

        .slick-dots li button {
            width: 25px !important;
            height: 1px !important;
            background-color: rgba(128, 128, 128, 0.985) !important;
            border: none !important;
            cursor: pointer !important;
            border-radius: 4px !important;
            transition: 0.4s !important;
            padding: 1px !important;
        }



        .slick-dots li.slick-active button {
            width: 40px !important;
            background-color: #ed1c24 !important;
            /* Set the background color of the active dot */
        }

        .slick-dots li button::before,
        .slick-dots li.slick-active button::before {
            opacity: 0 !important;
        }

        .overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 10;
            background: linear-gradient(to bottom, rgba(0, 0, 0, -0.2) 0%, rgba(0, 0, 0, 0.3) 100%);
        }

        .header__slide__img {
            width: 400px;
        }

        .header__slide__img img {
            width: 100%;
        }

        .header__slide__body {
            max-width: 550px;
            position: absolute;
            top: 150px;
            left: 150px;
            z-index: 11;
        }

        .header__slide__category {
            display: flex;
            column-gap: 15px;
            align-items: center;
            width: max-content;
            margin-top: 15px;
        }

        .header__slide__category span:first-child {
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 100%
        }

        .header__slide__category span:last-child {
            font-size: 25px;
            font-weight: bold;
            color: white;
            font-family: 'Mooli', sans-serif;
        }

        .header__slide__desc {
            font-size: 20px;
            font-weight: bold;
            color: white;
            font-family: 'Mooli', sans-serif;
            margin-top: 25px;
            line-height: 30px;
        }

        .watch__now {
            font-family: 'Mooli', sans-serif;
            width: 160px;
            border-radius: 50px;
            color: black;
            text-decoration: none;
            font-weight: bold;
            height: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white
        }

        .watch__now>div {
            display: flex;
            align-items: center;
            column-gap: 10px
        }

        .watch__now>div>span:first-child {
            font-size: 25px;
        }

        .header__slide__bottom {
            margin-top: 20px;
        }

        .navbar__links {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px 35px;
            border-radius: 30px
        }

        .navbar__links ul {
            list-style-type: none;
            display: flex;
            column-gap: 30px
        }

        .navbar__links ul a {
            text-decoration: none;
            font-family: 'Mooli', sans-serif;
            color: white;
            opacity: 0.7;
            transition: 0.4s;
            font-size: 20px;
        }

        .navbar__links ul a:hover {
            opacity: 1;
        }

        .navbar {
            padding: 0 30px;
            margin-top: 20px;
            display: flex;
            width: 100%;
            position: fixed;
            align-items: center;
            top: 0;
            left: 0;
            z-index: 2000;
            justify-content: space-between;
        }

        .navbar__logo {
            width: 120px;
            height: 35px;
        }

        .navbar__logo img {
            width: 100%;
            height: 100%;
        }

        .navbar__user__logo {
            width: 60px;
            height: 60px;
            position: relative;

        }

        .navbar__user__logo a {
            display: block;
        }

        .navbar__user__logo a img {
            width: 100%;
            height: 100%;
            border-radius: 100%;
        }

        .navbar__user {
            display: flex;
            align-items: center;
            column-gap: 30px;
        }

        .navbar__user__search {
            cursor: pointer;
            width: 60px;
            height: 60px;
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 20px;
        }

        .user__datas {

            position: absolute;
            width: 350px;
            top: 80px;
            right: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 200 !important;
            border-radius: 10px;
            transition: 0.4s;
            visibility: hidden;
            opacity: 0;
        }

        .user__datas ul {
            display: flex;
            flex-direction: column;
            list-style-type: none;
        }

        .user__datas ul li {
            padding: 20px 40px;

        }

        .user__datas ul li:hover {
            background-color: rgba(0, 0, 0, 0.4)
        }

        .user__datas a {
            color: white;
            text-decoration: none;
            font-size: 20px;
        }

        .navbar__user__logo:hover .user__datas {
            visibility: visible;
            opacity: 1;
        }

        .search__panel {
            transition: 0.4s;
            visibility: hidden;
            opacity: 0;
            padding: 0 30px;
            padding-top: 120px;
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.9);
            z-index: 19;
            font-family: 'Mooli', sans-serif;
        }

        .search__panel.active {
            visibility: visible;
            opacity: 1;
        }

        .search__panel h6 {
            margin-top: 30px;
        }

        input[type="search"]::-webkit-search-decoration,
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-results-button,
        input[type="search"]::-webkit-search-results-decoration {
            display: none;
        }

        .search__panel input {
            width: 100%;
            height: 70px;
            border-radius: 40px;
            border: none;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            font-size: 30px;
            padding-left: 35px;
        }

        .search__panel input::placeholder {
            font-size: 30px;
        }

        .search__panel input:focus {
            outline: none;
        }

        .search__panel__popular h6 {
            font-weight: bold;
            color: white;
            font-size: 20px;
            margin-left: 30px;
        }

        .search__panel__popular__wrapper {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .search__panel__popular__wrapper img {
            width: 100%;
            height: 100%;
        }

        .categroies {
            transition: 0.4s;
            min-width: 300px;
            height: 100vh;
            z-index: 10;
            position: fixed;
            padding: 40px;
            padding-top: 120px;
            top: 0;
            left: -100%;
            z-index: 100;
            background: rgba(0, 0, 0, 0.8);
        }

        .categroies.active {
            left: 0;
        }

        .categroies ul a {
            color: white;
            text-decoration: none;
            font-family: 'Mooli', sans-serif;
            font-size: 25px;
        }

        .categroies ul li {
            position: relative;
            transition: 0.3s;
        }

        .categroies ul li:hover {
            padding-left: 40px;
        }

        .categroies ul li:hover::before {
            width: 30px;
            transition: 0.3s;
        }

        .categroies ul li:before {
            position: absolute;
            top: 50%;
            left: 0px;
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: red;
            z-index: -1;
        }

        .categroies ul {
            display: flex;
            flex-direction: column;
            row-gap: 12px;
            list-style-type: none;
        }

        .categories__btn {
            cursor: pointer;
        }

        .navbar__hamburger {
            width: 20px;
            height: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
            position: relative;
            display: none;
        }

        .navbar__hamburger.active {
            padding-top: 5px;
        }

        .navbar__hamburger span {
            display: block;
            width: 100%;
            height: 3px;
            background: white;
            transition: 0.4s;
        }

        .navbar__hamburger.active span:first-child {
            transform: rotate(45deg);
        }

        .navbar__hamburger.active span:nth-child(2) {
            display: none;
        }

        .navbar__hamburger.active span:last-child {
            transform: rotate(-45deg);
            position: absolute;
        }


        @media(max-width: 1150px) {
            .navbar__hamburger {
                display: flex;
            }

            .navbar__user__logo,
            .navbar__links {
                display: none;
            }
        }

        @media(max-width: 752px) {
            .header__slide__body {
                left: 60px;
            }
        }

        @media(max-width: 550px) {
            .header__slide__body {
                left: 0;
                padding: 20px;
            }
        }

        @media(max-width: 400px) {
            .header__slide__desc {
                display: none;
            }
        }

        .navbar__mini {
            padding: 60px;
            padding-top: 100px;
            position: fixed;
            max-width: 300px;
            height: 100vh;
            z-index: 190;
            right: -100%;
            top: 0;
            background-color: #111111;
            transition: 0.4s;
        }

        .navbar__mini.active {
            right: 0;
        }

        .navbar__mini ul {
            display: flex;
            flex-direction: column;
            justify-content: center;

            row-gap: 10px;
            list-style-type: none;
        }

        .navbar__mini ul a {
            line-height: 35px;
            display: block;
            text-align: center;
            color: white;
            text-decoration: none;
            font-family: 'Mooli', sans-serif;
        }

        .navbar__mini__profile {
            width: max-content;
            margin: 0 auto;
            display: flex;
            column-gap: 15px;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .navbar__mini__profile__logo {
            width: 30px;
            border-radius: 100%;
            overflow: hidden;
            height: 30px;
        }

        .navbar__mini__profile__logo img {
            width: 100%;
            height: 100%;
        }

        .navbar__mini__profile span {
            font-family: 'Mooli', sans-serif;
            color: white;

        }
    </style>

    <div class="navbar__mini">
        <ul>
            <li><a href="">Əsas Səhifə</a></li>
            <li><a href="">Ən Son Yüklənən Filmlər</a></li>
            <li class=""><a class="categories__btn">Kateqoriyalar</a></li>
            <li><a href="">Sənədli Filmlər</a></li>
        </ul>
        <a href="{{route('front.account')}}" class="navbar__mini__profile">
            <div class="navbar__mini__profile__logo">
                <img src="https://static.vecteezy.com/system/resources/previews/005/005/788/original/user-icon-in-trendy-flat-style-isolated-on-grey-background-user-symbol-for-your-web-site-design-logo-app-ui-illustration-eps10-free-vector.jpg" alt="">
            </div>
            <span>Hesab</span>
        </a>
        <ul>
            <li><a href="">İzləmə siyahısı</a></li>
            <li><a href="{{route('front.account.logout')}}">Çıxış et</a></li>
        </ul>
    </div>
    <div class="categroies">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
        </ul>
    </div>
    <div class="search__panel">
        <form action="{{route('front.search')}}">
            <input type="search" placeholder="Açar sözü daxil edin" name="q" id="">
        </form>
        <div class="search__panel__popular">
            <h6>Ən çox izlənənlər</h6>

            <div class="search__panel__popular__wrapper">
                <div><img src="https://img.freepik.com/free-psd/real-estate-house-property-web-banner-template_120329-1947.jpg" alt=""></div>
                <div><img src="https://img.freepik.com/free-psd/real-estate-house-property-web-banner-template_120329-1947.jpg" alt=""></div>
                <div><img src="https://img.freepik.com/free-psd/real-estate-house-property-web-banner-template_120329-1947.jpg" alt=""></div>
                <div><img src="https://img.freepik.com/free-psd/real-estate-house-property-web-banner-template_120329-1947.jpg" alt=""></div>
                <div><img src="https://img.freepik.com/free-psd/real-estate-house-property-web-banner-template_120329-1947.jpg" alt=""></div>
            </div>
        </div>
    </div>
    <header>
        <nav class="navbar">
            <div class="navbar__logo">
                <a href="{{route('front.index')}}">
                    <img src="{{asset('assets/front/icons/'.$settings->logo)}}" alt="">
                </a>
            </div>
            <div class="navbar__links">
                <ul>
                    <li><a href="{{route('front.index')}}">Əsas Səhifə</a></li>
                    <li><a href="{{route('front.last_uploads')}}">Ən Son Yüklənən Filmlər</a></li>
                    <li class=""><a class="categories__btn">Kateqoriyalar</a></li>
                    <li><a href="{{route('front.series')}}">Seriallar</a></li>
                    <li><a href="">Sənədli Filmlər</a></li>
                </ul>
            </div>
            <div class="navbar__user">
                <div class="navbar__user__search"><i class="fa fa-search" aria-hidden="true"></i></div>

                @if(isset($_COOKIE['email']))
                <div class="navbar__user__logo">
                    <a href="{{route('front.account')}}">
                        <img src="https://static.vecteezy.com/system/resources/previews/005/005/788/original/user-icon-in-trendy-flat-style-isolated-on-grey-background-user-symbol-for-your-web-site-design-logo-app-ui-illustration-eps10-free-vector.jpg" alt="">
                    </a>
                    <div class="user__datas">
                        <ul>
                            <li>
                                <a href="">İzləmə Siyahısı</a>
                            </li>
                            <li>
                                <a href="{{route('front.account')}}">Hesab Məlumatları</a>
                            </li>
                            <li> <a href="{{route('front.account.logout')}}">Çıxış et</a></li>
                        </ul>
                    </div>
                </div>
                @else
                <div class="navbar__enter">
                    <div class="header-btn"><a href="{{route('front.account')}}" class="btn">Daxil ol</a></div>
                </div>
                @endif

                <div class="navbar__hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
        <div class="header__slider slider__main">
            @foreach($sliders as $slider)
            <div class="header__slide">
                <div class="overlay"></div>
                <div class="header__slide__body">
                    <div class="header__slide__img">
                        <img src="{{asset('assets/front/images/'.$slider->logo)}}" alt="">
                    </div>
                    <div class="header__slide__category">
                        <span></span>
                        <span>{{$slider->getCategory($slider)}} </span>

                    </div>
                    <div class="header__slide__desc">
                        {!! $slider->getName($slider) !!}
                    </div>
                    <div class="header__slide__bottom">
                        <a class="watch__now" href="">
                            <div>
                                <span>&#9658;</span><span>İndi İzlə</span>
                            </div>
                        </a>
                    </div>
                </div>
                <picture>
                    <source media="(max-width: 400px)" srcset="{{asset('assets/front/images/'.$slider->{'max-width: 400px'})}}">
                    <source media="(max-width: 768px)" srcset="{{asset('assets/front/images/'.$slider->{'max-width: 768px'})}}">
                    <source media="(max-width: 1024px)" srcset="{{asset('assets/front/images/'.$slider->{'max-width: 1024px'})}}">
                    <source media="(max-width: 1368px)" srcset="{{asset('assets/front/images/'.$slider->{'max-width: 1368px'})}}">
                    <img class="hero-bg" width="100%" src="{{asset('assets/front/images/'.$slider->default_img)}}" alt="Parade’s End">
                </picture>
            </div>
            @endforeach

        </div>
    </header>

    @else
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/icons/'.$settings->icon)}}">
    <header>
        <div id="sticky-header" class="menu-area transparent-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="{{route('front.index')}}">
                                    <a href="{{route('front.index')}}">
                                        <img src="{{asset('assets/front/icons/'.$settings->logo)}}" alt="Logo">
                                    </a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li><a href="{{route('front.index')}}">Əsas Səhİfə</a></li>
                                        <li><a href="{{route('front.last_uploads')}}">Son Yüklənən Fİlmlər</a></li>
                                        <li class="menu-item-has-children"><a href="#">Kateqorİyalar</a>
                                            <ul class="submenu">
                                                @foreach($categories as $category)
                                                <li><a href="{{route('front.movies', $category->slug)}}">{{ $category->getTranslation('name', app()->getLocale()) }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{route('front.series')}}">Seriallar</a></li>
                                        <!-- <li><a href="tv-show">Kateqoriyalar</a></li> -->
                                        <!-- <li><a href="pricing">Pricing</a></li> -->
                                        <!-- <li class="menu-item-has-children"><a href="#">blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog">Our Blog</a></li>
                                                <li><a href="blog-details">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="{{route('front.contact')}}">Əlaqə</a></li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="header-search"><a href="#" data-toggle="modal" data-target="#search-modal"><i class="fas fa-search"></i></a></li>
                                        <!-- <li class="header-lang">
                                            <form action="#">
                                                <div class="icon"><i class="flaticon-globe"></i></div>
                                                <select id="lang-dropdown">
                                                    <option value="">En</option>
                                                    <option value="">Au</option>
                                                    <option value="">AR</option>
                                                    <option value="">TU</option>
                                                </select>
                                            </form>
                                        </li> -->
                                        @if(isset($_COOKIE['email']))
                                        <li class="header-btn"><a href="{{route('front.account')}}" class="btn">Hesabım</a></li>
                                        @else
                                        <li class="header-btn"><a href="{{route('front.login')}}" class="btn">Daxil ol</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <nav class="menu-box">
                                <div class="nav-logo"><a href="{{route('front.index')}}"><img src="{{asset('assets/front/icons/'.$settings->logo)}}" alt="" title=""></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        @if(isset($_COOKIE['email']))
                                        <li class="header-btn"><a href="{{route('front.account')}}" class="btn">Hesabım</a></li>
                                        @else
                                        <li class="header-btn"><a href="{{route('front.login')}}" class="btn">Daxil ol</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->

                        <!-- Modal Search -->
                        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{route('front.search')}}">
                                        <input type="text" placeholder="Axtar..." name="q" id="search" class="form-control" autocomplete="off">
                                        <div class="result"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Search-end -->

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

                        <script type="text/javascript">
                            $(document).ready(function() {
                                loadData();

                                function loadData(query) {
                                    $.ajax({
                                        url: "search.php",
                                        type: "POST",
                                        chache: false,
                                        data: {
                                            query: query
                                        },
                                        success: function(response) {
                                            $(".result").html(response);
                                        }
                                    });
                                }
                                $("#search").keyup(function() {
                                    let search = $(this).val();
                                    if (search != "") {
                                        loadData(search);
                                    } else {
                                        loadData();
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </header>
    @endif
