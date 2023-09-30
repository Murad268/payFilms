<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminphotos\AdminPagesPhotosCreateRequest;
use App\Models\PagesPhotos;
use App\Services\DataServices;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;

class PagesPhotosController extends Controller
{
    public function __construct(private ImageService $imageService, private DataServices $dataServices)
    {
    }
    public function index()
    {
        $imgs = PagesPhotos::all();
        return view('admin.pagesPhotos.index', compact('imgs'));
    }


    public function edit($id)
    {
        $img = PagesPhotos::findOrFail($id);
        return view('admin.pagesPhotos.edit', compact('img'));
    }

    public function update(AdminPagesPhotosCreateRequest $request, $id)
    {
        $img = PagesPhotos::findOrFail($id);
        $result = $this->imageService->updateImage($request, 'assets/front/images/', 'img', $img->img);
        $data = $request->all();
        $data['img'] = $result;
        $this->dataServices->save($img, $data, 'update');
        return redirect()->route('admin.pages_photos.index');
    }
}
