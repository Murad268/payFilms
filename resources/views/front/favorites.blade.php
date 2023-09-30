@extends('front.front')
@section('content')
<!-- main-area -->
<main>
    <style>
        .pagination-wrap {
            width: max-content;
            margin: 0 auto;

        }

        .pagination-wrap ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .pagination-wrap ul li {
            display: inline;
            margin-right: 10px;
            /* Sayfalar arası boşluk */
        }

        .pagination-wrap ul li a {
            color: white;
            /* Sayfa linklerinin metin rengi */
            text-decoration: none;
            /* Sayfa linklerinin altı çizili olmaması */
            padding: 5px 10px;
            /* Sayfa linklerinin içeriğin kenarlıktan uzaklığı */
            background-color: black;
            /* Sayfa linklerinin arka plan rengi */
            border-radius: 5px;
            /* Sayfa linklerinin köşe yuvarlama */
        }

        .pagination-wrap ul li.active a {
            background-color: red;
            /* Aktif sayfanın arka plan rengi */
            color: white;
            /* Aktif sayfanın metin rengi */
        }

        .pagination-wrap ul li a:hover {
            background-color: darkred;
            /* Fare üzerine geldiğinde sayfa linklerinin arka plan rengi */
        }
    </style>


    <!-- movie-area -->

    @if($moviesResults->count() > 0)
    <section class="movie-area movie-bg" data-background="{{asset('assets/front/img/bg/movie_bg.jpg')}}">
        <div class="container">

            <div class="row align-items-end mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center text-lg-left">
                        <!-- <span class="sub-title">ONLINE STREAMING</span> -->
                        <h2 class="title">Filmlər</h2>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="movie-page-meta">
                        <div class="tr-movie-menu-active text-center">
                            <button class="active" data-filter="*">Animation</button>
                            <button class="" data-filter=".cat-one">Movies</button>
                            <button class="" data-filter=".cat-two">Romantic</button>
                        </div>
                        <form action="#" class="movie-filter-form">
                            <select class="custom-select">
                                <option selected>English</option>
                                <option value="1">Blueray</option>
                                <option value="2">4k Movie</option>
                                <option value="3">Hd Movie</option>
                            </select>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="row tr-movie-active">
                @foreach($moviesResults as $movie)
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="{{asset('assets/front/images/'.$movie->poster)}}" width="303" height="430" alt="">
                            <ul class="overlay-btn">
                                <!-- <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li> -->
                                <li><a href="https://www.youtube.com/watch?v=" class="popup-video btn">Trailer</a></li>
                                <li><a href="{{route('front.movie', $movie->id)}}" class="btn">Details</a></li>
                            </ul>
                            @if($movie->checkFavorite('movies', $movie->id))
                            <i data-id='{{$movie->id}}' type="movies" class="fa fa-heart active" aria-hidden="true"></i>
                            @else
                            <i data-id='{{$movie->id}}' type="movies" class="fa fa-heart" aria-hidden="true"></i>
                            @endif
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="">{{$movie->getTranslation('name', app()->getLocale()) }}</a></h5>
                                <!-- <span class="date">{!! $movie->getTranslation('desc', app()->getLocale()) !!}</span> -->
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li><span class="quality">{{$movie->quality}}</span></li>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i> {{$movie->length}} dəq</span>
                                        <!-- <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>
    @endif


    @if($seriesResults->count() > 0)
    <section class="movie-area movie-bg" data-background="{{asset('assets/front/img/bg/movie_bg.jpg')}}">
        <div class="container">

            <div class="row align-items-end mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center text-lg-left">
                        <!-- <span class="sub-title">ONLINE STREAMING</span> -->
                        <h2 class="title">Seriallar</h2>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="movie-page-meta">
                        <div class="tr-movie-menu-active text-center">
                            <button class="active" data-filter="*">Animation</button>
                            <button class="" data-filter=".cat-one">Movies</button>
                            <button class="" data-filter=".cat-two">Romantic</button>
                        </div>
                        <form action="#" class="movie-filter-form">
                            <select class="custom-select">
                                <option selected>English</option>
                                <option value="1">Blueray</option>
                                <option value="2">4k Movie</option>
                                <option value="3">Hd Movie</option>
                            </select>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="row tr-movie-active">
                @foreach($seriesResults as $movie)
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="{{asset('assets/front/images/'.$movie->poster)}}" width="303" height="430" alt="">
                            <ul class="overlay-btn">
                                <!-- <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li> -->
                                <li><a href="https://www.youtube.com/watch?v=" class="popup-video btn">Trailer</a></li>
                                <li><a href="{{route('front.serie', $movie->id)}}" class="btn">Details</a></li>
                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="">{{$movie->getTranslation('name', app()->getLocale()) }}</a></h5>
                                <!-- <span class="date">{!! $movie->getTranslation('desc', app()->getLocale()) !!}</span> -->
                            </div>
                            @if($movie->checkFavorite('series', $movie->id))
                            <i data-id='{{$movie->id}}' type="series" class="fa fa-heart active" aria-hidden="true"></i>
                            @else
                            <i data-id='{{$movie->id}}' type="series" class="fa fa-heart " aria-hidden="true"></i>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>
    @endif

    @if($documentalsResults->count() > 0)
    <section class="movie-area movie-bg" data-background="{{asset('assets/front/img/bg/movie_bg.jpg')}}">
        <div class="container">

            <div class="row align-items-end mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center text-lg-left">
                        <!-- <span class="sub-title">ONLINE STREAMING</span> -->
                        <h2 class="title">Sənədli filmlər</h2>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="movie-page-meta">
                        <div class="tr-movie-menu-active text-center">
                            <button class="active" data-filter="*">Animation</button>
                            <button class="" data-filter=".cat-one">Movies</button>
                            <button class="" data-filter=".cat-two">Romantic</button>
                        </div>
                        <form action="#" class="movie-filter-form">
                            <select class="custom-select">
                                <option selected>English</option>
                                <option value="1">Blueray</option>
                                <option value="2">4k Movie</option>
                                <option value="3">Hd Movie</option>
                            </select>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="row tr-movie-active">
                @foreach($documentalsResults as $movie)


                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="{{asset('assets/front/images/'.$movie->poster)}}" width="303" height="430" alt="">
                            <ul class="overlay-btn">
                                <!-- <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li> -->
                                <li><a href="https://www.youtube.com/watch?v=" class="popup-video btn">Trailer</a></li>
                                <li><a href="{{route('front.sezonedDocumental', $movie->id)}}" class="btn">Details</a></li>
                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="">{{$movie->getTranslation('name', app()->getLocale()) }}</a></h5>
                                <!-- <span class="date">{!! $movie->getTranslation('desc', app()->getLocale()) !!}</span> -->
                            </div>
                            @if($movie->checkFavorite('documentals', $movie->id))
                            <i data-id='{{$movie->id}}' type="documentals" class="fa fa-heart active" aria-hidden="true"></i>
                            @else
                            <i data-id='{{$movie->id}}' type="documentals" class="fa fa-heart" aria-hidden="true"></i>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>
    @endif

    @if($onseSeriesDocumentalsResults->count() > 0)
    <section class="movie-area movie-bg" data-background="{{asset('assets/front/img/bg/movie_bg.jpg')}}">
        <div class="container">

            <div class="row align-items-end mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center text-lg-left">
                        <!-- <span class="sub-title">ONLINE STREAMING</span> -->
                        <h2 class="title">Bir sezonlu sənədli filmlər</h2>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="movie-page-meta">
                        <div class="tr-movie-menu-active text-center">
                            <button class="active" data-filter="*">Animation</button>
                            <button class="" data-filter=".cat-one">Movies</button>
                            <button class="" data-filter=".cat-two">Romantic</button>
                        </div>
                        <form action="#" class="movie-filter-form">
                            <select class="custom-select">
                                <option selected>English</option>
                                <option value="1">Blueray</option>
                                <option value="2">4k Movie</option>
                                <option value="3">Hd Movie</option>
                            </select>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="row tr-movie-active">
                @foreach($onseSeriesDocumentalsResults as $movie)
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-two">
                    <div class="movie-item movie-item-three mb-50">
                        <div class="movie-poster">
                            <img src="{{asset('assets/front/images/'.$movie->poster)}}" width="303" height="430" alt="">
                            <ul class="overlay-btn">
                                <!-- <li class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li> -->
                                <li><a href="https://www.youtube.com/watch?v=" class="popup-video btn">Trailer</a></li>
                                <li><a href="{{route('front.documental', $movie->id)}}" class="btn">Details</a></li>
                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a href="">{{$movie->getTranslation('name', app()->getLocale()) }}</a></h5>
                                <!-- <span class="date">{!! $movie->getTranslation('desc', app()->getLocale()) !!}</span> -->
                            </div>
                            @if($movie->checkFavorite('oneseriesdocumentals', $movie->id))
                            <i data-id='{{$movie->id}}' type="oneseriesdocumentals" class="fa fa-heart active" aria-hidden="true"></i>
                            @else
                            <i data-id='{{$movie->id}}' type="oneseriesdocumentals" class="fa fa-heart" aria-hidden="true"></i>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>
    @endif
    <!-- movie-area-end -->

</main>
@endsection
