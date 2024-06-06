<div class="field">
    <label class="label" for="{{ $id }}">
        {{ $label }}
    </label>
    <div class="control">
        <textarea class="textarea" name="{{ $id }}" placeholder="{{ $placeholder ?? $value }}">{{ old($id) ?? $value }}</textarea>
    </div>
    
    @if($errors || $help)
        <p class="help @if ($errors) has-text-danger @endif">
            {{ $errors->first($id) ?? $help }}
        </p>
    @endif
</div>
