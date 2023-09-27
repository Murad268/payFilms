@extends('admin.back')
@section('page_title', 'search results')
@section('content')
<div class="">


    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif

                        </div>
                        <div class="card-body">
                            @if($moviesResults->count() > 0)
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Adı</th>
                                        <th>Slug</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($moviesResults as $result)
                                    <tr>
                                        <td>{{$result->id}}</td>
                                        <td>{{$result->name}}</td>
                                        <td>{{$result->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.headersliders.headerslideradd', ['id'=>$result->id, 'type' => $type])}}" class="btn btn-success">seçim edin</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $moviesResults->links() }}
                            </div>
                        </div>
                        @else
                        <div class="not-found">Data Not Found</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
