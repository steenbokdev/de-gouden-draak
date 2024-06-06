<div class="field">
    <label class="label" for="{{ $id }}">
        {{ $label }}
    </label>
    <div class="control">
        @if ($type === 'number')
            <input class="input" type="{{ $type }}" name="{{ $id }}" step="{{ $step }}" placeholder="{{ $placeholder ?? $value }}" value="{!! old($id) ?? $value !!}">
        @else
            <input class="input" type="{{ $type }}" name="{{ $id }}" placeholder="{{ $placeholder ?? $value }}" value="{!! old($id) ?? $value !!}">
        @endif
    </div>
    
    @if($errors || $help)
        <p class="help @if ($errors) has-text-danger @endif">
            {{ $errors->first($id) ?? $help }}
        </p>
    @endif
</div>
