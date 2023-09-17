<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\countries\CountriesRequest;
use App\Models\Countries;
use App\Services\CountriesService;
use Illuminate\Http\Request;


class CountriesController extends Controller
{
    public function __construct(private CountriesService $countriesService)
    {
    }
    public function index()
    {
        $countries = Countries::paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(CountriesRequest $request)
    {

        $this->countriesService->create($request);
        return redirect()->route('admin.countries.index')->with("message", "the information was added to the database");
    }


    public function edit($id)
    {
        $country = Countries::findOrFail($id);
        return view('admin.countries.edit', compact('country'));
    }

    public function update(CountriesRequest $request, $id)
    {
        $this->countriesService->update($request, $id);
        return redirect()->route('admin.countries.index')->with("message", "the information has been updated to the database");
    }


    public function destroy($id)
    {
        $this->countriesService->delete($id);
        return redirect()->route('admin.countries.index')->with('message', 'the information was deleted from the database');
    }




 


}
