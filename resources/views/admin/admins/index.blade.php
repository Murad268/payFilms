@extends('admin.back')
@section('page_title', 'admins')
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
                            @if($admin->status === 1)
                            <a href="{{route('admin.admins.create')}}" class="btn btn-primary">yeni admin əlavə et</a>
                            @endif
                        </div>
                        <div class="card-body">
                            @if($admins->count() > 0)
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Adminin Adı</th>
                                        <th>Adminin Soy Adı</th>
                                        <th>Adminin Logini</th>
                                        <th>Adminin Statusu</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->surname}}</td>
                                        <td>{{$admin->login}}</td>
                                        <td>{{$admin->status}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>
                                            <form style="display: flex; align-items: center; column-gap: 5px" onsubmit="return toHrefCat(event)" class="mt-2" method="post" action="{{route('admin.admins.destroy', $admin->id)}}">
                                                <a href="{{route('admin.admins.edit', $admin->id)}}" class="btn btn-warning text-light">Yenilə</a>
                                                @csrf
                                                @method("delete")
                                                <input class="btn btn-danger" value="sil" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $admins->links() }}
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
