<?php

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\DirectorModel;
use App\Models\Scriptwriter;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function getAutoCompleteData(Request $request, $type)
    {
        $query = $request->input('q'); // Search term

        // You can switch between different data sources based on the $type parameter
        switch ($type) {
            case 'countries':
                $query = $request->input('q');
                $locale = app()->getLocale();

                $results = Countries::where("name->$locale", 'LIKE', "%$query%")
                    ->limit(10)
                    ->get();

                return response()->json($results);
                break;
            case 'directors':
                $query = $request->input('q');
                $locale = app()->getLocale();

                $results = DirectorModel::where("name->$locale", 'LIKE', "%$query%")
                    ->limit(10)
                    ->get();

                return response()->json($results);
                break;
            case 'scriptwriters':
                $query = $request->input('q');
                $locale = app()->getLocale();

                $results = Scriptwriter::where("name->$locale", 'LIKE', "%$query%")
                    ->limit(10)
                    ->get();

                return response()->json($results);
                break;
            default:
                $data = [];
        }

        return response()->json($data);
    }
}
