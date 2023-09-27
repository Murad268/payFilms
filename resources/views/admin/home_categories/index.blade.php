@extends('admin.back')
@section('page_title', 'home categories')
@section('content')
<div class="">


    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h3 class="card-title">
                                <a href="{{route('admin.home-categories.create')}}" class="btn btn-primary">yeni kategoriya əlavə et</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            @if($categories->count() > 0)
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Katqoriya Adı</th>
                                        <th>Kategoriya Slug</th>
                                        <th>Kategoriya Statusu</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->getTranslation('cat_name', app()->getLocale()) }}</td>
                                        <td>{{ $category->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td> @if($category->status)
                                            <div class="btn btn-primary swalDefaultError">activ</div>
                                            @else
                                            <div class="btn btn-danger swalDefaultError">passiv</div>
                                            @endif
                                        </td>
                                        <td>
                                            <form style="display: flex; align-items: center; column-gap: 5px" onsubmit="return toHrefCat(event)" class="mt-2" method="post" action="{{route('admin.home-categories.destroy', $category->id)}}">
                                                <a href="{{route('admin.home-categories.edit', $category->id)}}" class="btn btn-warning text-light">Kategoriyanı dəyiş</a>
                                                @csrf
                                                @method("delete")
                                                <input class="btn btn-danger" value="sil" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $categories->links() }}
                            </div>
                        </div>
                        @else
                        <div class="not-found">Data Not Found</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection