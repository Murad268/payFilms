@extends('admin.back')
@section('page_title', 'movie add')
@section('content')

<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.movies.store')}}">
                        @csrf
                        <div class="card-body">
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Film adı {{$lang}} dilində</label>
                                <input name="name[{{ $lang }}]" value="{{ old('name.' . $lang) }}" type="text" class="form-control" placeholder="Filmin adını daxil edin">
                            </div>
                            @error("name.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Aktyorlar {{$lang}} dilində</label>
                                <input name="actors[{{ $lang }}]" value="{{ old('actors.' . $lang) }}" type="text" class="form-control" placeholder="Aktyorların adını daxil edin">
                            </div>
                            @error("actors.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Rejissroların adı {{$lang}} dilində</label>
                                <input name="directors[{{ $lang }}]" value="{{ old('directors.' . $lang) }}" type="text" class="form-control" placeholder="Rejissroların adını daxil edin">
                            </div>
                            @error("directors.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ssenaristlərin adı {{$lang}} dilində</label>
                                <input name="scriptwriters[{{ $lang }}]" value="{{ old('scriptwriters.' . $lang) }}" type="text" class="form-control" placeholder="Ssenaristləri daxil edin">
                            </div>
                            @error("scriptwriters.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach


                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ölkələrin adı {{$lang}} dilində</label>
                                <input name="countries[{{ $lang }}]" value="{{ old('countries.' . $lang) }}" type="text" class="form-control" placeholder="Ölkələrin adını daxil edin">
                            </div>
                            @error("countries.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach

                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Film slug {{$lang}} dilində</label>
                                <input name="slug[{{ $lang }}]" value="{{ old('slug.' . $lang) }}" type="text" class="form-control" placeholder="Filmin adını daxil edin">
                            </div>
                            @error("slug.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach

                            <div class="form-group">
                                <label for="exampleInputFile">Filmin Posteri</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="poster" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error("poster")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputFile">Filmin Banneri</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="banner" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error("banner")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin müddəti (min):</label>
                                <input name="length" value="{{ old('length') }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("length")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin Linki:</label>
                                <input name="link" value="{{ old('link') }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("link")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin Youtube Trailer Linki:</label>
                                <input name="ytrailer" value="{{ old('ytrailer') }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("ytrailer")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin keyfiyyəti:</label>
                                <select name="quality" id="" class="form-control">
                                    <option value="HD" {{ old('quality') === 'HD' ? 'selected' : '' }}>HD</option>
                                    <option value="4k" {{ old('quality') === '4k' ? 'selected' : '' }}>4k</option>
                                </select>
                            </div>
                            @error("quality")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin kateqoriyası:</label>
                                <select name="movie_category_id" id="" class="form-control category-movie">
                                    @foreach($categories as $category)
                                    <option {{old('movie_category_id') == $category->id?'selected':""}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("movie_category_id")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin ana səhifə kateqoriyası:</label>
                                <select name="movie_home_category_id" id="" class="form-control">
                                    @foreach($homeCategories as $homeCategory)
                                    <option {{old('movie_home_category_id') == $homeCategory->id?'selected':""}} value="{{$homeCategory->id}}">{{$homeCategory->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("home__categories")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin çıxış tarixi:</label>
                                <input value="{{old('release')}}" type="date" name="release" class="form-control" id="">
                            </div>
                            @error("release")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin Açıqlaması {{$lang}} dilində:</label>
                                <textarea name="desc[{{ $lang }}]" style="height: 500px;" id="editor">{{ old('desc.' . $lang) }}</textarea>
                            </div>
                            @endforeach

                            @error("desc.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            @error('status')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Filmi əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
