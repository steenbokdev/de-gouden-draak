<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Controls extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $primaryText,
        public string $secondaryText,
        public string $primaryColor = 'primary',
        public string $secondaryColor = 'light'
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.controls');
    }
}
