@if(!Route::is('front.login'))
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mooli&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        position: relative;
        @if(Route::is('front.index') and isset($_COOKIE['email'])) height: 95vh;
        @endif
    }
    .slick-slide img {
        width: 100% !important;
        height: 100% !important;
    }
    .navbar__user__logo a {
        width: 50px;
        height: 50px;
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
        position: fixed;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.9);
        z-index: 190;
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

    @media(max-width: 1350px) {
        .navbar__links a {
            font-size: 15px !important;
        }
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

    @media(max-width: 460px) {
        .header__slide__img {
            width: 200px;
        }

        .sr::placeholder {
            font-size: 12px !important;
        }

        .sr {
            padding-bottom: 10px;
        }
    }

    .categroies_block {
        z-index: 3000
    }

    .categroies_block ul {
        position: relative;
    }

    .categroies_block .cat_exit {
        position: absolute;
        font-size: 30px;
        top: 20px;
        right: 20px;
        cursor: pointer;
    }

    .user__datas li {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-bottom: 0;
        padding: 10px !important;
    }

    .user__datas li a {
        height: max-content !important;
    }
</style>

<div class="navbar__mini">
    <ul>
        <li><a href="{{route('front.index')}}">Əsas Səhifə</a></li>
        @if($moviesCount > 0)
        <li><a href="{{route('front.last_uploads')}}">Ən Son Yüklənən Filmlər</a></li>
        @endif

        @if($seriesCount > 0)
        <li><a href="{{route('front.series')}}">Seriallar</a></li>
        @endif
        @if($documentalsCount>0 OR $oneSeriesDocumentalsCount>0)
        <li><a href="{{route('front.documentals')}}">Sənədli Filmlər</a></li>
        @endif
        <li><a href="{{route('front.documentals')}}">Əlaqə</a></li>
        @if($cateoriesCount > 0)
        @if(($seriesCount > 0) || ($moviesCount > 0) || ($documentalsCount>0) || ($oneSeriesDocumentalsCount>0))
        <li class=""><a class="categories__btn categories__btn__mini">Kateqoriyalar</a></li>
        @endif
        @endif
    </ul>
    <a href="{{route('front.account')}}" class="navbar__mini__profile">
        <div class="navbar__mini__profile__logo">
            <img src="https://static.vecteezy.com/system/resources/previews/005/005/788/original/user-icon-in-trendy-flat-style-isolated-on-grey-background-user-symbol-for-your-web-site-design-logo-app-ui-illustration-eps10-free-vector.jpg" alt="">
        </div>
        <span>Hesab</span>
    </a>
    <ul>
        <li><a href="{{route('front.favorites')}}">Sevimlilər</a></li>
        <li><a href="{{route('front.account.logout')}}">Çıxış et</a></li>
    </ul>
</div>
<div class="categroies categroies_block">
    <div class="cat_exit">
        <i class="fa fa-times cat_exit_times" aria-hidden="true"></i>
    </div>
    <ul>
        @foreach($categories as $category)
        <li><a href="{{route('front.movies', $category->slug)}}">{{ $category->getTranslation('name', app()->getLocale()) }}</a></li>
        @endforeach
        <!-- <li><a href="">Home</a></li>
                <li><a href="">Home</a></li>
                <li><a href="">Home</a></li>
                <li><a href="">Home</a></li>
                <li><a href="">Home</a></li> -->
    </ul>
</div>
<div class="search__panel">
    <form action="{{route('front.search')}}">
        <input type="search" class="sr" placeholder="Açar sözü daxil edin" name="q" id="">
    </form>
    <div class="search__panel__popular">
        @if($views->count() > 0)
        <h6>Ən çox izlənənlər</h6>
        <div class="search__panel__popular__wrapper">
            @foreach($views as $view)
            @foreach($view->movies as $item)
            <a href="{{route('front.movie', $item->id)}}"><img src="{{asset('assets/front/images/'.$item->banner)}}" alt=""></a>
            @endforeach
            @foreach($view->series as $item)
            <a href="{{route('front.serie', $item->id)}}"><img src="{{asset('assets/front/images/'.$item->banner)}}" alt=""></a>
            @endforeach
            @foreach($view->documentals as $item)
            <a href="{{route('front.documentals', $item->id)}}"><img src="{{asset('assets/front/images/'.$item->banner)}}" alt=""></a>
            @endforeach
            @foreach($view->oneseriesdocumentals as $item)
            <a href="{{route('front.sezonedDocumental', $item->id)}}"><img src="{{asset('assets/front/images/'.$item->banner)}}" alt=""></a>
            @endforeach
            @endforeach
        </div>
        @endif
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
                @if($moviesCount > 0)
                <li><a href="{{route('front.last_uploads')}}">Ən Son Yüklənən Filmlər</a></li>
                @endif
                @if($cateoriesCount > 0)
                @if(($seriesCount > 0) || ($moviesCount > 0) || ($documentalsCount>0) || ($oneSeriesDocumentalsCount>0))
                <li class=""><a class="categories__btn">Kateqoriyalar</a></li>
                @endif
                @endif
                @if($seriesCount > 0)
                <li><a href="{{route('front.series')}}">Seriallar</a></li>
                @endif
                @if($documentalsCount>0 OR $oneSeriesDocumentalsCount>0)
                <li><a href="{{route('front.documentals')}}">Sənədli Filmlər</a></li>
                @endif
                <li><a href="{{route('front.documentals')}}">Əlaqə</a></li>
            </ul>
        </div>
        <div class="navbar__user">
            <div class="navbar__user__search"><i class="fa fa-search" aria-hidden="true"></i></div>
            @if(isset($_COOKIE['email']))
            <div class="navbar__user__logo">
                <a href="{{route('front.account')}}">
                    <img src="{{asset('assets/front/img/avatar/'.$user->avatar)}}" alt="">
                </a>
                <div class="user__datas">
                    <ul>
                        <li>
                            <a style="width: max-content;" href="{{route('front.favorites')}}">Sevimlilər</a>
                        </li>
                        <li>
                            <a style="width: max-content;" href="{{route('front.account')}}">Hesab Məlumatları</a>
                        </li>
                        <li> <a style="width: max-content;" href="{{route('front.account.logout')}}">Çıxış et</a></li>
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
    @if(Route::is('front.index') and isset($_COOKIE['email']))
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
    @endif
</header>
@endif
