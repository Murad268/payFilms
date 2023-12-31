<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\headersliders\HeaderSliderRequest;
use App\Http\Requests\headersliders\HeaderSlidersUpdate;
use App\Models\Documentals;
use App\Models\HeaderSlider;
use App\Models\Movies;
use App\Models\OneSerieDocumentals;
use App\Models\Series;
use App\Services\DataServices;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;

class HeaderSlidersController extends Controller
{
    public function __construct(private ImageService $imageService, private DataServices $dataServices)
    {
    }

    public function headersliderstore(HeaderSliderRequest $request, $id, $type)
    {

        $logo = $this->imageService->downloadImage($request, 'assets/front/images/', 'logo', 'notfound.png');
        $result1 = $this->imageService->downloadImage($request, 'assets/front/images/', 'img1', 'notfound.png');
        $result2 = $this->imageService->downloadImage($request, 'assets/front/images/', 'img2', 'notfound.png');
        $result3 = $this->imageService->downloadImage($request, 'assets/front/images/', 'img3', 'notfound.png');
        $result4 = $this->imageService->downloadImage($request, 'assets/front/images/', 'img4', 'notfound.png');
        $result5 = $this->imageService->downloadImage($request, 'assets/front/images/', 'default_img', 'notfound.png');

        $data['max-width: 400px'] = $result1;
        $data['max-width: 768px'] = $result2;
        $data['max-width: 1024px'] = $result3;
        $data['max-width: 1368px'] = $result4;
        $data['logo'] = $logo;

        $data['default_img'] = $result5;
        if ($type == 'movies') {
            $data['movie_id'] = $id;
        } else if ($type == 'series') {
            $data['serie_id'] = $id;
        } else if ($type == 'documentals') {
            $data['documental_id'] = $id;
        } else if ($type == 'oneseriesdocumentals') {
            $data['oneseriedocumentals_id'] = $id;
        }
        $slider = new HeaderSlider();
        $this->dataServices->save($slider, $data, 'create');
        return redirect()->route('admin.headersliders.index')->with('message', 'slide uğurla əlavə edildi');
    }

    public function index()
    {
        // Sliderları məlumat bazasından əldə et
        $seriesSliders = HeaderSlider::where('serie_id', '!=', null)->get();
        $movieSliders = HeaderSlider::where('movie_id', '!=', null)->get();
        $documentalSliders = HeaderSlider::where('documental_id', '!=', null)->get();
        $oneserieDocumentalsSliders = HeaderSlider::where('oneseriedocumentals_id', '!=', null)->get();
        $sliders = [];
        // Seriyalara aid sliderlar
        if (count($seriesSliders) > 0) {

            foreach ($seriesSliders as $seriesSlider) {

                $series = Series::find($seriesSlider->serie_id);
                if ($series) {
                    $series->type = "serial";
                    $series->slider_id = $seriesSlider->id; // Sliderın id-sini əlavə edirik
                    $sliders[] = $series;
                }
            }
        }

        // Filmlərə aid sliderlar
        if (count($movieSliders) > 0) {
            foreach ($movieSliders as $movieSlider) {

                $movie = Movies::find($movieSlider->movie_id);
                if ($movie) {
                    $movie->type = "film";
                    $movie->slider_id = $movieSlider->id; // Sliderın id-sini əlavə edirik
                    $sliders[] = $movie;
                }
            }
        }

        // Sənədli filmlərə aid sliderlar
        if (count($documentalSliders) > 0) {
            foreach ($documentalSliders as $documentalSlider) {
                $documental = Documentals::find($documentalSlider->documental_id);
                if ($documental) {
                    $documental->type = "sənədli film";
                    $documental->slider_id = $documentalSlider->id; // Sliderın id-sini əlavə edirik
                    $sliders[] = $documental;
                }
            }
        }

        // Bir bölümlük sənədli filmlərə aid sliderlar
        if (count($oneserieDocumentalsSliders) > 0) {
            foreach ($oneserieDocumentalsSliders as $oneserieDocumentalSlider) {
                $documental = OneSerieDocumentals::find($oneserieDocumentalSlider->oneseriedocumentals_id);
                if ($documental) {
                    $documental->type = "bir bölümlük sənədli film";
                    $documental->slider_id = $oneserieDocumentalSlider->id; // Sliderın id-sini əlavə edirik
                    $sliders[] = $documental;
                }
            }
        }



        return view('admin.header_sliders.index', compact('sliders'));
    }



    public function searchindex()
    {
        return view('admin.header_sliders.searchindex');
    }


    public function search(Request $request)
    {
        $type = $request->input('type');
        $search = $request->input('search');

        if ($type == 'movies') {
            $moviesResults = Movies::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($search) . '%'])->where('status', 1)->paginate(10);
        } else if ($type == 'series') {
            $moviesResults = Series::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($search) . '%'])->where('status', 1)->paginate(10);
        } else if ($type == 'documentals') {
            $moviesResults = Documentals::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($search) . '%'])->where('status', 1)->paginate(10);
        } else if ($type == "oneseriesdocumentals") {
            $moviesResults = OneSerieDocumentals::whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.' . app()->getLocale() . '"))) LIKE ?', ['%' . strtolower($search) . '%'])->where('status', 1)->paginate(10);
        }
        if ($moviesResults->count() < 1) {
            return redirect()->back()->with('errornotfound', "Axtarışa uyğun nəticə tapılmadı. Ya belə bir məlumat bazada yoxdur, ya da bu məlumatın bazadakı statusu aktiv deyil");
        }
        return view('admin.header_sliders.search', compact("moviesResults", 'type'));
    }



    public function headerslideradd($id, $type)
    {
        return view('admin.header_sliders.headerslidersadd', compact('id', 'type'));
    }





    public function changesliderimg($id)
    {
        $slider = HeaderSlider::findOrFail($id);

        return view('admin.header_sliders.editheadersliderphotos', compact('slider', 'id'));
    }


    public function changesliderimgupdate(HeaderSlidersUpdate $request, $id)
    {
        $slide = HeaderSlider::findOrFail($id);
       
        $logo = $this->imageService->updateImage($request, 'assets/front/images/', 'logo', $slide->logo);

        $result1 = $this->imageService->updateImage($request, 'assets/front/images/', 'img1', $slide->{'max-width: 400px'});
        $result2 = $this->imageService->updateImage($request, 'assets/front/images/', 'img2', $slide->{'max-width: 768px'});
        $result3 = $this->imageService->updateImage($request, 'assets/front/images/', 'img3', $slide->{'max-width: 1024px'});
        $result4 = $this->imageService->updateImage($request, 'assets/front/images/', 'img4', $slide->{'max-width: 1368px'});
        $result5 = $this->imageService->updateImage($request, 'assets/front/images/', 'default_img', $slide->{'default_img'});


        $data = $request->all();

        $data['max-width: 400px'] = $result1;
        $data['max-width: 768px'] = $result2;
        $data['max-width: 1024px'] = $result3;
        $data['max-width: 1368px'] = $result4;
        $data['default_img'] = $result5;
        $data['logo'] = $logo;

        unset($data['img1']);
        unset($data['img2']);
        unset($data['img3']);
        unset($data['img4']);
        $this->dataServices->save($slide, $data, 'update');
        return back();
    }


    public function headersliderdelete($id)
    {
        try {
            $slide = HeaderSlider::findOrFail($id);
            $slide->delete();
            $this->imageService->deleteImage('assets/front/images/', $slide->{'max-width: 400px'});
            $this->imageService->deleteImage('assets/front/images/', $slide->{'max-width: 768px'});
            $this->imageService->deleteImage('assets/front/images/', $slide->{'max-width: 1024px'});
            $this->imageService->deleteImage('assets/front/images/', $slide->{'max-width: 1368px'});
            $this->imageService->deleteImage('assets/front/images/', $slide->{'default_img'});
            return redirect()->route('admin.headersliders.index')->with('message', 'slide uğurla silindi');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
