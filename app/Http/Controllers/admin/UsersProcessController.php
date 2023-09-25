<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\create_mainUsers;
use Illuminate\Http\Request;

class UsersProcessController extends Controller
{
    public function index() {
        $users = create_mainUsers::paginate(10);
        return view('admin.users.index', compact('users'));
    }
}
