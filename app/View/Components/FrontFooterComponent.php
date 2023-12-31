<?php

namespace App\View\Components;

use App\Models\Adver;
use App\Models\Settings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontFooterComponent extends Component
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
        $settings = Settings::firstOrFail(); // Use firstOrFail to make sure a record exists
        $settingsData = [
            'facebook' => $settings->facebook,
            'instagram' => $settings->instagram,
            'linkedin' => $settings->linkedin,
            'twitter' => $settings->twitter,
            'logo' => $settings->logo,
            'logo' => $settings->logo,
            'copywrite' => $settings->copywrite,
        ];
        $banner = Adver::where('status', 1)->where('place', 'footer reklamı')->first();
        return view('front.components.front-footer-component', compact('settingsData', 'banner'));
    }
}
