@extends('admin.back')
@section('page_title', 'search movie')
@section('content')
<div class="">

    <section class="content">
        <div class="container-fluid">
            @if(session()->has('errornotfound'))
            <div class="alert alert-alert">
                {{ session('errornotfound') }}
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <form method="get" action="{{route('admin.headersliders.searchresult')}}">
                        @csrf
                        <div class="pt-4 ps-4 form-group">
                            <label for="exampleInputPassword1">Adı daxil et</label>
                            <input name="search" type="search" class="form-control" name="" id="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipi:</label>
                            <select name="type" id="" class="form-control">
                                <option value="movies">Filmlər</option>
                                <option value="series">Seriallar</option>
                                <option value="documentals">Sənədli filmlər</option>
                                <option value="oneseriesdocumentals">Bir bölümlük sənədli filmlər</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">axtar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
