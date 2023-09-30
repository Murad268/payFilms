@extends('admin.back')
@section('page_title', 'episode edit')
@section('content')
<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('admin.seasons.episodes.update',  ['id' => $id,'serie_id' => $serie_id])}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun nömrəsi</label>
                                <input name="episode_order" value="{{ old('episode_order', $episode->episode_order) }}" type="text" class="form-control" placeholder="Epizodun nömrəsini adını daxil edin">
                            </div>
                            @error("episode_order")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun adı {{$lang}} dilində</label>
                                <input name="episode_name[{{ $lang }}]" value="{{ old('episode_name.' . $lang, $episode->getTranslation('episode_name', $lang)) }}" type="text" class="form-control" placeholder="Epizodun adını daxil edin">
                            </div>
                            @endforeach
                            @error("episode_name.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun slug {{$lang}} dilində</label>
                                <input name='slug[{{$lang}}]' value="{{ old('slug.' . $lang, $episode->getTranslation('slug', $lang)) }}" type="text" class="form-control" placeholder="Epizodun slug daxil edin">
                            </div>
                            @error("slug.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach

                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun linki:</label>
                                <input name="link" value="{{ old('link', $episode->link) }}" type="text" class="form-control" placeholder="Epizodun linkini daxil edin">
                            </div>
                            @error("link")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun keyfiyyəti:</label>


                                <select name="quality" id="" class="form-control">
                                    <option value="SD" {{ old('quality',$episode->quality) === 'SD' ? 'selected' : '' }}>SD (Standard Definition)</option>
                                    <option value="HD" {{ old('quality',$episode->quality) === 'HD' ? 'selected' : '' }}>HD (High Definition)</option>
                                    <option value="4K" {{ old('quality',$episode->quality) === '4K' ? 'selected' : '' }}>Ultra HD (UHD) or 4K</option>
                                    <option value="8K" {{ old('quality',$episode->quality) === '8k' ? 'selected' : '' }}>8K</option>
                                    <option value="HDR" {{ old('quality',$episode->quality) === 'HDR' ? 'selected' : '' }}>HDR (High Dynamic Range)</option>
                                    <option value="2K" {{ old('quality',$episode->quality) === '2K' ? 'selected' : '' }}>2K (Digital Cinema Resolution):</option>
                                    <option value="3D" {{ old('quality',$episode->quality) === '3D' ? 'selected' : '' }}>3D</option>
                                    <option value="360-Degree Video" {{ old('quality') === '360-Degree Video' ? 'selected' : '' }}>360-Degree Video</option>
                                </select>
                            </div>
                            @error("quality")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun müddəti (min):</label>
                                <input name="length" value="{{ old('length', $episode->length) }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("length")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Filmin çıxış tarixi:</label>
                                <input value="{{old('release', $episode->release)}}" type="date" name="release" class="form-control" id="">
                            </div>
                            @error("release")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Epizodu yenilə</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
