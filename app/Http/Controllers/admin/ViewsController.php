<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function views($type, $id)
    {
        dd($type, $id);
    }
}
