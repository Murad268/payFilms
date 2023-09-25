@extends('admin.back')
@section('page_title', 'users')
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
                        <div class="card-body">
                            @if($users->count() > 0)
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Ad soy ad</th>
                                        <th>Email</th>
                                        <th>Telefon nömrəsi</th>
                                        <th>IP</th>
                                        <th>Avatar</th>
                                        <th>Blok Vəziyyəti</th>
                                        <th>Aktivasiya Statusu</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->ip}}</td>
                                        <td>
                                            <a href="{{asset('assets/front/img/avatar/'.$user->avatar)}}">
                                                <img style="width: 100px; height: 100px" src="{{asset('assets/front/img/avatar/'.$user->avatar)}}" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            @if($user->isBlocked == 0)
                                            <div class="btn btn-primary swalDefaultError">ban edilməyib</div>
                                            @else
                                            <div class="btn btn-danger swalDefaultError">ban edilib</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->activationStatus == 1)
                                            <div class="btn btn-primary swalDefaultError">Hesab aktiv edilib</div>
                                            @else
                                            <div class="btn btn-danger swalDefaultError">Hesab aktiv edilməyib</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($admin->status === 1)
                                            @if ($user->isBlocked == 0)
                                            <a href="{{ route('admin.ban', $user->id) }}" class="btn btn-danger">Ban et</a>
                                            @else
                                            <a href="{{ route('admin.ban', $user->id) }}" class="btn btn-success">Bandan çıxart</a>
                                            @endif
                                            @else
                                            <div style="font-size: 12px" class="alert alert-light text-dark">
                                                Sizin admin kontroll hüququnuz yoxdur
                                            </div>
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $users->links() }}
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