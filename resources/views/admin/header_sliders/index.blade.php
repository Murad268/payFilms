@extends('admin.back')
@section('page_title', 'home page sliders')
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
                                <a href="{{route('admin.headersliders.searchindex')}}" class="btn btn-primary">yeni slide əlavə et</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if(count($sliders) > 0)
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Adı</th>
                                        <th>Tipi</th>
                                        <th>Kategoriyası</th>

                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>{{$slider->name}}</td>
                                        <td>{{$slider->type}}</td>
                                        <td>{{$slider->movie_categories->name}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
