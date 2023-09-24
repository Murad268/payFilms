    @if(Route::is('front.index'))


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
        <form action="">
            <input type="search" placeholder="Açar sözü daxil edin" name="" id="">
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
                <a href="">
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
                            <li> <a href="">Çıxış et</a></li>
                        </ul>
                    </div>
                </div>
                <div class="navbar__hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
        <div class="header__slider slider__main">
            <div class="header__slide">
                <div class="overlay"></div>
                <div class="header__slide__body">
                    <div class="header__slide__img">
                        <img src="./microgain-9f959.appspot.png" alt="">
                    </div>
                    <div class="header__slide__category">
                        <span></span>
                        <span>Program</span>
                    </div>
                    <div class="header__slide__desc">
                        Bir Şifa Bağımlısının İtirafları
                        Kızının çaresi olmayan hastalığına çözüm arayan bir anne, yogadan şaman ayinlerine, sülük tedavisinden ayuverdik beslenmeye kadar giden şifa arayışına çıkar. Ela Başak Atakan’ın
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
                    <source media="(max-width: 400px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/vertical/HW24Vaod-400.jpg">
                    <source media="(max-width: 768px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/vertical/HW24Vaod-600.jpg">
                    <source media="(max-width: 1024px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-960.jpg">
                    <source media="(max-width: 1368px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-1280.jpg">
                    <img class="hero-bg" width="100%" src="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-1920.jpg" alt="Parade’s End">
                </picture>
            </div>
            <div class="header__slide">
                <div class="overlay"></div>
                <div class="header__slide__body">
                    <div class="header__slide__img">
                        <img src="./microgain-9f959.appspot.png" alt="">
                    </div>
                    <div class="header__slide__category">
                        <span></span>
                        <span>Program</span>
                    </div>
                    <div class="header__slide__desc">
                        Bir Şifa Bağımlısının İtirafları
                        Kızının çaresi olmayan hastalığına çözüm arayan bir anne, yogadan şaman ayinlerine, sülük tedavisinden ayuverdik beslenmeye kadar giden şifa arayışına çıkar. Ela Başak Atakan’ın
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
                    <source media="(max-width: 400px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/vertical/HW24Vaod-400.jpg">
                    <source media="(max-width: 768px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/vertical/HW24Vaod-600.jpg">
                    <source media="(max-width: 1024px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-960.jpg">
                    <source media="(max-width: 1368px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-1280.jpg">
                    <img class="hero-bg" width="100%" src="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-1920.jpg" alt="Parade’s End">
                </picture>
            </div>
            <div class="header__slide">
                <div class="overlay"></div>
                <div class="header__slide__body">
                    <div class="header__slide__img">
                        <img src="./microgain-9f959.appspot.png" alt="">
                    </div>
                    <div class="header__slide__category">
                        <span></span>
                        <span>Program</span>
                    </div>
                    <div class="header__slide__desc">
                        Bir Şifa Bağımlısının İtirafları
                        Kızının çaresi olmayan hastalığına çözüm arayan bir anne, yogadan şaman ayinlerine, sülük tedavisinden ayuverdik beslenmeye kadar giden şifa arayışına çıkar. Ela Başak Atakan’ın
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
                    <source media="(max-width: 400px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/vertical/HW24Vaod-400.jpg">
                    <source media="(max-width: 768px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/vertical/HW24Vaod-600.jpg">
                    <source media="(max-width: 1024px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-960.jpg">
                    <source media="(max-width: 1368px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-1280.jpg">
                    <img class="hero-bg" width="100%" src="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-1920.jpg" alt="Parade’s End">
                </picture>
            </div>
            <div class="header__slide">
                <div class="overlay"></div>
                <div class="header__slide__body">
                    <div class="header__slide__img">
                        <img src="./microgain-9f959.appspot.png" alt="">
                    </div>
                    <div class="header__slide__category">
                        <span></span>
                        <span>Program</span>
                    </div>
                    <div class="header__slide__desc">
                        Bir Şifa Bağımlısının İtirafları
                        Kızının çaresi olmayan hastalığına çözüm arayan bir anne, yogadan şaman ayinlerine, sülük tedavisinden ayuverdik beslenmeye kadar giden şifa arayışına çıkar. Ela Başak Atakan’ın
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
                    <source media="(max-width: 400px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/vertical/HW24Vaod-400.jpg">
                    <source media="(max-width: 768px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/vertical/HW24Vaod-600.jpg">
                    <source media="(max-width: 1024px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-960.jpg">
                    <source media="(max-width: 1368px)" srcset="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-1280.jpg">
                    <img class="hero-bg" width="100%" src="https://storage.googleapis.com/microgain-9f959.appspot.com/tr/images/titles/covers/horizontal/HW24Vaod-1920.jpg" alt="Parade’s End">
                </picture>
            </div>
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
