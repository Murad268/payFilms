<?php

namespace App\View\Components;

use App\Models\Categories;
use App\Models\create_mainUsers;
use App\Models\HeaderSlider;
use App\Models\Settings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

class FrontHeaderComponent extends Component
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
        $settings = Settings::firstOrFail();
        $categories = Categories::where('status', 1)->get();

        if (Cookie::has('email')) {
            $loginCookieValue = Cookie::get('email');
            $user = create_mainUsers::where('email', $loginCookieValue)->first();
            if ($user->isBlocked != 0 or $user->activationStatus != 1) {
                Cookie::queue(Cookie::make('email', "", -1));

                return redirect()->route('front.login');
            }
        }
        $sliders = HeaderSlider::all();
        return view('front.components.front-header-component', compact('settings', 'categories', 'sliders'));
    }
}
