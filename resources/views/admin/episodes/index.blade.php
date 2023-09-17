@extends('admin.back')
@section('page_title', 'seasons')
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
                                <a href="{{route('admin.seasons.episodes.create', ['id' => $id,'serie_id' => $serie_id])}}" class="btn btn-primary">yeni epizod əlavə et</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if($episodes->count() > 0)
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Epizodun Adı</th>
                                        <th>Epizodun Order</th>
                                        <th>Epizodun Slugu</th>
                                        <th>Epizodun Linki</th>
                                        <th>Epizodun Keyfiyyəti</th>
                                        <th>Epizodun Müddəti</th>
                                        <th>Epizodun Çıxış Tarixi</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($episodes as $episode)
                                    <tr>
                                        <td>{{ $episode->id }}</td>
                                        <td>{{ $episode->getTranslation('episode_name', app()->getLocale()) }}</td>
                                        <th>{{$episode->episode_order}}</th>
                                        <td>{{ $episode->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td>
                                            {{$episode->link}}
                                        </td>
                                        <td>
                                            {{$episode->quality}}
                                        </td>
                                        <td>
                                            {{$episode->length}}
                                        </td>
                                        <td>
                                            {{$episode->release}}
                                        </td>
                                        <td>
                                            <form style="display: flex; align-items: center; column-gap: 5px" onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="">
                                                <a href="{{route('admin.seasons.episodes.edit', ['id' => $episode->id,'serie_id' => $serie_id])}}" class="btn btn-warning text-light">Epizodu dəyiş</a>
                                                @csrf
                                                <input class="btn btn-danger" value="delete" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $episodes->links() }}
                            </div>
                            @else
                            <div class="not-found">Data Not Found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
