<!-- main-area -->
@extends('front.front')

@section('content')

<style>
    .play_film {
        cursor: pointer;
    }

    .video__overlay,
    .movie__overlay {
        position: fixed;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.6);
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 100;
        visibility: hidden;
        opacity: 0;
        transition: 0.4s;
    }

    .video__overlay.active,
    .movie__overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .video__overlay iframe,
    .movie__overlay iframe {
        width: 800px;
        height: 400px;
    }

    .close {
        font-size: 35px;
        position: absolute;
        top: 15px;
        right: 15px;
        color: red;
        cursor: pointer;
    }
</style>

<main>

    <!-- movie-details-area -->
    <section class="movie-details-area" data-background="{{asset('assets/front/img/bg/movie_details_bg.jpg')}}">
        <div class="container">
            
            <div class="row align-items-center position-relative">
                <div class="col-xl-3 col-lg-4">
                    <div class="movie-details-img">
                        <img src="{{asset('assets/front/images/'.$movie->poster)}}" alt="">
                        <a href="' . $result['video'] . '" class="popup-video"><img src="img/images/play_icon.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="movie-details-content">
                        <!-- <h5>New Episodes</h5> -->
                        <h2>{{ $movie->getTranslation('name', app()->getLocale()) }}</h2>
                        <div class="banner-meta">
                            <ul>
                                <li class="quality">
                                    <span>{{$movie->quality}}</span>
                                </li>
                                <li class="category">
                                    <span>{{$movie->movie_categories->name}}</span>
                                </li>
                                <li class="release-time">
                                    <span><i class="far fa-calendar-alt"></i> {{$movie->release}}</span>
                                    <span><i class="far fa-clock"></i> {{$movie->length}} dəq</span>
                                </li>
                            </ul>
                        </div>
                        <p>{!! $movie->desc !!}</p>
                        <div class="movie-details-prime">
                            <ul>
                                <li class="streaming">
                                    <h6>Treyleri izlə</h6>
                                    <span>Yüksək keyfiyyət</span>
                                </li>
                                <li class="watch"><a class="btn popup-video"><i class="fas fa-play"></i> Trailer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>'
            </div>
        </div>
    </section>
    <!-- movie-details-area-end -->

    <section class="episode-area episode-bg" data-background="{{asset('assets/front/img/bg/episode_bg.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="movie-episode-wrap">
                        <div class="episode-watch-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <!-- <span class="season">Season 1</span>
                                                    <span class="video-count">5 Full Episodes</span> -->
                                        </button>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li class="play_film"><a><i class="fas fa-play"></i>{{ $movie->getTranslation('name', app()->getLocale()) }}</a> <span class="duration"><i class="far fa-clock"></i> {{$movie->length}} dəq</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="video__overlay">
        <i class="fa fa-window-close close" aria-hidden="true"></i>
        <iframe width="560" height="315" src="{{$movie->ytrailer}}" frameborder="0" allow="autoplay" allowfullscreen></iframe>
    </div>


    <div class="movie__overlay">
        <i class="fa fa-window-close close" aria-hidden="true"></i>
        <iframe width="560" height="315" src="{{$movie->link}}" frameborder="0" allow="autoplay" allowfullscreen></iframe>
    </div>




</main>
@endsection
