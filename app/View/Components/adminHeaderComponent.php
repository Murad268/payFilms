<?php

namespace App\View\Components;

use App\Http\Requests\admins;
use App\Models\Admin;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

class adminHeaderComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cookieValue = Cookie::get('login');
        if (!$cookieValue) {
            return redirect()->route('admin.login');
        }
        $admin = Admin::where('login', $cookieValue)->first();
        if ($admin == null) {
            Cookie::queue(Cookie::make('login', "", -1));
        } else if ($admin->isLogged == 0) {
            if (Cookie::has('login')) {
                Admin::query()->update(['isLogged' => 0]);
                Cookie::queue(Cookie::make('login', "", -1));
            }
        }
        return view('admin.components.admin-header-component', compact('admin'));
    }
}
