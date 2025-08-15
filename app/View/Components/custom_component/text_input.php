<?php

namespace App\View\Components\custom_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class text_input extends Component
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
        return view('components.custom_component.text-input');
    }
}
