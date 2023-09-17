@extends('admin.back')
@section('page_title', 'movies')
@section('content')
<style>
    .card-body {
        overflow-x: scroll;
    }

    #example2 {
        width: max-content;
    }

    td,
    th,
    tr {
        width: max-content;
    }
</style>
<div class="">
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.movies.create')}}" class="btn btn-primary">yeni film əlavə et</a>
                            </h3>

                        </div>
                        <div class="card-body">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            @if($movies->count())
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Filmin Adı</th>
                                        <th>Film Slug</th>
                                        <th>Filmin Posteri</th>
                                        <th>Filmin Banneri</th>
                                        <th>Filmin Müddəti</th>
                                        <th>Filmin Linki</th>
                                        <th>Filmin Youtube Traileri</th>
                                        <th>Filmin Video Keyfiyyəti</th>
                                        <th>Filmin Aktyorları</th>
                                        <th>Filmin Sseanristləri</th>
                                        <th>Filmin Rejissoru(ları)</th>
                                        <th>Filmin Ölkəsi(ləri)</th>
                                        <th>Filmin Keteqoriyası</th>

                                        <th>Filmin Ana Səhifə Keteqoriyası</th>
                                        <th>Filmin Çıxış Tarixi</th>
                                        <th>Filmin Açıqlaması</th>
                                        <th>Filmin Statusu</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($movies as $movie)
                                    <tr>
                                        <td>{{$movie->id}}</td>
                                        <td>{{ $movie->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $movie->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$movie->poster)}}"><img style="width: 60px; height: 80px" src="{{asset('assets/front/images/'.$movie->poster)}}" alt=""></a>
                                        </td>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$movie->banner)}}"><img style="width: 90px; height: 50px" src="{{asset('assets/front/images/'.$movie->banner)}}" alt=""></a>
                                        </td>
                                        <td>{{ $movie->length}}</td>
                                        <td>{{ $movie->link }}</td>
                                        <td>{{$movie->ytrailer}}</td>
                                        <td>{{$movie->quality}}</td>
                                        <td>{{ $movie->getTranslation('actors', app()->getLocale()) }}</td>
                                        <td>{{ $movie->getTranslation('scriptwriters', app()->getLocale()) }}</td>
                                        <td>{{ $movie->getTranslation('directors', app()->getLocale()) }}</td>
                                        <td>{{ $movie->getTranslation('countries', app()->getLocale()) }}</td>
                                        <td>{{ $movie->movie_categories->name }}</td>
                                        <td>{{ $movie->movie_home_categories->cat_name }}</td>
                                        <td>{{$movie->release}}</td>
                                        <td>{!! $movie->getTranslation('desc', app()->getLocale()) !!}</td>
                                        <td>
                                            @if($movie->status)
                                            <div class="btn btn-primary swalDefaultError">activ</div>
                                            @else
                                            <div class="btn btn-danger swalDefaultError">passiv</div>
                                            @endif
                                        </td>
                                        <td>
                                            <form style="display: flex; align-items: center; column-gap: 5px" onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.movies.destroy', $movie->id)}}">
                                                <a href="{{route('admin.movies.edit', $movie->id)}}" class="btn btn-warning text-light">Filmi dəyiş</a>
                                                @csrf
                                                @method("delete")
                                                <input class="btn btn-danger" value="sil" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="not-found">Data Not Found</div>
                            @endif
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $movies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
