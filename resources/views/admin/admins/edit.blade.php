@extends('admin.back')
@section('page_title', 'admin edit')
@section('content')
<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('admin.admins.update', $admin->id)}}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            @if(session()->has('message'))
                            <div class="alert alert-warning text-light">
                                {{ session('message') }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ad</label>
                                <input name="name" value="{{ old('name', $admin->name) }}" type="text" class="form-control" placeholder="Adminin adını daxil edin">
                            </div>
                            @error("name")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Soy Ad</label>
                                <input name="surname" value="{{ old('surname', $admin->surname) }}" type="text" class="form-control" placeholder="Adminin soy adını daxil edin">
                            </div>
                            @error("surname")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Login</label>
                                <input name="login" value="{{ old('login', $admin->login) }}" type="text" class="form-control" placeholder="Adminin loginini daxil edin">
                            </div>
                            @error("login")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input name="password" value="{{ old('password', '') }}" type="password" class="form-control" placeholder="Adminin şifrəsini daxil edin">
                            </div>
                            @error("password")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Adminin statusu:</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('status') === '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('status') === '3' ? 'selected' : '' }}>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Admini yenilə</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
