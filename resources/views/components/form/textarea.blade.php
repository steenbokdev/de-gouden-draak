<div class="field">
    <label class="label">
        {{ $label }}
    </label>
    <div class="control">
        <textarea class="textarea" placeholder="{{ $placeholder ?? $value }}">{{ $value }}</textarea>
    </div>
    
    @isset($help)
        <p class="help">
            {{ $help }}
        </p>
    @endisset
</div>
