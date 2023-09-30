@extends('admin.back')
@section('page_title', 'pages photos')
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
                            @if($imgs->count())
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Rəsim</th>
                                        <th>Səhifə</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($imgs as $img)
                                    <tr>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$img->img)}}"><img style="width: 90px; height: 50px" src="{{asset('assets/front/images/'.$img->img)}}" alt=""></a>
                                        </td>
                                        <td>
                                            {{$img->page}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.pages_photos.edit', $img->id)}}" class="btn btn-warning text-light">Filmi dəyiş</a>
                                        </td>
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
