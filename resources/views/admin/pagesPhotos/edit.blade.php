@extends('admin.back')
@section('page_title', 'page photos edit')
@section('content')

<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.pages_photos.update', $img->id)}}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Səhvə photosu</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="img" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error("img")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Şəkilləri yenilə</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
