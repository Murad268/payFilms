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

    .serie_template__top {
        margin-top: 20px;
        display: flex;
        column-gap: 30px
    }

    label {
        margin-bottom: 0;
    }

    .serie_template__top div {
        display: flex;
        column-gap: 10px;
        align-items: center;
    }

    .serie_template__top select {
        width: 100px;
        height: 30px;
        background-color: #23252D;
        color: white;
    }

    .serie_template__content {
        margin-top: 40px;
    }

    .serie_template__content iframe {
        width: 100%;
        height: 700px;
    }
</style>

<main>

    <!-- movie-details-area -->
    <section class="movie-details-area" data-background="{{asset('assets/front/img/bg/movie_details_bg.jpg')}}">
        <div class="container">
            <a class="details_banner" href="">
                <img src="https://previews.123rf.com/images/avgust01/avgust011903/avgust01190300028/124429726-summer-sale-advertisement-banner-horizontal-banner-with-realistic-glass-bottle-with-message.jpg" alt="">
            </a>
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
                                <!-- <li class="quality">
                                    <span>{{$movie->quality}}</span>
                                </li> -->
                                <li class="category">
                                    <span>{{$movie->movie_categories->name}}</span>
                                </li>
                                <!-- <li class="release-time">
                                    <span><i class="far fa-calendar-alt"></i> {{$movie->release}}</span>
                                    <span><i class="far fa-clock"></i> {{$movie->length}} dəq</span>
                                </li> -->
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
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <div class="serie_template">
                                                    <form class="serie_template__top sezoned">
                                                        <div>
                                                            <label for="">Sezonlar və bölümlər</label>
                                                            <select class="season_movie" name="season" id="">
                                                                @foreach($serie_seasons as $season)
                                                                <optgroup label="{{$season->getTranslation('season_name', app()->getLocale())}}">
                                                                    @foreach($season->episodes as $episode)
                                                                    <option value="{{$episode->id}}">{{$episode->episode_order}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </form>

                                                    <div class="serie_template__content">
                                                        <iframe class="iframe_documents" width="560" height="315" src="{{$first_episode->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    </div>
                                                </div>
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








</main>
@endsection
