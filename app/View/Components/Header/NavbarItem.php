<?php

namespace App\View\Components\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavbarItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $route,
        public string $label,
        public string $icon = '',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header.navbar-item');
    }
}
