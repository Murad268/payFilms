@extends('admin.back')
@section('page_title', 'settings edit')
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
                                <input name="title[{{ $lang }}]" value="{{ old('title.' . $lang, $setting->getTranslation('title', $lang)) }}" type="text" class="form-control" placeholder="Sayt başlığnı daxil edin">
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
                                <input name="desc[{{ $lang }}]" value="{{ old('desc.' . $lang, $setting->getTranslation('desc', $lang)) }}" type="text" class="form-control" placeholder="Sayt açıqlamasını">
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
                                <input name="copywrite[{{ $lang }}]" value="{{ old('copywrite.' . $lang, $setting->getTranslation('copywrite', $lang)) }}" type="text" class="form-control" placeholder="Müəllif hüququ mətnini axil edin">
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
                                <input name="keywords[{{ $lang }}]" value="{{ old('keywords.' . $lang, $setting->getTranslation('keywords', $lang)) }}" type="text" class="form-control" placeholder="Açar sözləri daxil edin">
                            </div>
                            @endforeach
                            @error("keywords.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Telefon</label>
                                <input name="phone" value="{{ old('phone', $setting->phone) }}" type="text" class="form-control" placeholder="Telefon nömrəsi">
                            </div>
                            @error("phone")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="{{ old('email', $setting->email) }}" type="text" class="form-control" placeholder="Emaili daxil edin">
                            </div>
                            @error("email")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label>Ünvan {{$lang}} dilində</label>
                                <input name="address[{{ $lang }}]" value="{{ old('address.' . $lang, $setting->getTranslation('address', $lang)) }}" type="text" class="form-control" placeholder="Ünvanı daxil edin">
                            </div>
                            @endforeach
                            @error("address.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Facebook</label>
                                <input name="facebook" value="{{ old('facebook', $setting->facebook) }}" type="text" class="form-control" placeholder="Facebook linkini daxil edin">
                            </div>
                            @error("facebook")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Instagram</label>
                                <input name="instagram" value="{{ old('instagram', $setting->instagram) }}" type="text" class="form-control" placeholder="İnstagram linkini daxil edin">
                            </div>
                            @error("instagram")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}" type="text" class="form-control" placeholder="Linkedin linkini daxil edin">
                            </div>
                            @error("linkedin")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Twitter</label>
                                <input name="twitter" value="{{ old('twitter', $setting->twitter) }}" type="text" class="form-control" placeholder="Twitter linkini daxil edin">
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
