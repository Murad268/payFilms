@extends('admin.back')
@section('page_title', 'advertaisment')
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
                                        <th>Yerləşmə nöqtəsi</th>
                                        <th>Link</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($imgs as $img)
                                    <tr>
                                        <td> <a target="_blank" href="{{ asset('assets/front/images/' . $img->banner) }}"><img style="width: 160px; height: 50px" src="{{ asset('assets/front/images/' . $img->banner) }}" alt=""></a>
                                        </td>
                                        <td>
                                            {{$img->place}}
                                        </td>
                                        <td>
                                            {{$img->link}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.advertaisment.edit', $img->id)}}" class="btn btn-warning text-light">Filmi dəyiş</a>
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
