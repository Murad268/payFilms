@extends('admin.back')
@section('page_title', 'series')
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
                                <a href="{{route('admin.series.create')}}" class="btn btn-primary">yeni serial əlavə et</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if($series->count())
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Serialın Adı</th>
                                        <th>Serial Slug</th>
                                        <th>Serialın Posteri</th>
                                        <th>Serialın Banneri</th>
                                        <th>Serialın Youtube Traileri</th>
                                        <th>Serialın Aktyorları</th>
                                        <th>Serialın Ssenarstləri</th>
                                        <th>Serialın Rejissoru(ları)</th>
                                        <th>Serialın Ölkəsi(ləri)</th>
                                        <th>Serialın Kategoriyası</th>
                                        <th>Serialın Ana Səhifə Katqoriyası</th>
                                        <th>Serialın Çıxış Tarixi</th>
                                        <th>Serialın Açıqlaması</th>
                                        <th>Sezonların Sayı</th>
                                        <th>Serialın Statusu</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($series as $serie)
                                    <tr>
                                        <td>{{$serie->id}}</td>
                                        <td>{{ $serie->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $serie->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$serie->poster)}}"><img style="width: 60px; height: 80px" src="{{asset('assets/front/images/'.$serie->poster)}}" alt=""></a>
                                        </td>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$serie->banner)}}"><img style="width: 90px; height: 50px" src="{{asset('assets/front/images/'.$serie->banner)}}" alt=""></a>
                                        </td>
                                        <td>{{$serie->ytrailer}}</td>
                                        <td>{{ $serie->getTranslation('actors', app()->getLocale()) }}</td>
                                        <td>{{ $serie->getTranslation('scriptwriters', app()->getLocale()) }}</td>
                                        <td>{{ $serie->getTranslation('directors', app()->getLocale()) }}</td>
                                        <td>{{ $serie->getTranslation('countries', app()->getLocale()) }}</td>
                                        <td>{{ $serie->movie_categories->name }}</td>
                                        <td>{{ $serie->movie_home_categories->cat_name }}</td>
                                        <td>{{$serie->release}}</td>
                                        <td>{!! $serie->getTranslation('desc', app()->getLocale()) !!}</td>
                                        <td style="display: flex; align-items: center; column-gap: 5px">
                                            <div style="font-size: 20px;" class="text-primary">{{$serie->serie_seasons()->count()}}</div>
                                            <a href="{{route('admin.seasons.index', $serie->id)}}" style="width: max-content" class="mt-2 btn btn-primary">sezonları gör</a>
                                        </td>
                                        <td>
                                            @if($serie->status)
                                            <div class="btn btn-primary swalDefaultError">activ</div>
                                            @else
                                            <div class="btn btn-danger swalDefaultError">passiv</div>
                                            @endif
                                        </td>
                                        <td>
                                            <form style="display: flex; align-items: center; column-gap: 5px" onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.series.destroy', $serie->id)}}">
                                                <a href="{{route('admin.series.edit', $serie->id)}}" class="btn btn-warning text-light">Serialı dəyiş</a>
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
                                {{ $series->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
