<div class="field">
    <label class="label">
        {{ $label }}
    </label>
    <div class="control">
        @if ($type === 'number')
            <input class="input" type="{{ $type }}" step="{{ $step }}" placeholder="{{ $placeholder ?? $value }}" value="{{ $value }}">
        @else
            <input class="input" type="{{ $type }}" placeholder="{{ $placeholder ?? $value }}" value="{{ $value }}">
        @endif
    </div>
    
    @isset($help)
        <p class="help">
            {{ $help }}
        </p>
    @endisset
</div>
