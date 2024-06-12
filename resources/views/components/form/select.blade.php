<div class="field">
    @if($label)
    <label class="label" for="{{ $id }}">
        {{ $label }}
    </label>
    @endif
    <div class="control">
        <div class="select">
            <select id="{{ $id }}" name="{{ $id }}">
                {{ $slot }}
            </select>
        </div>
    </div>
</div>
