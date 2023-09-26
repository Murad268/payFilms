@extends('admin.back')
@section('page_title', 'one serie documentals edit')
@section('content')

<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.oneseriedocumentals.update', $movie->id)}}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Film adı {{$lang}} dilində</label>
                                <input name="name[{{ $lang }}]" value="{{ old('name.' . $lang, $movie->getTranslation('name', $lang)) }}" type="text" class="form-control" placeholder="Filmin adını daxil edin">
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
                                <input name="actors[{{ $lang }}]" value="{{ old('actors.' . $lang, $movie->getTranslation('actors', $lang)) }}" type="text" class="form-control" placeholder="Aktyorların adını daxil edin">
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
                                <input name="directors[{{ $lang }}]" value="{{ old('directors.' . $lang, $movie->getTranslation('directors', $lang)) }}" type="text" class="form-control" placeholder="Rejissroların adını daxil edin">
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
                                <input name="scriptwriters[{{ $lang }}]" value="{{ old('scriptwriters.' . $lang, $movie->getTranslation('scriptwriters', $lang)) }}" type="text" class="form-control" placeholder="Ssenaristləri daxil edin">
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
                                <input name="countries[{{ $lang }}]" value="{{ old('countries.' . $lang, $movie->getTranslation('countries', $lang)) }}" type="text" class="form-control" placeholder="Ölkələrin adını daxil edin">
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
                                <input name="slug[{{ $lang }}]" value="{{ old('slug.' . $lang, $movie->getTranslation('slug', $lang)) }}" type="text" class="form-control" placeholder="Filmin adını daxil edin">
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
                                <input name="length" value="{{ old('length', $movie->length) }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("length")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin Linki:</label>
                                <input name="link" value="{{ old('link', $movie->link) }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("link")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin Youtube Trailer Linki:</label>
                                <input name="ytrailer" value="{{ old('ytrailer', $movie->ytrailer) }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("ytrailer")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin keyfiyyəti:</label>
                                <select name="quality" id="quality" class="form-control">
                                    <option value="HD" {{ old('quality', $movie->quality) === 'HD' ? 'selected' : '' }}>HD</option>
                                    <option value="HD" {{ old('quality', $movie->quality) === '4k' ? 'selected' : '' }}>4k</option>
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
                                    <option {{old('movie_home_category_id', $homeCategory->id) == $homeCategory->id?'selected':""}} value="{{$homeCategory->id}}">{{$homeCategory->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("home__categories")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror




                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin Çıxış tarixi:</label>
                                <input value="{{old('release', $movie->release)}}" type="date" name="release" class="form-control" id="">
                            </div>
                            @error("release")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin açıqlaması {{$lang}} dilində:</label>
                                <textarea name="desc[{{ $lang }}]" style="height: 500px;" id="editor">{{ old('desc.' . $lang, $movie->getTranslation('desc', app()->getLocale()) ) }}</textarea>
                            </div>
                            @endforeach

                            @error("desc.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-check">
                                <input {{old('status', $movie->status) == 1?'checked':""}} value="1" name='status' type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">filmin statusu</label>
                            </div>
                            @error('status')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Filmi yenilə</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
