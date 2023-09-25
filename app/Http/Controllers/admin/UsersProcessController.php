<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins;
use App\Models\Admin;
use App\Models\create_mainUsers;
use Illuminate\Http\Request;

class UsersProcessController extends Controller
{
    public function index(Request $request)
    {
        $allCookies = $request->cookies->all();
        if (isset($allCookies['login'])) {
            $loginCookieValue = $allCookies['login'];
            $admin = Admin::where('login', $loginCookieValue)->first();
        }
        $users = create_mainUsers::paginate(10);
        return view('admin.users.index', compact('users', 'admin'));
    }

    public function ban($id)
    {
        $user = create_mainUsers::findOrFail($id);
        if ($user->isBlocked == 1) {
            $user->update(['isBlocked' => 0]);
            return redirect()->route('admin.users.index')->with("message", "İstifadəçi ban edildi");
        } else {
            $user->update(['isBlocked' => 1]);
            return redirect()->route('admin.users.index')->with("message", "İstifadəçi bandan çıxarıldı");
        }
    }
}
