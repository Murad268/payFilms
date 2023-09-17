<?php

namespace App\View\Components;

use App\Models\Settings;
use Closure;
use Illuminate\Contracts\View\View;
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
        return view('front.components.front-header-component', compact('settings'));
    }
}
