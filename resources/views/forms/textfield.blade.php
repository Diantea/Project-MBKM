<div class="form-group mb-3" style="{{ $type === 'hidden' ? 'opacity: 0; pointer-events:none; position: absolute;' : '' }}">
    <label class="form-label" for="form-{{ $field }}">{{ $label }}</label>
    @if(isset($addon_right) || isset($addon_left))
        <div class="input-group">
    @endif
        @if(isset($addon_left))
            <span class="input-group-text">{{ $addon_left }}</span>
        @endif
        <input
            type="{{ $type ?? 'text' }}"
            class="form-control {{ $errors->first($field) ? 'is-invalid' : ''}}"
            id="form-{{ $field }}"
            placeholder="{{ $label }}"
            name="{{ $field }}"
            value="{{ $type !== 'password' ? old($field) ?? ($item ? $item[$field] : '') : '' }}"
            {!! isset($step) ? 'step="'. $step .'"' : '' !!}
        />
        @if(isset($addon_right))
            <span class="input-group-text">{{ $addon_right }}</span>
        @endif
    @if(isset($addon_right) || isset($addon_left))
        </div>
    @endif
    @if($errors->first($field))
        <div class="invalid-feedback">{{ $errors->first($field) }}</div>
    @endif
</div>
