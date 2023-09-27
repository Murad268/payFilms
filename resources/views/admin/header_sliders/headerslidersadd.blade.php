@extends('admin.back')
@section('page_title', 'slide add')
@section('content')

<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.headersliders.headersliderstore', ['id' => $id, 'type'=>$type])}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Şəkil 400px ekran üçün</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="img1" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error("img1")
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Şəkil 768px ekran üçün</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="img2" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error("img2")
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Şəkil 1024px ekran üçün</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="img3" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error("img3")
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Şəkil 1368px ekran üçün</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="img4" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error("img4")
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Default şəkil</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="default_img" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error("default_img")
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @error("poster")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Slideni əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
