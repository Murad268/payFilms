@extends('admin.back')
@section('page_title', 'seasons')
@section('content')
<style>
    #example2 {
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
                                <a href="{{route('admin.seasons.create.new', $serie_id)}}" class="btn btn-primary">yeni sezon əlavə et</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if($seasons->count() > 0)
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Season Name</th>
                                        <th>Season Slug</th>
                                        <th>Season Episodes</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($seasons as $season)
                                    <tr>
                                        <td>{{ $season->id }}</td>
                                        <td>{{ $season->getTranslation('season_name', app()->getLocale()) }}</td>
                                        <td>{{ $season->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td>
                                            <a href="{{route('admin.seasons.episodes.index', ['id' => $season->id,'serie_id' => $serie_id])}}" style="width: max-content" class="mt-2 btn btn-primary">epizodları gör</a>
                                        </td>
                                        <td>
                                            <form style="display: flex; align-items: center; column-gap: 5px" onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.seasons.destroy', $season->id)}}">
                                                <a href="{{route('admin.seasons.edit', $season->id)}}" class="btn btn-warning text-light">Sezonu dəyiş</a>
                                                @csrf
                                                <input class="btn btn-danger" value="sil" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $seasons->links() }}
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
