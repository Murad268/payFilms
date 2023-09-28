<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Documentals;
use App\Models\OneSerieDocumentals;
use Illuminate\Http\Request;

class DocumentalsController extends Controller
{
    public function documentals()
    {
        $documentals = Documentals::paginate(10);
        $oneseriesdocumentals = OneSerieDocumentals::paginate(10);
        return view('front.documentals', compact('documentals', 'oneseriesdocumentals'));
    }
}
