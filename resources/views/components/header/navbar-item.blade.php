<a href="{{ $route }}" class="navbar-item">
    @if($icon)
        <span class="icon-text">
            <span class="icon">
                <i class="{{ $icon }}"></i>
            </span>

            <span>
              {{ $label }}
            </span>
        </span>
    @else
        {{ $label }}
    @endif
</a>
