@extends('admin.back')
@section('page_title', 'settings eit')
@section('content')
<div class="">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.settings.update', $setting->id)}}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Icon</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="icon" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="logo" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>

                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label>Sayt başlığı {{$lang}} dilində</label>
                                <input name="title[{{ $lang }}]" value="{{ old('title.' . $lang, $setting->getTranslation('title', $lang)) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @endforeach
                            @error("title.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label>Sayt açıqlaması {{$lang}} dilində</label>
                                <input name="desc[{{ $lang }}]" value="{{ old('desc.' . $lang, $setting->getTranslation('desc', $lang)) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @endforeach
                            @error("desc.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label>Müəllif hüququ mətni {{$lang}} dilində</label>
                                <input name="copywrite[{{ $lang }}]" value="{{ old('copywrite.' . $lang, $setting->getTranslation('copywrite', $lang)) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @endforeach
                            @error("copywrite.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label>Açar sözləri {{$lang}} dilində</label>
                                <input name="keywords[{{ $lang }}]" value="{{ old('keywords.' . $lang, $setting->getTranslation('keywords', $lang)) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @endforeach
                            @error("keywords.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Telefon</label>
                                <input name="phone" value="{{ old('phone', $setting->phone) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @error("phone")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label>Facebook</label>
                                <input name="facebook" value="{{ old('facebook', $setting->facebook) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @error("facebook")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Instagram</label>
                                <input name="instagram" value="{{ old('instagram', $setting->instagram) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @error("instagram")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @error("linkedin")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Twitter</label>
                                <input name="twitter" value="{{ old('twitter', $setting->twitter) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>

                            @error("twitter")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tənzimləmələri yenilə</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
