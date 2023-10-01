@extends('admin.back')
@section('page_title', 'advertaisment edit')
@section('content')

<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.advertaisment.update', $img->id)}}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Reklam banneri</label>
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
                            @if($img->banner != 'template')
                            <div style="margin-top: 20px;width: 100%; height: 120px" class="img">
                                <a target="_blank" href="{{ asset('assets/front/images/' . $img->banner) }}"><img style="width: 100%; height: 100%" src="{{ asset('assets/front/images/' . $img->{'banner'}) }}" alt="">
                                </a>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="exampleInputPassword1">Reklam linki</label>
                                <input name="link" value="{{ old('link', $img->link) }}" type="text" class="form-control" placeholder="Serialın uzunluğunu daxil edin">
                            </div>
                            @error("link")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="ml-4 mb-3 form-check">
                            <input {{old('status', $img->status) == 1?'checked':""}} value="1" name='status' type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">reklamın statusu</label>
                        </div>
                        @error('status')
                        <div class="alert alert-danger mt-2" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="ml-4 card-footer">
                            <button type="submit" class="btn btn-primary">Reklamı yenilə</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
