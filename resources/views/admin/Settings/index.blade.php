@extends('admin.back')
@section('page_title', 'settings')
@section('content')
<style>
.content {
    width: max-content;
}
</style>
<div style="width:100%; overflow: scroll;" class="">
    <section class="content mt-3">
        @if(session()->has('message'))
        <div class="ml-2 alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-container">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Logo</th>
                                            <th>Başlıq</th>
                                            <th>Telefon</th>
                                            <th>Açıqlama</th>
                                            <th>Copywrite</th>
                                            <th>Facebook</th>
                                            <th>İnstagram</th>
                                            <th>Linkedin</th>
                                            <th>Twitter</th>
                                            <th>Açar Sözləri</th>
                                            <th>Controlls</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($settings as $setting)
                                        <tr>
                                            <td>
                                                <a target="_blank" href="{{asset('assets/front/icons/'.$setting->icon)}}"><img style="width: 50px; height: 50px" src="{{asset('assets/front/icons/'.$setting->icon)}}" alt=""></a>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{asset('assets/front/icons/'.$setting->logo)}}"><img style="width: 50px; height: 50px" src="{{asset('assets/front/icons/'.$setting->logo)}}" alt=""></a>
                                            </td>
                                            <td>{{ $setting->getTranslation('title', app()->getLocale()) }}</td>
                                            <td>{{$setting->phone}}</td>
                                            <td>{{ $setting->getTranslation('desc', app()->getLocale()) }}</td>
                                            <td>{{ $setting->getTranslation('copywrite', app()->getLocale()) }}</td>
                                            <td>{{$setting->facebook}}</td>
                                            <td>{{$setting->instagram}}</td>
                                            <td>{{$setting->linkedin}}</td>
                                            <td>{{$setting->twitter}}</td>
                                            <td>{{ $setting->getTranslation('keywords', app()->getLocale()) }}</td>
                                            <td>
                                                <a href="{{route('admin.settings.edit', $setting->id)}}" class="btn btn-warning text-light">dəyişiklik et</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-scroll">
                                <!-- Boş bir div, yatay kaydırma çubuğunu görüntülemek için -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
