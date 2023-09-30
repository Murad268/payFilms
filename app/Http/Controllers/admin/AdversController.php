<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\advers\CreateAdversRequest;
use App\Models\Adver;
use App\Services\DataServices;
use App\Services\ImageService;
use Illuminate\Http\Request;

class AdversController extends Controller
{
    public function __construct(private ImageService $imageService, private DataServices $dataServices)
    {
    }
    public function index()
    {
        $imgs = Adver::all();
        return view('admin.advers.index', compact('imgs'));
    }


    public function edit($id)
    {
        $img = Adver::findOrFail($id);
        return view('admin.advers.edit', compact('img'));
    }


    public function update(CreateAdversRequest $request, $id)
    {
        $img = Adver::findOrFail($id);
        $result = $this->imageService->updateImage($request, 'assets/front/images/', 'banner', $img->banner);
        $data = $request->all();
        if (isset($data['status'])) {
            $data['status'] = (bool) $data['status'];
        } else {
            $data['status'] = 0;
        }
        $data['banner'] = $result;
        $this->dataServices->save($img, $data, 'update');
        return redirect()->route('admin.advertaisment.index');
    }
}
