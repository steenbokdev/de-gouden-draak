<?php

namespace App\View\Components\Cocktail;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowcaseItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $src,
        public string $content
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cocktail.showcase-item');
    }
}
