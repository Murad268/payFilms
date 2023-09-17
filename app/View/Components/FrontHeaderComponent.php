<?php

namespace App\View\Components;

use App\Models\Categories;
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
        $categories = Categories::where('status', 1)->get();
        return view('front.components.front-header-component', compact('settings', 'categories'));
    }
}
